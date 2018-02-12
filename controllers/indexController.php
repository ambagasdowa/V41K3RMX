<?php

class indexController extends Controller
{
    public function __construct() {
        //Session::validate();
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->shop=$this->loadModel('db');
        $this->enterprise=$this->loadModel('enterprise');

    }

    
    public function index($login=0)
    {
        $this->dataStuff();
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));

        $this->_view->Enterprise = $this->enterprise->select_data('system_user_enterprise','*',array());

        $total_distance = $this->enterprise->query("SELECT SUM(distance_kms) AS distance_kms FROM order_enterprise;
        ");

        $this->_view->Emissions = $this->CO2KG($total_distance[0]['distance_kms']);
        $this->_view->total_distance = $total_distance[0]['distance_kms'];

        if($login == 0)
        {
            if (isset($_SESSION['autenticado'])) {
                $_SESSION['welcomeBack'] = 'swal("Welcome Back",
        "' . $_SESSION['first_name']  . ' ' . $_SESSION['last_name']. '",
        "success");';
            }
        }else{
            Session::destroy('welcomeBack');
        }


        $this->_view->getPlugins(array('jquery-masked'));
        $this->_view->setTemplates(array('geoloc_delivery','geoloc_static'),true);
        $this->_view->renderizar('index');
    }


    public function dash($login=0)
    {
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));

        $this->_view->Enterprise = $this->enterprise->select_data('system_user_enterprise','*',array());
        #$this->pr($Enterprise);
        if($login == 0)
        {
            if (isset($_SESSION['autenticado'])) {
                $_SESSION['welcomeBack'] = 'swal("Welcome Back",
        "' . $_SESSION['first_name']  . ' ' . $_SESSION['last_name']. '",
        "success");';
            }
        }else{
            Session::destroy('welcomeBack');

        }

        $this->_view->renderizar('dash');

    }

    public function geoloc()
    {
        $this->_view->renderizar('geoloc');
    }

    public function footer(){
        $this->printR($_POST);
    }

    public function cancel_shopping()
    {
        Session::destroy('Shopping');
        $this->index();
    }



}