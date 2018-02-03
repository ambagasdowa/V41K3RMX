
<?php
/**
 * Created by PhpStorm.
 * User: enterprise
 * Date: 6/6/16
 * Time: 10:14 AM
 */

class menuController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->menu=$this->loadModel('menu');
        $this->shop=$this->loadModel('db');
        $this->enterprise=$this->loadModel('enterprise');
    }

    public function index()
    {
        $this->dataStuff();
        $this->_view->renderizar('index');
    }

    public function showMenu($E_id)
    {
        $this->_view->e_id = $E_id;
        $this->_view->Enterprise = $this->enterprise->select_data('system_user_enterprise','*',array('enterprise_id'=>$E_id));

        $Category = $this->enterprise->select_data('category_stuff','*',array('enterprise_id'=>$E_id),false,false,'tab_cat');

        foreach($Category as $cat_data)
        {
            $Stuff = $this->enterprise->select_data('enterprise_stuff','*',array('enterprise_id'=>$E_id,'category_id'=>$cat_data['category_id']));
            if(!empty($_SESSION['user_id']))
            {
                if(!empty($Stuff))
                {
                    foreach($Stuff as $s=>$stuf)
                    {
                        //echo $s;
                        $data['enterprise_id'] = $E_id;
                        $data['stuff_id'] = $stuf['stuff_id'];
                        $data['user_id'] = $_SESSION['user_id'];
                        $Favorite = $this->enterprise->select_row("system_user_favorite","*",$data);
                        if(!empty($Favorite))
                        {
                            $Stuff[$s]['favorite'] = '';
                        }else{
                            $Stuff[$s]['favorite'] = '-o';
                        }
                    }
                }
            }

            $CategoryTab[$cat_data['name_cat']] = $Stuff;
        }
        $this->_view->CategoryStuff = $CategoryTab;
        $this->_view->renderizar('index');
    }

    public function shopping()
    {
        $Enterprise = Session::get('Shopping');
        if(!empty($Enterprise))
        {
            foreach ($Enterprise['Enterprise'] as $e => $stuff)
            {
                $Enterprise_db = $this->shop->select_row("system_user_enterprise","*",array("enterprise_id"=>$e));
                $Enterprise['Enterprise'][$e]['enterprise_data'] = $Enterprise_db;

                foreach ($stuff as $S=>$s)
                {
                    foreach ($s as $s_id=>$s_data)
                    {
                        $Stuff = $this->shop->select_row("enterprise_stuff","*",array("stuff_id"=>$s_id));
                        $Enterprise['Enterprise'][$e]['stuff'][$s_id]['stuff_data'] = $Stuff;
                    }
                }
            }
            Session::write('Shopping',$Enterprise);
        }
        #$this->pr($Enterprise);
        #$this->_view->Enterprise = $Enterprise;
        $this->_view->renderizar('shopping');
    }

    public function products()
    {
        $this->_view->getPlugins(array('minicart'));
        $this->_view->renderizar('products');
    }



}
