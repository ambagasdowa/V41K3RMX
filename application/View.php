<?php

class View
{
    private $modulo;
    private $_controlador;
    private $_js;
    private $_css;
    private $_publicjs;
    private $_privatejs;
    private $_plugginscss;
    private $_rutas;
    private $templates;
    private $_metodo;
    private $_plugginsjs;


    public function __construct(Request $peticion) {

        $this->modulo=$peticion->getModulo();
        $this->_controlador = $peticion->getControlador();
        $this->_metodo=$peticion->getMetodo();
        $this->_args=$peticion->getArgs();
        $this->_js = array();
        $this->_css = array();
        $this->templates=array();
        $this->_rutas = array();
        $this->_publicjs = array();
        $this->_privatejs = array();
        $this->_plugginscss = array();

        if($this->modulo)
        {
            $this->_rutas['view'] = ROOT .'modules/'.$this->modulo. DS .'views' . DS . $this->_controlador . DS;
            $this->_rutas['js'] = BASE_URL .'modules/'. $this->modulo . '/views/' . $this->_controlador . '/js/';
            $this->_rutas['private_css'] = BASE_URL .'modules/'. $this->modulo . '/views/' . $this->_controlador . '/css/';
            $this->_rutas['module_templates'] = ROOT .'modules/'. $this->modulo . '/templates/';
            $this->_rutas['privatejs'] = BASE_URL . $this->modulo . '/js/';

        }else{
            $this->_rutas['view'] = ROOT . 'views' . DS . $this->_controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'views/' . $this->_controlador . '/js/';
            $this->_rutas['private_css'] = BASE_URL . 'views/' . $this->_controlador . '/css/';
        }

       
        $this->_rutas['public_templates'] = ROOT .'templates/';
        $this->_rutas['publicjs'] = BASE_URL . 'public/js/';
        $this->_rutas['css'] = BASE_URL . 'public/css/';
        $this->_rutas['plugins'] = BASE_URL . 'public/plugins/';

    }

