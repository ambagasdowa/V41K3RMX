<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 5/27/16
 * Time: 8:17 AM
 */

class userController extends Controller{


    public function __construct()
    {
        parent::__construct();
        $this->model=$this->loadModel('user');
        $this->actions=$this->loadModel('actions');

    }

    public function index()
    {
        // TODO: Implement index() method.

    }

    
    //AJAX
    
    public function get_users()
    {
        $limite=10;
        
        if(isset($_POST['page']))
        {
            Session::set('page',$_POST['page'] );
        }else{
            Session::set('page',1 );
        }
        
        if(isset($_POST['mid']))
        {
            Session::set('search_mid',$_POST['mid'] );
        }
            
        if(empty($_POST['page']))
        {
            $page=1;
        }
        else{
            $page=$_POST['page'];
        }

        
        #$this->getLibrary('class.paginador');
        #$paginador=new Paginador();
        
        
        /*
        if(!empty($_POST['mid']))
        {
            $countUsers=$this->model->getCountUser($_POST['mid']);
        }elseif (!empty($_POST['search_mid']))
        {
            $countUsers=$this->model->getCountUser($_POST['mid']);
        }
        else{
            $countUsers=$this->model->getCountUser();
        }
        */

        $mid = (!empty($_POST['mid'])) ? $_POST['mid'] : false;
        $countUsers=$this->model->getCountUser($mid);
        Session::set('count',$countUsers['count']);

        $data['users']=$this->model->getUsersList($_POST['mid'],Session::get('page'),$limite);
        $paginacion = $this->paginateThis($countUsers['count'],'getMember');
        $this->_view->data=$data;
        #$paginador->paginar($countUsers['count'],$page);
        ob_start();
        
        if(isset($_POST['user_type']) && $_POST['user_type']=='verifier')
        {
            echo $this->_view->loadTemplate('users-data','verifier');
        }else{
            echo $this->_view->loadTemplate('users-data','enterprise');
        }

       
        $html=ob_get_contents();
        ob_end_clean();
        
        #$paginacion=$paginador->getView('users');

        $result=array('html'=>$html,'pagination'=>$paginacion);
        echo json_encode($result);
    }
    
    public function history()
    {
        $response=true;
        $member_id = $this->filtrarInt($_POST['member_id']);
        $user_id=$this->filtrarInt($_POST['id']);
        
        
        $ws_url = URL_ASS.'/members/history/'.$member_id;
        $ws_res	= $this->get_url_contents($ws_url);
        $data_ass = json_decode($ws_res,true);

        $data = array(
            'mid'=>$member_id,
            'events'=>$this->model->select_data_where_order('vw_events_control','*','bound_user_id="'.$user_id.'"','id DESC'),
            'ass'=>$data_ass['data']
        );
        $this->_view->data = $data;

        
        ob_start();
        
        $this->_view->loadTemplate('history',$_POST['folder']);
        
        $html=ob_get_contents();
        ob_end_clean();

        $response_data = array('result' => $response,'html'=> $html);
        echo json_encode($response_data);
        
        
    }

    public function deactivate_user()
    {
        $res=FALSE;

        if($this->filtrarInt($_POST['uid'])) {

            $data['active'] = $_POST['value'];
            $update = $this->model->update('system_users', $data, array('user_id' => $_POST['uid'],'member_id'=>$_POST['mid']),array());

            if($update['status']=='success') {
                //TODO event control,
                if($this->getInt('value')==0)
                {
                    $message = 'Member Id '.$_POST['mid'].' Deactivated Successfully';
                }elseif($this->getInt('value')==1){
                    $message = 'Member Id '.$_POST['mid'].' Activated Successfully';
                }
                $this->actions->addControlEvent(3,$message,'',$_POST['uid']);

                $m['message']=$message;
                $m['type']='success';
                $res=true;

            }else{
                $m['message']='Couldnt deactivate user';
                $m['type']='error';
            }

        }else {
            $m['message']='No user sent';
            $m['type']='error';
        }

        $total_users=$this->model->select_count('vw_system_users_customers','user_id',array());
        $activated_users=$this->model->select_count('vw_system_users_customers','user_id',array('active'=>1));
        $inactive_users=$this->model->select_count('vw_system_users_customers','user_id',array('active'=>0));
        $signed_users=$this->model->select_count('vw_system_users_customers','user_id',array('signed_agree'=>1));

        $response_data 	= array('result' => $res, 'message' =>$m,
            'total_users' => $total_users['count'], 'inactive_users' => $inactive_users['count'],
            'activated_users'=> $activated_users['count'], 'signed_users'=> $signed_users['count']
        );

        echo json_encode($response_data);


    }

