<?php

class profileController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('customer'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $this->_view->setJs(array('index'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);

        $Customer = $this->model->select_row('system_users','*',$conditions);

        $this->_view->cOrders = $this->countShoppings('order_enterprise',$_SESSION['user_id']);
        $this->_view->csOrders= $this->countShoppings('order_special',$_SESSION['user_id']);

        $this->_view->function = 'getProfile';
        $this->_view->Customer = $Customer;
        $this->_view->function = 'getProfile';
        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = $user_id;
        $this->_view->setTemplates(array('profile'));
        $this->_view->renderizar('index');
    }


    public function favorites()
    {
        
        $user_id = $_SESSION['user_id'];
        $Favorite = $this->model->select_data('system_user_favorite','*',
                                              array('user_id'=>$user_id)
                                            );
        foreach($Favorite as $s=>$f)
        {
            $Stuff = $this->model->select_data('enterprise_stuff','*',array('stuff_id'=>$f['stuff_id']));
            $Favorite[$s]= $Stuff[0];
            $Favorite[$s]['favorite']= '';            
            
        }
        
        $this->_view->Stuff = $Favorite;
        $this->_view->renderizar('favorites');
    }




   
}