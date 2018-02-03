<?php

class companyController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Enterprises = $this->model->select_data('system_user_enterprise','*',$conditions);
        $this->_view->function = 'getProfile';
        $this->_view->Enterprises = $Enterprises;
        $this->_view->function = 'getProfile';
        $this->_view->setTemplates(array('enterprise'));
        $this->_view->renderizar('index');
    }


    public function publish_company()
    {
        $model=$this->loadModel('db');

        $week_id  = $_POST['week_id'];
        $published  = $_POST['published'];

        $SQL=' UPDATE weeks SET published = '.$published
            .' WHERE week_id = '.$week_id;
        $updateWeek = $model->query($SQL);

        $response_data = array('html' => $updateWeek,'sql'=>$SQL);
        echo json_encode($response_data);
    }

    public function delete_company()
    {
        $model=$this->loadModel('db');
        $week_id  = $_POST['week_id'];

        $SQL=' DELETE FROM weeks '
            .' WHERE week_id = '.$week_id;
        $updateWeek = $model->query($SQL);

        $response_data = array('html' => $updateWeek,'sql'=>$SQL);
        echo json_encode($response_data);
    }
}