    public function update_profile_field()
    {
        $user_id=$_POST['user_id'];
        $field=$_POST['field'];
        $data[$field]=$_POST['value'];
        $response=false;

        if($_POST['field']=='username') {

            if($this->validarEmail($_POST['value']))
            {
                if(!$this->model->checkEmail($_POST['value'], $user_id)) {

                    $update=$this->model->update('system_users',$data,array('user_id'=>$user_id),array());

                    if($update['status']=='success')
                    {
                        $response=true;
                        $m['type']='success';
                        $m['message']='updated field';
                    }else{
                        $m['type']='error';
                        $m['message']='error ocurred';
                    }
                }else{
                    $m['type']='error';
                    $m['message']=' The username <strong>'.$_POST['username'].'</strong> is already taken';
                }
            }else{
                $m['type']='error';
                $m['message']=' Not a valid email';
            }

        }else{
            $update=$this->model->update('system_users',$data,array('user_id'=>$user_id),array());

            if($update['status']=='success')
            {
                $response=true;
                $m['type']='success';
                $m['message']='updated field';
            }else{
                $m['type']='error';
                $m['message']='error ocurred';
            }
        }

        if($response) {
            //Control Event
            $message = 'Field '.$_POST['field'].' updated to: '.$_POST['value'];
            $this->actions->addControlEvent(3,$message,0,$user_id);
            //Control Event
        }

        $response_data = array('result' => $response,'message'=> $m, 'field'=>$field);
        echo json_encode($response_data);

    }

    public function add_address()
    {

        $data['selected']=0;


        if($this->filtrarInt($_POST['user_id']))
        {
            $this->model->update('address',$data,array('user_id'=>$_POST['user_id']),array());

            $data['id']=null;
            $data['user_id']=$_POST['user_id'];
            $data['address']=$_POST['address'];
            $data['city']=$_POST['city'];
            $data['state']=$_POST['state'];
            $data['country']=$_POST['country'];
            $data['zip']=$_POST['zip'];
            $data['selected']=1;

            $res=$this->model->insert('address',$data,array('address','city','state','country','zip'));


            if($res['status']=='success')
            {
                $response = true;
                $message='Address added';

                //Control Event
                $m_events_control = 'Address '. $_POST['address'].' '. $res['data'].' added to user Id '.$_POST['user_id'];
                $this->actions->addControlEvent(3,$m_events_control,0,$_POST['user_id']);
                //Control Event

            }else{
                $response = false;
                $message = 'Something is wrong';
            }

            $address=$this->model->select_row('address','id,address',array('id'=>$res['data']));

        }else{
            $response = false;
            $message = 'Something is wrong';
        }


        $response_data = array('result' => $response,'message'=> $message,'data'=>$address);
        echo json_encode($response_data);
    }

    public function add_phone()
    {

        if($this->filtrarInt($_POST['user_id']))
        {
            $data['selected']=0;
            $this->model->update('phones',$data,array('user_id'=>$_POST['user_id']),array());

            $data['id']=null;
            $data['user_id']=$_POST['user_id'];
            $data['type']=$_POST['type_phone'];
            $data['phone']=$_POST['phone'];
            $data['selected']=1;

            $res=$this->model->insert('phones',$data,array('user_id','type','phone',));


            if($res['status']=='success')
            {
                $response = true;
                $message='Telephone added';

                //Control Event
                $m_events_control = 'Telephone '.$data['phone'].' added to user Id '.$_POST['user_id'];
                $this->actions->addControlEvent(3,$m_events_control,0,$_POST['user_id']);
                //Control Event

            }else{
                $response = false;
                $message = 'Something is wrong';
            }

            $phone=$this->model->select_row('phones','id,phone',array('id'=>$res['data']));
        }else{
            $response = false;
            $message = 'Something is wrong';
        }


        $response_data = array('result' => $response,'message'=> $message,'data'=>$phone);
        echo json_encode($response_data);
    }