    public function renderizar($vista, $item = false, $ajax = false, $head=true)
    {
        if($this->modulo)
        {
            $layout= DEFAULT_ADMIN_LAYOUT;
        }else{
            $layout= DEFAULT_LAYOUT;
        }


        $params = array(
            'layout' => $layout,
            'layout_css' => BASE_URL . 'views/layout/' . $layout . '/css/',
            'layout_js' => BASE_URL . 'views/layout/' . $layout . '/js/',
            'layout_img' => BASE_URL . 'views/layout/' . $layout . '/img/',
            'public' => BASE_URL . 'public/',
            'public_css' => BASE_URL . 'public/css/',
            'public_img' => BASE_URL . 'public/img/',
            'public_js' => BASE_URL . 'public/js/',
            'public_plugins' => BASE_URL . 'public/plugins/',
            'js' => $this->_js,
            'public_scripts'=> $this->_publicjs,
            'private_scripts'=> $this->_privatejs,
            'plugins_css'=> $this->_plugginscss,
            'plugins_js'=> $this->_plugginsjs,
            'templates'=>$this->templates,
            'public_get_css'=>$this->_css
        );

        $modulo=$this->modulo;
        $controlador=$this->_controlador;
        $metodo=$this->_metodo;
        $args=$this->_args;

        #$this->pr($params);
  
        $rutaView = $this->_rutas['view']. $vista . '.php';


        if(is_readable($rutaView)){

            include_once ROOT . 'views'. DS . 'layout' . DS . $layout . DS . 'header.php';
            #header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
            #header("Expires: Sat, 10 Feb 1980 09:50:10 GMT");
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . $layout . DS . 'footer.php';
            Session::message();
        }
        else {
            throw new Exception('Error de vista <h2>'.$rutaView.'</h2>');
        }
    }

    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = $this->_rutas['js']. $js[$i] . '.js';
            }
        }
        else{
            throw new Exception('Error de js');
        }
    }

    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = $this->_rutas['css']. $css[$i] . '.css';
            }
        }
        else{
            throw new Exception('Error de css');
        }
    }

    public function getPlugins($folders=array())
    {
        foreach($folders as $f=>$folder)
        {
            $path = ROOT .'public/plugins/'.$folder.'/';

            if(is_dir($path)){
                if ($dh = opendir($path)) {
                    while (($file = readdir($dh)) !== false){
                        if (is_dir($path . $file))
                        {
                            if($file !=='.' && $file !=='..')
                            {
                                $this->getPlugins(array($folder.'/'.$file));
                            }
                        }
                        else{
                            if($file !=='.' && $file !=='..')
                            {
                                $ext = explode(".",$file);
                                $ext = array_pop($ext);
                                switch($ext)
                                {
                                    case 'css':
                                        $this->_plugginscss[] = $this->_rutas['plugins'] .$folder.'/'.$file;
                                        break;
                                    case 'js':
                                        $this->_plugginsjs[] = $this->_rutas['plugins'] .$folder.'/'.$file;
                                        break;
                                }
                            }
                        }
                    }
                    closedir($dh);
                }
            }else{
                echo "no se encontro archivo";
            }
        }
    }


    public function setTemplates(array $tmp,$public=false)
    {

        if(is_array($tmp) && count($tmp)){
            for($i=0; $i < count($tmp); $i++){
                
                if($public)
                {
                    $ruta=$this->_rutas['public_templates'];
                }else{
                    $ruta=$this->_rutas['module_templates'];
                }
                
                  
                $this->templates[] = $ruta. $tmp[$i] . '.php';
            }

        }
        else {
            throw new Exception('Error de template');
        }

        #$this->pr($this->_rutas);

    }

    public function loadTemplate($template, $modulo=false)
    {
        
        if($modulo)
        {
            include_once ROOT . 'modules/'. $modulo . DS . 'templates' . DS . $template. '.php';
        }else{

            include_once ROOT . 'templates' . DS . $template. '.php';
        }

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
    
    public function getInqurieStatus($status)
    {
        switch ($status)
        {
            case 'P':
                $set_status = 'Inquirie Pending';
                $color  = '#FAAC58';
                break;
            case 'M':
                $set_status = 'Inquirie Send to Owner';
                $color  = '#FAAC58';
                break;
            case 'A':
                $set_status = 'Authorized For Review';
                $color  = '#04B431';
                break;
            case 'D':
                $set_status = 'Denied by Verifier';
                $color  = '#FE2E2E';
                break;
            default:
                $set_status = 'N/A';
                $color  = '#6F7B8A';
                break;
        }        
        return array("status"=>$set_status,"color"=>$color);
    }


    public function getSeal_img($level,$percentW=null,$percentH=null)
    {

        $root_seals = '/public/img/seals/';
        switch($level)
        {
            case 'basic':
                $seal =$root_seals.'starter.png';
                break;
            case 'preferred':
                $seal =$root_seals.'preferred.png';
                break;
            case 'elite':
                $seal =$root_seals.'elite.png';
                break;
            case 'select':
                $seal =$root_seals.'select.png';
                break;
            case 'pro':
                $seal =$root_seals.'professional.png';
                break;

        }

        $percentW = ($percentW === null) ? '50': $percentW;
        $percentH = ($percentH === null) ? '50': $percentH;
        $seal = '<img src="'.$seal.'" width="'.$percentW.'%" height="'.$percentH.'%"/>';

        return $seal;
    }

    public function get_img($image,$class=null)
    {

        $root = '/public/img/';
        $seal = '<img src="'.$root.$image.'" class="'.$class.'"/>';

        return $seal;
    }

    public function getImgPosts($i)
    {

        $doc = new DOMDocument();
        $doc->loadHTML($i);
        $xpath = new DOMXPath($doc);
        return $xpath->evaluate("string(//img/@src)");
    }

    public function getDaysWeek($date)
    {
        $validDate = str_replace(array(":"," ","-","0000","00"),"",$date);
        if(strlen($validDate)>0)
        {
            list($year1, $month1, $day1) = explode("-", $date);
            list($year2, $month2, $day2) = explode("-", date("Y-m-d"));

            $timestamp1 = mktime(0,0,0,$month1,$day1,$year1);
            $timestamp2 = mktime(0,0,0,$month2,$day2,$year2);
            $second_diff = $timestamp1 - $timestamp2;

            $days_diff = $second_diff / (60 * 60 * 24);
            $days_diff = floor($days_diff);
            return $days_diff;
        }
        return '';
    }

    function formatDate($dateIn)
    {
        $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
        $D  = $dateIn;
        $validDate = str_replace(array(":"," ","-","0000","00"),"",$dateIn);
        if(strlen($validDate)>0)
        {
            $Da = explode("-", $D);
            $Yy = $Da[0];
            $Mm = $Da[1];
            $Dd = $Da[2];
            $Db = $Dd . " " . $months[((int)$Mm) - 1] . " " . $Yy;
            return $Db;
        }
        return '';
    }

}