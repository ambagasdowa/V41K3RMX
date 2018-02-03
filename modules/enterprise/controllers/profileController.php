<?php

class profileController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        Session::checkPrivileges('enterprise');
        $this->model=$this->loadModel('db');

    }

    public function index(){}

    public function edit($e_id=null)
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Customer = $this->model->select_row('system_users','*',$conditions);

        $conditions = array('enterprise_id' => $e_id);
        $Enterprise = $this->model->select_row('system_user_enterprise','*',$conditions);
        $SetViewMap['geo_lat'] = round($Enterprise['geo_lat'],4);
        $SetViewMap['geo_lng'] = round($Enterprise['geo_lng'],4);
        #$this->pr($SetViewMap);
        $this->_view->Customer = $Customer;
        $this->_view->SetViewMap = $SetViewMap;
        $this->_view->Enterprise = $Enterprise;
        $this->_view->function = 'getProfile';
        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = $user_id;
        $this->_view->enterpriseID = $e_id;
        $this->_view->setTemplates(array('profile'));
        $this->_view->setTemplates(array('geoloc_address'),true);
        $this->_view->renderizar('index');
    }


    public function update_profile()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $user_id = $_POST['user_id'];

        $change_pass = ($field == 'password_clean') ? ", password=sha1('$value') " : '' ;
        $mySQL = " UPDATE system_users SET $field = '$value' $change_pass WHERE user_id = $user_id ";
        $Profile = $this->model->query($mySQL);

        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function update_enterprise()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $enterpise_id = $_POST['enterprise_id'];
        $user_id = $_POST['user_id'];

        $mySQL = " UPDATE system_user_enterprise SET $field = '$value'  WHERE enterprise_id = $enterpise_id AND user_id = $user_id ";
        $Profile = $this->model->query($mySQL);

        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function update_address()
    {
        $enterprise_id = $_POST['enterprise_id'];
        $user_id = $_POST['user_id'];
        $geo_lat = $_POST['geo_lat'];
        $geo_lng = $_POST['geo_lng'];
        $geo_int = $_POST['geo_int'];
        $geo_ext = $_POST['geo_ext'];

        $this->getLibrary('encoding');
        $Encoding=new Encoding();
        $geo_str = $Encoding->fixUTF8($_POST['geo_str']);

        $mySQL =" UPDATE system_user_enterprise "
               ." SET "
               ."  geo_lat='$geo_lat', "
               ."  geo_lng='$geo_lng', "
               ."  geo_str='$geo_str', "
               ."  geo_int='$geo_int', "
               ."  geo_ext='$geo_ext' "
               ." WHERE enterprise_id = $enterprise_id AND user_id = $user_id ";
        #echo $mySQL;
        $Profile = $this->model->query($mySQL);
        $response = array('profile_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }
}