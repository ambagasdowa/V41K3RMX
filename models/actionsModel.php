<?php
/**
 * Created by PhpStorm.
 * User: dashboard
 * Date: 5/5/16
 * Time: 8:46 AM
 */

class actionsModel extends dbModel
{
    public function __construct() {
        parent::__construct();
    }


    public function addControlEvent($type, $description = '', $prop_id = '',$user_id='')
    {
        $type 			= (int) $type;
        $prop_id		= (int) $prop_id;

        $data['id']=null;
        $data['type_id']=$type;
        $data['user_id']=Session::get('user_id');
        $data['description']=$description;
        $data['prop_id']=$prop_id;
        $data['created_date']=date('Y-m-d H:i:s');
        $data['bound_user_id']=$user_id;
        $data['bound_prop_id']=$prop_id;

        $res=$this->insert('events_control',$data,array());

        if($res['status']=='success') {
            return $res;
        }else{
            return false;
        }
        
    }

    public function CreateTaskForVerifiers($task_date,$subject,$description,$bound_user_id=false)
    {
        $data['task_id']=null;
        $data['subject']=$subject;
        $data['description']=$description;
        $data['status']=0;
        $data['date_created']=$task_date;
        $data['due_date']=date('Y-m-d');
        $data['created_by']=Session::get('user_id');
        $data['group_id']=2;
        $data['bound_user_id']=$bound_user_id;
       
        $res=$this->insert('tasks',$data,array());
        if($res['status']=='success') {
           self::insertNotification($res['data'], $subject, $description,2 );
            return $res;
        }else{
            return false;
        }

    }

    public function CreateTaskForAgents($task_date,$subject,$description,$bound_user_id=false)
    {
        $data['task_id']=null;
        $data['subject']=$subject;
        $data['description']=$description;
        $data['status']=0;
        $data['date_created']=$task_date;
        $data['due_date']=date('Y-m-d');
        $data['created_by']=Session::get('user_id');
        $data['group_id']=3;
        $data['bound_user_id']=$bound_user_id;

        $res=$this->insert('tasks',$data,array());
        if($res['status']=='success') {
            self::insertNotification($res['data'], $subject, $description,2 );
            return $res;
        }else{
            return false;
        }

    }

    public function insertNotification($id=false,$subject,$description,$group){
        $notifications['id']=null;
        $notifications['task_id']=$id;
        $notifications['subject']=$subject;
        $notifications['description']=$description;
        $notifications['date_created']=date('Y-m-d H:i:s');
        $notifications['group_id']=$group;
        $notifications['status']=0;
        $this->insert('notifications',$notifications ,array() );
    }

    public function upgradeRequest($task_id,$membership){
        $a['id']=null;
        $a['task_id']=$task_id;
        $a['user_id']=Session::get('user_id');
        $a['completed']=0;
        $a['membership']=$membership;
        $a['date_created']=date('Y-m-d H:i:s');
        $a['date_modified']=date('Y-m-d H:i:s');

        $res=$this->insert('upgrade_request',$a,array());
        if($res['status']=='success') {
            return $res;
        }else{
            return false;
        }

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