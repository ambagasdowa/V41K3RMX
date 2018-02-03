<?php



class Request
{
    private $_modulo;
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    
    public function __construct() {
       // print_r($_GET['url']);
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);


            $this->_modulo=strtolower(array_shift($url));

            $m=array('enterprise','customer');

            if(in_array($this->_modulo,$m))
            {
                $this->_modulo=$this->_modulo;
                $this->_controlador = strtolower(array_shift($url));
            }else{
                $this->_controlador=$this->_modulo;
                $this->_modulo=false;
            }

            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;

        }

        if(!$this->_controlador){

                $this->_controlador = DEFAULT_CONTROLLER;

        }
        
        if(!$this->_metodo){
            $this->_metodo = 'index';
        }
        
        if(!isset($this->_argumentos)){
            $this->_argumentos = array();
        }

    }

    public function getModulo()
    {
        return $this->_modulo;
    }

    public function getControlador()
    {
        return $this->_controlador;
    }
    
    public function getMetodo()
    {
        return $this->_metodo;
    }
    
    public function getArgs()
    {
        return $this->_argumentos;
    }
}