<?php
class indexController extends Controller
{
    public function __construct()
    {
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

        $this->_view->function = 'getOrders';
        $this->_view->Enterprises = $Enterprises;
        $this->_view->setTemplates(array('enterprise'));
        $this->_view->renderizar('index');
    }
    
}