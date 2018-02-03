<?php


class logoutController extends Controller
{
    public function __contruct()
    {
        parent::__construct();
    }
    
    
    public function index()
    {
        // TODO: Implement index() method.
        Session::destroy();
        $this->redireccionar('login');
    }
}