<?php

class orderController extends Controller
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
        $conditions = array('user_id' => Session::get('user_id'));
        $Enterprises = $this->model->select_data('system_user_enterprise','*',$conditions);

        foreach ($Enterprises as $idx=>$e)
        {
            $conditions = array('enterprise_id' => $e['enterprise_id'], 'status'=>'NEW');
            $Orders = $this->model->select_data('order_enterprise','*',$conditions);
        }

        $this->_view->Enterprises = $Enterprises;
        $this->_view->renderizar('index');
    }


    public function setTimePrepare()
    {
        $model=$this->loadModel('db');
        $columns = array('time_prepare'=>$this->getPostParam('time_prepare'));

        $where = array('order_id'=>$this->getPostParam('order_id'));

        $result = $model->update('order_enterprise', $columns, $where,false);
        $message = '';
        $success = false;
        switch ($result['status'])
        {
            case 'success':
                $message = 'Time prepare updated';
                $success = true;
                break;
            case 'error':
                $message = 'Something is wrong...';
                $success = false;
                break;
        }

        $response = array('messageo'=>$message,'successo'=>$success);
        echo json_encode($response);
    }

    public function confirmProcessing()
    {
        $model=$this->loadModel('db');
        $columns = array('status'=>$this->getPostParam('status'));

        $where = array('order_id'=>$this->getPostParam('order_id'));

        $result = $model->update('order_enterprise', $columns, $where,false);
        $message = '';
        $success = false;
        switch ($result['status'])
        {
            case 'success':
                $message = 'Cycler Confirmed';
                $success = true;
                break;
            case 'error':
                $message = 'Notice, this order already authorized...';
                $success = false;
                break;
        }

        $response = array('messageo'=>$message,'successo'=>$success);
        echo json_encode($response);
    }

    public function authCycler()
    {
        $conditions = array('order_id' => $this->getPostParam('order_id'));
        $Order = $this->model->select_row('order_enterprise','*',$conditions);

        $this->_view->Order = $Order;
        $this->_view->Stuff = $this->model->query("SELECT * FROM order_stuff AS o INNER JOIN enterprise_stuff AS e ON o.stuff_id = e.stuff_id WHERE order_id = ".$Order['order_id']);
        $conditions = array('user_id' => $Order['cycler_id']);
        $Cycler = $this->model->select_row('system_users','*',$conditions);

        $this->_view->Cycler = $Cycler;

        $conditions = array('user_id' => $Order['user_id']);
        $Customer = $this->model->select_row('system_users','*',$conditions);
        $this->_view->Customer = $Customer;
        
        if(!empty($Order))
        {
            

            if(!empty($Cycler))
            {
                
                if(!empty($Customer))
                {
                   
                }
            }
        }
        ob_start();
        ?>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('customer','enterprise');?>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('order_detail','enterprise');?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <?php echo $this->_view->loadTemplate('cycler','enterprise');?>
        </div>

        <div class="clear"></div>
        <script>
            window.onload = function()
            {
                $('.statistic-counter').counterUp({
                    delay: 10,
                    time: 2000
                });
            }
        </script>
        <?php
        $html=ob_get_contents();
        ob_end_clean();

        $response = array('html'=>$html);
        echo json_encode($response);
    }


}