<?php

class loginController extends Controller
{
    private $_login;

    public function __construct()
    {
        parent::__construct();
        $this->_login = $this->loadModel('db');
        #$this->_view->setJs(array('login'));

    }

    public function index($register = NULL)
    {
        $this->_view->register = $register;
        $this->_view->getPlugins(array('jquery-masked','font-awesome'));


        if ($this->getInt('submitButton') == 1) {

            $this->_view->datos = $_POST;
            if (!$this->getPostParam('email'))
            {

                if (!$this->validarEmail($this->getPostParam('email'))) {

                    $this->_view->error = 'Incorrect Email';
                    $this->_view->renderizar('index');
                    exit;
                }
                $this->_view->error = 'Enter an email';
                $this->_view->renderizar('index');
                exit;

            }

            if (!$this->getSql('password')) {
                $this->_view->error = 'Enter a password';
                $this->_view->renderizar('index');
                exit;
            }


            $data = array(
                'username' => $this->getPostParam('email'),
                'password' => sha1($this->getSql('password'))
            );


            $data = $this->_login->select_row('vw_system_users', '*', $data);

            $row = $data;

            if (!$row) {
                $this->_view->error = 'User and/or password incorrect';
                $this->_view->renderizar('index');
                exit;
            }

            if ($row['val'] != 1) {

                #$member_id = $encrypt->aes128Encrypt($row['member_id']);

                $this->redireccionar('activate/user/'.$row['user_id']);
                //$this->redireccionar('activate/error');
                exit;
            }


            Session::set('autenticado', true);

            Session::set('first_name', $row['first_name']);
            Session::set('username', $row['username']);
            Session::set('last_name', $row['last_name']);
            Session::set('user_id', $row['user_id']);
            Session::set('user_type', $row['type']);
            Session::set('user_type_id', $row['type_id']);
            Session::set('signed_agree', $row['signed_agree']);
            Session::set('time', time());
            if ($row['is_supervisor'] == 1) {
                Session::set('supervisor', $row['is_supervisor']);
            }

            if ($row['type'] == 'enterprise')
            {
                $conditions = array("user_id"=>$row['user_id']);
                $enterprise = $this->_login->select_data('system_user_enterprise', 'enterprise_id', $conditions);
                Session::set('Enterprise',$enterprise);
            }



            $url =  'index/index#stuff';

            if($row['type'] =='enterprise'){
                $this->redireccionar($row['type']);
            }
            
            if($row['type'] =='customer'){
                $this->redireccionar($row['type']);
            }

            if($row['type'] =='cycler'){
                $this->redireccionar('orders/index');
            }

            if(Session::get('Shopping') && Session::get('Checkout'))
            {
                $url =  'checkout/index';
            }

            if(Session::get('Shopping') && !Session::get('Checkout'))
            {
                $url =  'menu/shopping';
            }

            if(!Session::get('autenticado'))
            {
                $url =  'login/index';
            }


            $this->redireccionar($url);
        }

        $this->_view->renderizar('index');

    }

    public function lockscreen()
    {
        if (Session::get('autenticado')) {
            Session::destroy('autenticado');
            Session::set('lock', 1);
        } elseif (!Session::get('lock')) {
            $this->redireccionar();
        }

        if ($this->getInt('enviar') == 1) {
            $this->_view->datos = $_POST;

            if (!$this->getSql('password')) {
                $this->_view->_error = 'Enter a password';
                $this->_view->renderizar('lock');
                exit;
            }

            $row = $this->_login->getUsuario(
                Session::get('email'),
                $this->getSql('password')
            );

            if (!$row) {
                $this->_view->_error = 'User and/or password incorrect';
                $this->_view->renderizar('lock');
                exit;
            }

            if ($row['active'] != 1) {
                $this->_view->_error = 'This user is disabled';
                $this->_view->renderizar('lock');
                exit;
            }

            Session::set('autenticado', true);

            if (Session::get('lock')) {
                Session::destroy('lock');
            }

            $this->redireccionar();

        }
        $this->_view->renderizar('lock');
    }

    public function autologin()
    {
        $data=array(
            'member_id'=>$this->getPostParam('mid'),
        );

        $row = $this->_login->select_row('vw_system_users','*',$data);

        if(!empty($row))
        {
            #$this->pr($row);
            $Data['user_id']=$row['user_id'];
            $Data['val'] = 1;
            $Data['signed_agree'] = 1;
            $Data['signed_on'] = date('Y-m-d H:i:s');
            $Data['val_on'] = date('Y-m-d H:i:s');

            $val=$this->_login->select_count('validations','user_id',array('user_id'=>$row['user_id']));

            if($val['count']==0)
            {
                $this->_login->insert('validations',$Data,array('user_id'=>$row['user_id']),array());
            }else{
                $this->_login->update('validations',$Data,array('user_id'=>$row['user_id']),array());
            }


            Session::set('autenticado', true);
            Session::set('first_name', $row['first_name']);
            Session::set('username', $row['username']);
            Session::set('last_name',$row['last_name']);
            Session::set('user_id', $row['user_id']);
            Session::set('member_id', $row['member_id']);
            Session::set('user_type', $row['type']);
            Session::set('user_type_id', $row['type_id']);
            Session::set('membership', $row['membership']);
            Session::set('signed_agree', $row['signed_agree']);
            Session::set('company', $row['company']);
            Session::set('time', time());

            if($row['is_supervisor']==1)
            {
                Session::set('supervisor', $row['is_supervisor']);
            }

            $response_data = array('result' => true, "message"=> 'Welcome back Member');
            echo json_encode($response_data);
        }
    }
}