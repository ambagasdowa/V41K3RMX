<?php

class productsController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        Session::checkPrivileges('enterprise');
        $this->model=$this->loadModel('db');

    }

    public function index(){}
    public function editp($stuff_id=null)
    {
        $this->_view->setJs(array('products'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));
        $conditions = array('stuff_id' => $stuff_id);
        $Product = $this->model->select_row('enterprise_stuff','*',$conditions);
        $this->_view->setTemplates(array('product_photo'));
        $this->_view->Product = $Product;
        $user_id = Session::get('user_id');
        $this->_view->customerID = $user_id;
        
        $Category = $this->model->select_data('category_stuff','category_id,name_cat',array('enterprise_id'=>$Product['enterprise_id']),false,false,'tab_cat');

        
        $this->_view->CategoryStuff = $Category;
        
        
        $this->_view->renderizar('editp');
    }
    
    public function addp($enterprise_id=false,$category_id=false)
    {
        $data = array();
        $data['enterprise_id'] = $enterprise_id;
        $data['category_id']  = $category_id;
        
        $newStuff = $this->model->insert('enterprise_stuff', $data, array());
        #$this->pr($newStuff);

        if($newStuff['status'] == 'success')
        {
            $stuff_id = $newStuff['data'];
            $this->editp($stuff_id);
        }
        
    }

    public function edit($e_id=null)
    {
        $this->_view->setJs(array('products'));
        $this->_view->getPlugins(array('bootstrap-fileinput','clockpicker'));

        $user_id = Session::get('user_id');
        $conditions = array('user_id' => $user_id);
        $Customer = $this->model->select_row('system_users','*',$conditions);

        $conditions = array('enterprise_id' => $e_id);
        $Enterprise = $this->model->select_row('system_user_enterprise','*',$conditions);
        $SetViewMap['geo_lat'] = round($Enterprise['geo_lat'],4);
        $SetViewMap['geo_lng'] = round($Enterprise['geo_lng'],4);
        #$this->pr($SetViewMap);
        $this->_view->function = 'getProfile';
        $this->_view->Customer = $Customer;
        $this->_view->SetViewMap = $SetViewMap;
        $this->_view->Enterprise = $Enterprise;
        $this->_view->function = 'getProfile';
        $this->_view->customerName = Session::get('first_name').' '.Session::get('last_name');
        $this->_view->customerID = $user_id;
        $this->_view->enterpriseID = $e_id;


        $this->_view->e_id = $e_id;
        $this->_view->Enterprise = $this->model->select_data('system_user_enterprise','*',array('enterprise_id'=>$e_id));

        $Category = $this->model->select_data('category_stuff','*',array('enterprise_id'=>$e_id),false,false,'tab_cat');

        if($Category == false)
        {
            $data['enterprise_id'] = $e_id;
            $data['tab_cat'] = 1;
            $data['name_cat'] = 'Default';
            $data['desc_cat'] = 'Default';
            $data['active_cat'] = 1;
            $res = $this->model->insert('category_stuff', $data, array());
            $Category = $this->model->select_data('category_stuff','*',array('enterprise_id'=>$e_id),false,false,'tab_cat');
        }


        $this->_view->Category = $Category;

        foreach($Category as $cat_data)
        {
            $Stuff = $this->model->select_data('enterprise_stuff','*',array('enterprise_id'=>$e_id,'category_id'=>$cat_data['category_id']));
            $CategoryTab[$cat_data['name_cat']] = $Stuff;
        }
        $this->_view->CategoryStuff = $CategoryTab;



        $this->_view->setTemplates(array('products_edit','category'));
        $this->_view->setTemplates(array('geoloc_address'),true);
        $this->_view->renderizar('edit');
    }

    public function update_product()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $stuff_id = $_POST['stuff_id'];
        
        if($field == 'photo_stuff')
        {
            $value = str_replace("-", "_", $value);
        }

        $mySQL = " UPDATE enterprise_stuff SET $field = '$value' WHERE stuff_id = $stuff_id ";
        
        $Profile = $this->model->query($mySQL);

        $response = array('product_update'=>$Profile['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function update_category()
    {
        $field = $_POST['f'];
        $value = $_POST['v'];
        $category_id = $_POST['category_id'];


        $mySQL = " UPDATE category_stuff SET $field = '$value' WHERE category_id = $category_id ";

        $Category = $this->model->query($mySQL);

        $response = array('category_update'=>$Category['status'],'query'=>$mySQL);
        echo json_encode($response);
    }

    public function add_category()
    {
        $data = array();
        $data['enterprise_id'] = $_POST['enterprise_id'];
        $data['tab_cat'] = $_POST['tab_cat'];
        $data['name_cat'] = $_POST['name_cat'];
        $data['desc_cat'] = $_POST['name_cat'];
        $data['active_cat'] = 1;

        $newCategory = $this->model->insert('category_stuff', $data, array());
        $response = array('category_inserted'=>$newCategory['status']);
        echo json_encode($response);

    }


}