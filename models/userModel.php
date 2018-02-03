<?php
/**
 * Created by PhpStorm.
 * User: dashboard
 * Date: 4/29/16
 * Time: 9:44 AM
 */
class userModel extends dbModel
{
    public function __construct()
    {
        parent::__construct();
       
    }


    public function getCountUser($mid=false)
    {
        $mid = (int)$mid;

        try {
            if($mid) {
                $query = 'SELECT COUNT(user_id) as count FROM vw_system_users_customers'
                    . ' WHERE member_id LIKE "%'.$mid.'%" ;';
            }else{
                $query = 'SELECT COUNT(user_id) as count FROM vw_system_users_customers';
            }
            #echo $query;
            return $this->db->query($query)->fetch(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) {
            return false;
        }
    }
    
    public function getUsersList($mid,$page,$limit=false)
    {
        $mid = (int)$mid;

        if($limit && is_numeric($limit)){
            $limit = $limit;
        } else {
            $limit = 10;
        }

        if($page==1)
        {
            $left=0;
        }else{
            $left=($page-1)*$limit;
        }

        try {
            if($mid) {
                $query = 'SELECT * FROM vw_system_users'
                    . ' WHERE member_id LIKE "%'.$mid.'%" ';
            }else{
                $query = 'SELECT * FROM vw_system_users';
            }

            $limits = ' LIMIT '.$left.','.$limit;

            $query .= $limits;
            #echo $query;
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $e) {
            return false;
        }
    }

    public function checkEmail($username, $id)
    {
        $query='SELECT user_id FROM system_users WHERE username = "'.$username.'" AND  user_id NOT LIKE '.$id.'  ';
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    
    //migration
    public function saveUser($user)
    {
        $data['user_id']=null;
        $data['member_id']=$user['mid'];
        $data['username']=$user['user'];
        $data['password']=$user['password'];

        switch ($user['type']) {
            case 2:
                $type_id=4;
                break;
            case 4:
                $type_id=2;
                break;
            default:
                $type_id=$user['type'];
        }

        $data['type']=$type_id;
        $data['first_name']=$user['first_name'];
        $data['last_name']=$user['last_name'];
        $data['bio']=$user['bio'];

        switch ($user['membership']) {
            case 'Basic':
                $membership_id=1;
                break;
            case 'Starter':
                $membership_id=1;
                break;
            case 'Preferred':
                $membership_id=2;
                break;
            case 'Elite':
                $membership_id=3;
                break;
            case 'Select':
                $membership_id=4;
                break;
            case 'Pro':
                $membership_id=5;
                break;
        }

        $data['membership_id']=$membership_id;
        $data['company']=$user['company'];
        $data['lang']=$user['language'];
        $data['active']=$user['active'];
        $data['date_created']=$user['creation_DATE'];
        
        $res=$this->insert('system_users',$data ,array() );
        //if user save
        if($res['status']=='success') {
            $user_id=$res['data'];
            //if user saved then save emails,phone,address
                $response['id']=$user_id;
                $response['status']='success';
            //card info
            if(!empty($user['card_name']) && !empty($user['cc1']) && !empty($user['card_type'])){

               // $this->getLibrary('encrypt');
               // $encrypt= new Encryption(HASH_KEY);

                $card['id']=null;
                $card['bound_user_id']=$user_id;
                $card['added_on']=$user['card_created_date'];
                $card['alias']=$user['card_name'];
                $card['cc1']=$user['cc1'];
                $card['cc2']=$user['cc2'];
                $card['cc3']=$user['cc3'];
                $card['cc4']=$user['cc4'];
                $card['exp']=$user['expiration'];
                $card['sec']=$user['security'];
                $card['type']=$user['card_type'];

                $card_saved=$this->insert('cc_nfo',$card ,array() );
            }
            //end card info
            
            //emails
            $emails=explode(',',$user['email']);
            if(!empty($emails)) {
                foreach ($emails as $key=>$email) {
                    if($key==0){$selected=1;}else{$selected=null;}

                    $email_data['id']=null;
                    $email_data['user_id']=$user_id;
                    $email_data['email']=trim($email);
                    $email_data['selected']=$selected;

                    $this->insert('emails',$email_data ,array() );
                }
            }
            // end emails
            
            //phones
            $phones=array();

            if(!empty($user['home_phone'])) {
                $phones[]=array('user_id'=>$user_id,'phone'=>$user['home_phone'],'type'=>'home');
            }
            if(!empty($user['cell_phone'])) {
                $phones[]=array('user_id'=>$user_id,'phone'=>$user['cell_phone'],'type'=>'cellphone');
            }
            if(!empty($user['other_phone'])) {
                $phones[]=array('user_id'=>$user_id,'phone'=>$user['other_phone'],'type'=>'other');
            }

            if(!empty($phones)){
                foreach ($phones as $key=>$phone) {
                    if($key==0){$selected=1;}else{$selected=null;}
                    $phone['id']=null;
                    $phone['selected']=$selected;
                    $this->insert('phones',$phone ,array() );
                }
            }
            //end phones

            //address
            $address=array();
            if(!empty($user['address1'])) {
                $address[]=array(
                    'user_id'=>$user_id,
                    'address'=>$user['address1'],
                    'city'=>$user['city'],
                    'state'=>$user['state'],
                    'country'=>$user['country'],
                    'zip'=>$user['zip']
                );
            }
            if(!empty($user['address2'])) {
                $address[]=array(
                    'user_id'=>$user_id,
                    'address'=>$user['address2'],
                );
            }

            if(!empty($address)){
                foreach ($address as $key=>$val) {
                    if($key==0){$selected=1;}else{$selected=null;}
                    $val['id']=null;
                    $val['selected']=$selected;
                    $this->insert('address',$val ,array() );
                }
            }
            //end address
            
            //validations
            $userValidation=$this->userValidation($user_id,$user);
            if($userValidation['status']=='error') {
                return false;
            }
            //end validations
        }else{
            return false;
        }
        return $response;
    }

    public function userValidation($id,$user)
    {
        $data['user_id']=$id;
        $data['is_supervisor']=$user['supervisor'];
       // $data['signed_agree']=$user['signed_agree'];
        //$data['signed_on']=$user['agree_on'];
        //$data['val']=$user['val'];
       // $data['val_on']=$user['val_on'];
        $data['unsubscribe']=$user['unsubscribe'];

        return $this->insert('validations',$data ,array() );

    }

    public function saveProperty($prop,$user_id)
    {
        $city=$this->select_row('cities','*' ,array('name'=>$prop['city']) );
        $state=$this->select_row('states','*',array('name'=>$prop['state']));

        if($prop['country']=='USA') {
            $country='United States';
        }else{$country=$prop['country'];}

        $country=$this->select_row('countries','*' ,array('name'=>$country) );

        //property info
        $p['prop_id']=null;
        $p['ad_id']=$this->checkRandomAdId();
        $p['user_id']=$user_id;
        $p['member_id']=$prop['mid'];
        $p['pid']=$prop['pid'];
        $p['type']='rental';
        $p['name']=$prop['name'];
        $p['home_city']=  (!empty( $city['id']) ?$city['id'] :null );
        $p['home_state']=(!empty($state['id']) ?$state['id'] :null );
        $p['home_country']=$country['id'];
        $p['ownership']=$prop['ownership'];
        $p['unit_size']=filter_var($prop['unit_size'], FILTER_SANITIZE_NUMBER_INT);
        $p['season']=$prop['season'];
        $p['highlights']=$prop['highlights'];
        $p['amenities']=$prop['amenities'];
        $p['services']=$prop['services'];
        $p['publish']=$prop['publish'];
        $p['description']=$prop['description'];
        $p['status']=($prop['status']==2)? 2 : 1;
        $p['created_date']=$prop['creation_DATE'];

        $res=$this->insert('properties',$p ,array() );

        //make folder company then make folder property id and move all folder
        $folder_company=ROOT.'/public/uploads/photos/'.$prop['user_company'];
        if(!file_exists($folder_company)) {
            mkdir($folder_company, 0755, true);
            chmod($folder_company, 0755);
        }
        
        if($res['status']=='success') {

            $response['message'] = ' se inserto la propierdad '.$prop['m_prop_id'];
            $response['status'] = 'success';
            
            $prop_id=$res['data'];
            $response['id']=$prop_id;
            
            //fees info
            $f['id']=null;
            $f['prop_id']=$prop_id;
            $f['financing']=$prop['financing'];
            $f['resale_fee']=filter_var($prop['resale_fee'], FILTER_SANITIZE_NUMBER_INT);
            $f['total_mfee']=$prop['maint_fee'];
            $f['total_mfee_due']=$prop['maint_fee_due_date'];
            $this->insert('property_fees',$f ,array() );
            
        }else{
            $response['message'] = 'no se inserto la propierdad '.$prop['m_prop_id'];
            $response['status'] = 'error';
        }
            return $response;
    }

    public function checkRandomAdId(){
        do{
            $random = mt_rand(100000,999999);
            if($this->select_row('properties','*',array('ad_id'=>$random)))
            {
                $id_exist=true;
            }else{
                $id_exist=false;
            }
        }while($id_exist);

        return $random;

    }
}