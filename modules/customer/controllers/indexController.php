<?php
class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::accesoEstricto(array('customer'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $user_id = Session::get('user_id');
        
        $this->_view->setJs(array('index'));
        /*$this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));


        $conditions = array('user_id' => $user_id);
        $Enterprises = $this->model->select_data('order_special','*',$conditions);

        $this->_view->function = 'getOrders';
        $this->_view->Enterprises = $Enterprises;
        $this->_view->setTemplates(array('enterprise'));
        $this->_view->renderizar('index');*/

        $total_distance = $this->model->query("SELECT SUM(distance_kms) AS distance_kms FROM order_enterprise WHERE user_id = $user_id;
        ");

        $this->_view->Emissions = $this->CO2KG($total_distance[0]['distance_kms']);
        $this->_view->cOrders = $this->countShoppings('order_enterprise',$_SESSION['user_id']);
        $this->_view->csOrders= $this->countShoppings('order_special',$_SESSION['user_id']);


        $this->_view->total_distance = $total_distance[0]['distance_kms'];


        $this->_view->setCss(array('index'));
        $this->_view->setTemplates(array('orders','profile'),false);
        $conditions = array('user_id' => $user_id);
        $Orders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');
        $sOrders = $this->model->select_data('order_special','*',$conditions,false,false,'order_id','DESC');

        if(!empty($Orders))
        {
            foreach ($Orders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $Orders[$ido]['Customer'] = $Customer;

                $conditions = array('enterprise_id' => $o['enterprise_id']);
                $Enterprise = $this->model->select_row('system_user_enterprise','logo_enterprise, enterprise_id, name_enterprise,geo_lat,geo_lng,geo_str,geo_ext,geo_int',$conditions);
                $Orders[$ido]['Enterprise'] = $Enterprise;
            }
        }

        if(!empty($sOrders))
        {
            foreach ($sOrders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $sOrders[$ido]['Customer'] = $Customer;
            }
        }

        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = Session::get('user_id');

        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));
        $this->_view->Orders = $Orders;
        $this->_view->sOrders = $sOrders;
        $this->_view->renderizar('index');


    }
    
}