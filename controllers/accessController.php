<?php

class accessController extends Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->_view->titulo = 'Error';
        $this->_view->mensaje = $this->_getError();
        $this->_view->renderizar('index');
    }

    public function type($codigo)
    {

        $this->_view->titulo = 'Error';
        $this->_view->mensaje = $this->_getError($codigo);
        $this->_view->renderizar('access');
    }

    private function _getError($codigo = false)
    {
        if($codigo){
            $codigo = $this->filtrarInt($codigo);
            if(is_int($codigo))
                $codigo = $codigo;
        }
        else{
            $codigo = 'default';
        }

        $error['default'] = 'An error has occurred and the page can not be displayed';
        $error['404'] = 'An error has occurred and the page can not be displayed';
        $error['5050'] = 'Restricted Area!';
        $error['8080'] = 'Session time out';
        $error['7070'] = 'You dont have a session, please login';

        if(array_key_exists($codigo, $error)){
            return $error[$codigo];
        }
        else{
            return $error['default'];
        }
    }
}