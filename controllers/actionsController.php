<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 5/26/16
 * Time: 11:55 AM
 */
class actionsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model=$this->loadModel('actions');
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    
}