    public function add_email()
    {

        if($this->filtrarInt($_POST['user_id']))
        {
            $data['id']=null;
            $data['user_id']=$_POST['user_id'];
            $data['email']=$_POST['email'];

            $check_email=$this->model->select_data('emails','email',array('email'=>$_POST['email']));
            $check_username=$this->model->select_data('system_users','username',array('username'=>$_POST['email']));


            if(!$check_email && !$check_username)
            {
                $res=$this->model->insert('emails',$data,array('email'));

                if($res['status']=='success')
                {
                    $response = true;
                    $message='Email added';

                    //Control Event
                    $m_events_control = 'Email '.$data['email'].' added to user Id '.$_POST['user_id'];
                    $this->actions->addControlEvent(3,$m_events_control,0,$_POST['user_id']);
                    //Control Event

                }else{
                    $response = false;
                    $message = 'Something is wrong';
                }
                $email=$this->model->select_row('emails','id,email',array('id'=>$res['data']));

            }else{
                $response = false;
                $message = 'This email already taken';
            }
        }else{
            $response = false;
            $message = 'Something is wrong';
        }



        $response_data = array('result' => $response,'message'=> $message,'data'=>$email);
        echo json_encode($response_data);
    }

    public function select_default()
    {

        if($id=$this->filtrarInt($_POST['id']))
        {
            $tabla=$_POST['type'];
            $user_id=$_POST['user_id'];

            $data['selected']=0;

            $this->model->update($tabla,$data,array('user_id'=>$user_id),array());

            $data['selected']=1;

            $res=$this->model->update($tabla,$data,array('id'=>$id),array());

            if($res['status']=='success')
            {
                $res = true;
                $message='default';
            }else{
                $res = false;
                $message = 'Something is wrong';
            }

        }

        $response_data = array('result' => $res,'message'=> $message);
        echo json_encode($response_data);

    }

    public function delete_info_profile()
    {

        $res=$this->model->delete($_POST['type'],array('id'=>$_POST['id']));

        if($res)
        {
            $response = true;
            $message='Deleted';
        }else{
            $response = false;
            $message = 'Something is wrong';
        }

        $response_data = array('result' => $response,'message'=> $message);
        echo json_encode($response_data);
    }

    public function get_user_detail(){

        $response=false;
        $html=false;
        $id=$this->filtrarInt($_POST['id']);
        $this->_view->data=$this->model->select_row('vw_system_users_customers','user_id,first_name,last_name,member_id,membership_id',array('user_id'=>$id));
        $this->_view->memberships=$this->model->select_data('membership_type','*',array(),array());
        
       
        
        if($this->_view->data)
        {
            if(isset($_POST['task_id'])){
                $this->_view->task_id=$_POST['task_id'];
            }

            $response=true;
            ob_start();

            $this->_view->loadTemplate('member-detail',$_POST['folder']);

            $html=ob_get_contents();
            ob_end_clean();
        }
        
        $response_data = array('result' => $response, 'html'=>$html);
        echo json_encode($response_data);

    }

    // Membership upgrade functions

