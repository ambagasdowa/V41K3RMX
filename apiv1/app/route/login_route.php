<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 28/10/16
 * Time: 11:01 AM
 */
use App\Model\dbModel;


$app->group('/login',function(){


    $this->post('/',function($req,$res)
    {
        $r=json_decode($req->getBody());
        //print_r($r);
        $email = $r['email'];
        $password = $r['password'];
        $model= new dbModel();


        print_r($r);

        $model->select_row('vw_system_users','*',array('username'=>$email));


        $data['response']=true;

        return $res
            ->withHeader('Content-type', 'application/json')
            ->getBody()
            ->write(
                json_encode($data)
            );
    });

});
