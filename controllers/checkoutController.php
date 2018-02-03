<?php

class checkoutController extends Controller
{
    public function __construct() {
        //Session::validate();
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->enterprise=$this->loadModel('enterprise');

    }

    public function index()
    {
        $this->_view->setTemplates(array('geoloc'),true);

        $this->_view->renderizar('index');
    }

}