    public function upgrade_request()
    {
        //$this->getLibrary('encrypt');
       // $encrypt= new Encryption(HASH_KEY);

        $response=false;
        $member_id = $this->filtrarInt($_POST['member_id']);
        $user_id=$this->filtrarInt($_POST['user_id']);
        $membership=$_POST['membership'];

        //select credit card
        $data['ccInfo'] = $this->model->select_row(
            'cc_nfo',
            '*',
            array(
                'bound_user_id'=>$user_id,
                'selected'=>1)
            );

        //select user
        $data['mInfo'] = $this->model->select_row(
            'vw_system_users_customers',
            'member_id,user_id',
            array(
                'user_id'=>$user_id)
            );

        $data['membership']=$membership;


        //$this->_view->cc = $encrypt->decrypt($data['ccInfo']['cc1']).'-'.$encrypt->decrypt($data['ccInfo']['cc2']).'-'.$encrypt->decrypt($data['ccInfo']['cc3']).'-'.$encrypt->decrypt($data['ccInfo']['cc4']);
        $cc=array();
        if($data['ccInfo']) {
            $cc['exp']=$data['ccInfo']['exp'];
            $cc['sec']=$data['ccInfo']['sec'];
            $cc['4']=$data['ccInfo']['cc4'];

            if(empty($cc['4'])) {
                $num_card='';
            }else{
                $num_card='xxxx-xxxx-xxxx-'.$cc['4'];
            }


            $cc['num']=$num_card;
            $cc['name']=$data['ccInfo']['alias'];
            $cc['type']=$data['ccInfo']['type'];

            foreach ($data['ccInfo'] as $f) {
                if(empty($f)) {
                    $cc['next']=0;
                    break;
                }else{
                    $cc['next']=1;
                }
            }

        }


        $this->_view->cc = $cc;

        $this->_view->data=$data;
        ob_start();

        $this->_view->loadTemplate('upgrade-request','enterprise');

        $html=ob_get_contents();
        ob_end_clean();

        $response_data = array('result' => $response,'html'=> $html);
        echo json_encode($response_data);
    }

    public function check_card(){

        $cid=$this->filtrarInt($_POST['cid']);
        //select credit card
        $cc = $this->model->select_row('cc_nfo', '*', array('id'=>$cid,'selected'=>1) );

        $user=$this->model->select_row('system_users','member_id',array('user_id'=>$cc['bound_user_id']));

        if($cc){
            $res=true;

            if(empty($cc['alias'])){$res=false;}
            if(empty($cc['cc1'])){$res=false;}
            if(empty($cc['cc2'])){$res=false;}
            if(empty($cc['cc3'])){$res=false;}
            if(empty($cc['cc4'])){$res=false;}
            if(empty($cc['exp'])){$res=false;}
            if(empty($cc['sec'])){$res=false;}

            if($res==false){
                if($this->model->delete('cc_nfo',array('id'=>$cc['id']))){

                    $message='Member: '.$user['member_id'].' credit card deleted';
                    //Control Event
                    $this->actions->addControlEvent(1, $message, 0, $user['user_id']);
                    //End Control Event

                }
            }
        }

        $response_data = array('response' => $res);
        echo json_encode($response_data);

    }

    public function save_cc_info()
    {
        $response=true;
        $member_id = $this->filtrarInt($_POST['member_id']);
        $user_id=$this->filtrarInt($_POST['user_id']);
        $cid=$this->filtrarInt($_POST['cid']);
        $field=$_POST['field'];
        $value=$_POST['value'];

        $data['bound_user_id']=$user_id;
        $data['added_by']=Session::get('user_id');

        //$this->getLibrary('encrypt');
        //$encrypt= new Encryption(HASH_KEY);

        if(empty($cid)) {

            $data['id']=null;
            $data[$field]=$value;
            $data['selected']=1;

            $new_card=$this->model->insert('cc_nfo',$data,array());

            if($new_card['status']=='success') {


                $message='Member: '.$member_id.' credit card added';
                //Control Event
                $this->actions->addControlEvent(1, $message, 0, $user_id);
                //End Control Event

                $cid=$new_card['data'];
                $m['message']='New credit card added';
                $m['type']='success';
            }else{
                $m['message']='Error saving new credit card';
                $m['type']='success';
            }


        }elseif($field=='cc_num') {

            $cc_num=explode('-',$value);
            $num=implode('',$cc_num );

            if(is_array($cc_num)) {

                if($this->validate_cc_number($num)) {


                    foreach ($cc_num as $key=>$cc) {
                        $k=$key+1;
                        $encrypt_cc=$cc;
                        $data['cc'.$k]=$encrypt_cc;
                    }
                    $update=$this->model->update('cc_nfo',$data,array('id'=>$cid,'bound_user_id'=>$user_id),array());

                    if($update['status']=='success') {
                        $m['message']='Updated field';
                        $m['type']='success';
                    }else{
                        $m['message']='Error updating field';
                        $m['type']='error';
                        $response=false;
                    }

                }else{
                    $m['message']='Not a valid credit card';
                    $m['type']='error';
                    $response=false;
                }
            }else{
                $m['message']='Wrong credit card format';
                $m['type']='error';
                $response=false;
            }
        }else{

            $data[$field]=$value;
            $update=$this->model->update('cc_nfo',$data,array('id'=>$cid,'bound_user_id'=>$user_id),array());

            if($update['status']=='success') {
                $m['message']='Updated field';
                $m['type']='success';
            }else{
                $m['message']='Error updating field';
                $m['type']='error';
                $response=false;
            }
        }

        $card=$this->model->select_row('cc_nfo','*',array('id'=>$cid));

        if(!empty($card)) {
            foreach ($card as $f) {
                if(empty($f)) {
                    $next=false;
                    break;
                }else{
                    $next=true;
                }
            }
        }else{
            $next=false;
        }



        $response_data = array('response' => $response,'data'=>$card['id'],'message'=>$m,'next'=>$next);
        echo json_encode($response_data);


    }

