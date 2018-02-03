<?php


class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';
        $modulo = $peticion->getModulo();

        if($modulo)
        {
            $rutaControlador = ROOT .'modules/'.$modulo. DS . 'controllers' . DS . $controller . '.php';
        }else{
            $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        }

        $controlador=$peticion->getControlador();
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();

       /* echo 'controlador: '.$rutaControlador.'<br>';
        echo 'metodo: '.$metodo.'<br>';
        echo 'argumentos: '.$args.'<br>';*/


        if(is_readable($rutaControlador)){

            require_once $rutaControlador;
            $controller = new $controller;

            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
                //header('Location: /404.php');
            }


            if(isset($args)){
                
                call_user_func_array(array($controller, $metodo), $args);

            }
            else{
                call_user_func(array($controller, $metodo));

            }

        } else {

            //throw new Exception('no encontrados');
            header('Location: /404.php');
        }
    }
}