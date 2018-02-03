<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 7/18/16
 * Time: 11:04 AM
 */
use App\Model\dbModel;

$app->group('/properties',function (){

    $this->get('/', function ($req, $res, $args) {

        return $res->getBody()
            ->write('Hello this are all propertiesss');
    });

    $this->get('/get/{page}', function ($req, $res, $args) {
        $model = new dbModel();
        $limit=5;
        $page=$req->getAttribute('page');

        $data['properties']=$model->select('vw_users_properties','*',array(),'prop_id DESC',$page,$limit);
        $total_reg=$model->select('vw_users_properties','*',array());
        //$data['totalPages']=ceil(count($total_reg)/$limit);
        $data['totalPages']=count($total_reg);
            foreach($data['properties'] as $key=>$prop)
            {
                $image=$model->select_row('m_properties_photo','*' ,array('prop_id'=>$prop->prop_id, 'order_photo'=>1) );
                if($image)
                {
                    $data['properties'][$key]->url_image="/public/uploads/photos/property/".$prop->prop_id."/".$image->name_photo;
                }else{
                    $data['properties'][$key]->url_image='/public/img/sampleResort.png';
                }
            }


        return $res
            ->withHeader('Content-type', 'application/json')
            ->getBody()
            ->write(
                json_encode(
                    $data,true
                )
            );
    });

} );

$app->group('/property',function(){

    $this->get('/get/{id}',function($req,$res,$args){
        $model = new dbModel();

        $id=$req->getAttribute('id');

        $property=$model->select_row('vw_users_properties','*',array('prop_id'=>$id));

        $image=$model->select('m_properties_photo','*' ,array('prop_id'=>$id),'ORDER BY order_photo ASC' );

            if($image) {
                foreach ($image as $kI=>$i) {
                    $images[]="img/".$id."/".$i->name_photo;
                }
            }else{
                $images[]='img/sampleResort.png';
            }

        $data['property']=$property;
        $data['images']=$images;

        return $res
            ->withHeader('Content-type', 'application/json')
            ->getBody()
            ->write(
                json_encode($data,true)
            );

    });

});

$app->group('/inquirie',function(){


    $this->get('/hi/{name}',function($req,$res){
        $name = $req->getAttribute('name');
        $res->getBody()->write("Hello, $name");

        return $res;
    });

    $this->post('/add',function($req,$res){

        $model= new dbModel();

        $data = json_decode($req->getBody());
        
        $inquirie_data['ip']     = $model->getRealIP();
        $inquirie_data['bound_prop_id']= filter_var($data->prop_id,FILTER_SANITIZE_NUMBER_INT);
        $inquirie_data['name']   = filter_var($data->name,FILTER_SANITIZE_STRING);
        $inquirie_data['phone']  = filter_var($data->phone,FILTER_SANITIZE_STRING);
        $inquirie_data['email']  = filter_var($data->email,FILTER_SANITIZE_EMAIL);
        $inquirie_data['guests']  = filter_var($data->guests,FILTER_SANITIZE_STRING);
        $inquirie_data['comments'] = filter_var($data->comments,FILTER_SANITIZE_STRING);
        $inquirie_data['status'] = 'P';
        $inquirie_data['date_created'] = date("Y-m-d H:i:s");

        $inquirie = $model->insert('inquiries',$inquirie_data,array() );

        if($inquirie)
        {
            $response['response']=true;
        }else{
            $response['response']=false;
        }



        return $res
            ->withHeader('Content-type', 'application/json')
            ->getBody()
            ->write(
               json_encode($response)
            );

    });



});