    public function upgrade_request_payment()
    {
        $response=false;

        if($this->filtrarInt($_POST['mid']) ) {

            $data=$this->model->select_row('cc_nfo','*',array('bound_user_id'=>$this->filtrarInt($_POST['user_id'])));

            if($data) {
                $this->getLibrary('encrypt');
                //$encrypt= new Encryption(HASH_KEY);


                $cc['sec']=$data['sec'];
                $cc['3']=$data['cc3'];
                $cc['4']=$data['cc4'];
                $cc['request']=$_POST['request'];

                $this->_view->data=$cc;
                ob_start();

                $this->_view->loadTemplate('payment-info','enterprise');

                $html=ob_get_contents();
                ob_end_clean();
                $response=true;
                $m['message']='Payment Info';
                $m['type']='success';
            }else{
                $m['message']='Something wrong';
                $m['type']='error';
            }

        }else{
            $m['message']='Something wrong';
            $m['type']='error';
        }

        $response_data = array('response' => $response,'message'=>$m,'html'=>$html);
        echo json_encode($response_data);

    }

    public function insert_payment_request()
    {
        
        //data insert payment info
        $dataArray = $this->unserilizeArray($_POST['dataInArray']);
        $dataArray['id']=null;
        $dataArray['bound_user_id'] = $_POST['user_id'];
        $dataArray['concept'] = 'Upgrade Membership';
        $dataArray['collected_by'] = Session::get('user_id');
        $dataArray['collected_when'] = date("Y-m-d H:i:s");
        $dataArray['tax'] = ($_POST['tax']== true ? 1 : 0);
        //data insert payment info

        $payment = $this->model->insert('pymnt_nfo',$dataArray,array());

        if ($payment['status']=='success') {

            $mid = $_POST['member_id'];
            $uid=$this->filtrarInt($_POST['user_id']);
            

            $cc_info = $this->model->select_row('cc_nfo','*',array('bound_user_id'=>$uid) );
            $pm_info = $this->model->select_row('pymnt_nfo','*',array('id'=>$payment['data']));
            $mb_info = $this->model->select_row('vw_system_users_customers','*',array('member_id'=>$mid));
            $add_info = $this->model->select_row('address', '*', array('user_id'=>$uid,'selected'=>1));
            $phone_info = $this->model->select_row('phones', '*', array('user_id'=>$uid,'selected'=>1));
            $message = 'Upgrade Membership Request';



            //Control Event
            $this->actions->addControlEvent(1, $message, 0, $uid);
            //End Control Event

            //Libraries
            $this->getLibrary('tcpdf/tcpdf');
            $this->getLibrary('encrypt');
            $encrypt= new Encryption(HASH_KEY);
            //End Libraries

            $body_image	= ROOT.'public/img/pdf/'.SITE.'/cca.jpg';
            //$check_on   = '/../enterprise/imgs/pdf/check-onn.jpg';
            $doc_name   = 'cca_membership_'.$mid.'_'.date('d-M-Y,H.i.s');//.'.date('d-M-Y,h_ia');
            #$doc_name   = 'cca_upgrade_membership';


            $pdf = new TCPDF('P','mm','Letter');
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
            $pdf->SetTopMargin(0);
            $pdf->SetRightMargin(30);
            $pdf->SetLeftMargin(20);
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 10, '', 'false');
            $pdf->SetAutoPageBreak(false, 10);

            $pdf->Image($body_image, 0, 0, 215, 275);

            # MEMBER INFO #
            $pdf->Text(5, 46,  $mb_info['first_name'].' '.$mb_info['last_name']);
            $pdf->Text(5, 58,  $add_info['address']);
            //$pdf->Text(5, 70,  $add_info['address2']);
            $pdf->Text(5, 82,  $add_info['city'].', '.$add_info['state']);
            $pdf->Text(75, 82, $add_info['zip']);
            $pdf->Text(110, 82, $add_info['country']);
            $pdf->Text(5, 93,  $phone_info['phone']);
            $pdf->Text(5, 105,  $mb_info['username']);

            # CREDIT CARD INFO #

            if($_POST['tax'] == 'true') {
                $authorized_fee = $pm_info['total'];
                $iva = $pm_info['total']*0.16;
                $total = $authorized_fee + $iva;
            }else {
                $authorized_fee = $pm_info['total'];
                $iva = 0;
                $total = $authorized_fee;
            }

            $pdf->Text(190, 44,  number_format($authorized_fee,2));
            $pdf->Text(190, 51,  number_format($iva,2));
            $pdf->Text(190, 58,  number_format($total,2));

            $pdf->Text(137.2, 75, 'X');
            $pdf->Text(136, 107, $cc_info['alias']);
            $pdf->Text(136, 120,'XXXX-XXXX-XXXX-'.$cc_info['cc4']);
            $pdf->Text(136, 132, $cc_info['exp']);
            $pdf->Text(136, 147, $cc_info['sec']);
            $chk = ($cc_info['type'] == 'Master Card') ? 90.5 : 95;
            $pdf->Text(150.7, $chk, 'x');
            # CREDIT CARD INFO #

            # AIMS #
            $CC_ending = chunk_split($cc_info['cc4'],1,"   ");

            $pdf->Text(108,122,$CC_ending);
            $pdf->Text(53,139.8,$pm_info['afiliation']);
            $pdf->Text(29,155.3,chunk_split($cc_info['cc4'],1," "));
            $pdf->Text(81.3,167.2,$pm_info['afiliation']);
            ;
            $pdf->Text(50,195,date('d-M-Y',strtotime(substr($pm_info['collected_when'], 0,10))));


            $path=ROOT.'public/uploads/pdfs/'.$mid.'/';
            if(!file_exists($path)) {
                mkdir($path, 0755, true);
                chmod($path, 0755);
            }

            $pdf->Output($path.$doc_name.'.pdf','F');

            if(file_exists($path.$doc_name.'.pdf')) {
                $route  = $_SERVER['HTTP_HOST'].'/public/uploads/pdfs/'.$mid.'/'.$doc_name.'.pdf';
                $fileName = $doc_name.'.pdf';
                
                //update payment info
                $data_pymnt['cca_gen']=$fileName;
                $this->model->update('pymnt_nfo',$data_pymnt,array('id'=>$pm_info['id']),array());
                
                
                #CREATE TASK FOR VERIFIERS
                
                //$pid = $this->model->getFirstPropertyByMid($_POST['mid']);

                $task_date = date('Y-m-d H:i:s');

                $subject =  'Verify member '.$mid.' upgrade to '.$_POST['mship'];
                $m['subject']=$subject;
                $content =  'Upgrade Membership to '.$_POST['mship'].' CCA Filename: '.$fileName ;
                $res=true;
               
                $raw = $this->actions->CreateTaskForVerifiers($task_date, $subject, $content,$uid);
            }else {
                $route  = '';
                $res=false;
                $m['message']='Something wrong';
                $m['type']='error';
            }
        }else{
            $m['message']='Something wrong';
            $m['type']='error';
            $res=false;
        }

