<?php

class ordersController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('cycler','enterprise','customer'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $this->_view->setCss(array('index'));
        $this->_view->setTemplates(array('orders'),true);

        $conditions = array('status' => 'NEW');
        $Orders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');
        $conditions = array('status' => 'AUTH','cycler_id'=>Session::get('user_id'));
        $myOrders = $this->model->select_data('order_enterprise','*',$conditions,false,false,'order_id','DESC');


        $conditions = array('status' => 'NEW');
        $specialOrdersN = $this->model->select_data('order_special','*',$conditions,false,false,'order_id','DESC');

        $conditions = array('status' => 'SPECIAL','viker_id'=>Session::get('user_id'));

        $specialOrdersS = $this->model->select_data('order_special','*',$conditions,false,false,'order_id','DESC');

        $specialOrders = ($specialOrdersS !== false) ? array_merge($specialOrdersN,$specialOrdersS) : $specialOrdersN;

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

        if(!empty($myOrders))
        {
            foreach ($myOrders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name',$conditions);
                $myOrders[$ido]['Customer'] = $Customer;

                $conditions = array('enterprise_id' => $o['enterprise_id']);
                $Enterprise = $this->model->select_row('system_user_enterprise','logo_enterprise, enterprise_id, name_enterprise,geo_lat,geo_lng,geo_str,geo_ext,geo_int',$conditions);
                $myOrders[$ido]['Enterprise'] = $Enterprise;
            }
        }


        if(!empty($specialOrders))
        {
            foreach ($specialOrders as $ido=>$o)
            {
                $conditions = array('user_id' => $o['user_id']);
                $Customer = $this->model->select_row('system_users','first_name, last_name, phone_number',$conditions);
                $specialOrders[$ido]['Customer'] = $Customer;
            }
        }
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));
        $this->_view->Orders = $Orders;
        $this->_view->myOrders = $myOrders;
        $this->_view->spOrders = $specialOrders;

        $this->_view->renderizar('index');
    }

    public function get_geoloc_cycler()
    {
        $LocationE = array('geo_lat' => $_POST['cycler_geo_lat'],'geo_lng' => $_POST['cycler_geo_lng']);
        Session::set('LocationE',$LocationE);
        //$this->pr(Session::get('LocationE'));
        $response = array('LocationE'=>$LocationE);
        echo json_encode($response);
    }


    public function request($order_id,$status)
    {
        $conditions = array('order_id' => $order_id);
        $Order = $this->model->select_row('order_enterprise','*',$conditions);

        #POINT ENTERPRISE
        $conditions = array('enterprise_id' => $Order['enterprise_id']);
        $LocationE = $this->model->select_row('system_user_enterprise',
            'geo_lat,geo_lng,geo_str,geo_ext,geo_int',
            $conditions);
        $this->_view->btn_confirm='confirmDelivery';
        $this->_view->Location = $LocationE;
        $this->_view->Order    = $Order;
        $this->_view->status   = $status;
        $this->_view->order_id = $order_id;
        $this->_view->setTemplates(array('request_delivery','route_cycler'),true);
        $this->_view->renderizar('request');
    }


    public function request_sp($order_id,$status)
    {
        $conditions = array('order_id' => $order_id);

        $Order = $this->model->select_row('order_special','*',$conditions);
        $Order['total_order']  = 0;
        $Order['total_change'] = 0;
        $Order['total_vikers'] = $Order['total_viker'];

        #POINT CYCLER
        $LocationE = Session::get('LocationE');

        $this->_view->btn_confirm='confirmSDelivery';
        $this->_view->Location = $LocationE;
        $this->_view->Order    = $Order;
        $this->_view->status   = $status;
        $this->_view->order_id = $order_id;
        $this->_view->setTemplates(array('request_delivery','route_cycler'),true);
        $this->_view->renderizar('request');
    }

    public function view_route($order_id)
    {
        $conditions = array('order_id' => $order_id);
        $Order = $this->model->select_row('order_enterprise','*',$conditions);

        #POINT ENTERPRISE
        $conditions = array('enterprise_id' => $Order['enterprise_id']);
        $LocationE = $this->model->select_row('system_user_enterprise',
            'geo_lat,geo_lng,geo_str,geo_ext,geo_int',
            $conditions);

        $this->_view->Location = $LocationE;
        $this->_view->Order    = $Order;
        $this->_view->status   = $Order['status'];
        $this->_view->order_id = $order_id;
        $this->_view->setTemplates(array('route_cycler'),true);
        $this->_view->renderizar('view_route');
    }



    /*public function requestDelivery()
    {
        $status = $this->getPostParam('status');
        $order_id= $this->getPostParam('order_id');

        $conditions = array('order_id' => $order_id);
        $Order = $this->model->select_row('order_enterprise','*',$conditions);

        #POINT ENTERPRISE
        $conditions = array('enterprise_id' => $Order['enterprise_id']);
        $LocationE = $this->model->select_row('system_user_enterprise',
                                          'geo_lat,geo_lng,geo_str,geo_ext,geo_int',
                                          $conditions);

        $this->_view->Location = $LocationE;
        $this->_view->Order    = $Order;
        $this->_view->status   = $status;
        $this->_view->order_id = $order_id;
        ob_start();
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('request_delivery');?>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('route_cycler');?>
        </div>
        <div class="clear"></div>
        <?php
        $html_orders=ob_get_contents();
        ob_end_clean();

        $response = array('html'=>$html_orders);
        echo json_encode($response);
    }
    */

    function confirmDelivery()
    {
        $model=$this->loadModel('db');
        $columns = array('status'=>'CYCLER','cycler_id'=>Session::get('user_id'));
        $where = array('order_id'=>$this->getPostParam('order_id'));

        $result = $model->update('order_enterprise', $columns, $where,false);
        $message = '';
        $success = false;
        switch ($result['status'])
        {
            case 'success':
                $message = 'You can start with this order';
                $success = true;
                break;
            case 'error':
                $message = 'This order already request for other Cycler';
                $success = false;
                break;
        }

        $response = array('messageo'=>$message,'successo'=>$success);
        echo json_encode($response);
    }

    function confirmSDelivery()
    {
        $model=$this->loadModel('db');
        $columns = array('status'=>'SPECIAL','viker_id'=>Session::get('user_id'));
        $where = array('order_id'=>$this->getPostParam('order_id'));

        $result = $model->update('order_special', $columns, $where,false);
        $message = '';
        $success = false;
        switch ($result['status'])
        {
            case 'success':
                $message = 'You can start with this order';
                $success = true;
                break;
            case 'error':
                $message = 'This order already request for other Cycler';
                $success = false;
                break;
        }

        $response = array('messageo'=>$message,'successo'=>$success);
        echo json_encode($response);
    }

    function completeDelivery()
    {
        $model=$this->loadModel('db');
        $columns = array('status'=>'COMPLETE','cycler_id'=>Session::get('user_id'));
        $where = array('order_id'=>$this->getPostParam('order_id'));

        $result = $model->update('order_enterprise', $columns, $where,false);
        $message = '';
        $success = false;
        switch ($result['status'])
        {
            case 'success':
                $message = 'Order Complete';
                $success = true;
                break;
            case 'error':
                $message = 'Please try again';
                $success = false;
                break;
        }

        $response = array('messageo'=>$message,'successo'=>$success);
        echo json_encode($response);
    }

    public function authCycler()
    {
        ob_start();
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('request_delivery','enterprise');?>
        </div>

        <div class="clear"></div>
        <?php
        $html_orders=ob_get_contents();
        ob_end_clean();

        $response = array('html'=>$html_orders);
        echo json_encode($response);

    }
}