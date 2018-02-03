<?php


class Model extends Controller
{
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function  index(){

    }

    public function pr($array)
    {
        if(is_array($array))
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }else{
            return var_dump($array);
        }
    }



}