        $response_data = array('response' => $res, 'message' => $m, 'link' => $route, 'mid' => $mb_info['member_id'], 'filename' => $fileName);
        echo json_encode($response_data);
    }

    public function update_membership()
    {
        $res=false;
        $data['membership_id']=$this->filtrarInt($_POST['membership_id']);
        $u_id=$this->filtrarInt($_POST['user_id']);


        if($this->model->update('system_users',$data,array('user_id'=>$u_id),array())) {




            if(isset($_POST['task_id']) && $this->filtrarInt($_POST['task_id']))
            {
                //update upgrade_request
                $data_request['completed']=1;
                $data_request['modify_by']=Session::get('user_id');
                $this->model->update('upgrade_request',$data_request,array('task_id'=>$_POST['task_id']),array());
            }

            
            
            //event control
            $u=$this->model->select_row('system_users','member_id',array('user_id'=>$_POST['user_id']));
            $m=$this->model->select_row('membership_type','*',array('id'=>$_POST['membership_id']));
            $subject="Verifier update membership";
            $description = 'Verifier update member "'.$u['member_id'].'" membership to '.ucfirst($m['membership']);

            $this->actions->addControlEvent(1,$description,'',$_POST['user_id']);

            // 3 group id for enterprise
            $this->actions->insertNotification(false,$subject,$description,3);

            $res=true;
        }

        $response_data = array('response' => $res,);
        echo json_encode($response_data);

    }
// End membership upgrade functions

    public function history_messages()
    {
        $emails = $this->model->select_data('email_messages','*',array('member_id'=>$_POST['member_id']),array());
        $this->_view->data['emails'] = $emails;
        $this->_view->data['mid'] = $_POST['member_id'];

        ob_start();
        $this->_view->loadTemplate('history_messages',$_POST['folder']);
        $html=ob_get_contents();
        ob_end_clean();

        $response_data = array('result' => true,'html'=> $html);
        echo json_encode($response_data);
    }

    public function third_email()
    {
        $this->getLibrary('encrypt');
        $encrypt=new Encryption(HASH_KEY);
        $member_id = $this->getPostParam('mid');
        $Member = $this->model->select_row('vw_system_users','*',array('member_id'=>$member_id));
        $emails = $this->model->select_data('emails','*',array('user_id'=>$Member['user_id']),array());

        $title = '3rd Notice of Inactive Advertisement';
        $Mails = $Member['username'];
        /*if(!empty($emails))
        {
            foreach($emails as $mail)
            {
                $Mails.=','.$mail['email'];
            }
        }*/


        $template_data = array( '{{customer_name}}',
                                '{{member_id}}', '{{username}}', '{{password}}',
                                '{{url}}','{{mail_company}}','{{company_phone}}',);


        $template_replace = array($Member['first_name'].' '.$Member['last_name'],
                                  $encrypt->aes128Encrypt($member_id), $Member['username'], $Member['member_id'].'00',
                                  APP_URL, EMAIL_COMPANY,APP_TEL);


        $htmlContent = $this->getEmailTemplate('third_notification.html',$template_data,$template_replace);
        #$this->pr($htmlContent);

        $response = false;
        if($this->sendMail(EMAIL_COMPANY, $Mails, $title, $htmlContent))
        {
            $message = 'Notification are send to Customer';
            $response = true;

            $data = array
            (
                'from_email'=>EMAIL_COMPANY,
                'to_email' => $Mails,
                'subject' => $title,
                'message' => $htmlContent,
                'member_id'=> $Member['member_id'],
                'sent_by' => Session::get('user_id')
            );

            $this->model->saveMessage($data);
        }else
            {
                $message = 'Error to Trying send Third Notification';
            }

        $response_data = array('result' => $response, 'message' => $message);
        echo json_encode($response_data);
    }


    public function checkEmail()
    {
        //$this->printR($_POST);
        if(!empty($_POST['email']))
        {
            if($this->validarEmail($_POST['email']))
            {
                $check_email=$this->model->select_data('system_users','username',array('username'=>$_POST['email']));

                if($check_email){
                    echo 'false';
                }else{
                    echo 'true';
                }

            }
        }else{
            echo 'false';
        }


    }

}