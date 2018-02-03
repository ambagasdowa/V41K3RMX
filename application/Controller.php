<?php



abstract class Controller
{
    protected $_view;

    public function __construct() {
        $this->_view = new View(new Request);
        
       // $this->setInfo(Session::get('site'));
        //$this->getUrl(Session::get('site'));
       // print_r($_SESSION);

    }

    abstract public function index();

    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';

        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }

    protected function loadModelAgent($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'enterprise/models' . DS . $modelo . '.php';

        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }

    protected function loadModelAdmin($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'admin/models' . DS . $modelo . '.php';

        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }

    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
       
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria: '.$rutaLibreria);
        }
    }

    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }

        return '';
    }

    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }

        return false;
    }

    protected function sendMail($from, $toString, $title, $htmlContent)
    {

        //echo "hosts".EMAIL_SERVER;
        $Mail = $this->getLibrary('class.phpmailer');
        $Mail = new PHPMailer();
        $Mail->IsSMTP();
        $Mail->Mailer = 'smtp';

        $Mail->Host = EMAIL_SERVER; // GMail

        $Mail->Port = 587;
        $Mail->SMTPDebug = 0;
        $Mail->SMTPSecure = 'tls';

        //variables for email, in top of file
        $Mail->Username   = EMAIL_COMPANY;
        $Mail->Password   = EMAIL_PASS;
        $Mail->SMTPAuth = true;

        $Mail->SetFrom($from, $from);

        $Mail->Subject    = $title;

        $Mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $Mail->MsgHTML($htmlContent);

        $Mail->AddAddress($toString);

        if(!$Mail->Send()) {

            return FALSE;

            echo "Mailer Error: " . $Mail->ErrorInfo;
        } else {
            return TRUE;
        }
    }

    protected function redireccionar($ruta = false,$access=false)
    {
        $peticion = new Request();

        if($peticion->getModulo() && $access==false)
        {
            header('location:' . BASE_URL . $peticion->getModulo()."/".$ruta);

            exit;
        }elseif($ruta){
                header('location:' . BASE_URL . $ruta);
                exit;
        } else{
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function filtrarInt($int)
    {
        $int = (int) $int;

        if(is_int($int)){
            return $int;
        }
        else{
            return false;
        }
    }

    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }

    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);


            return trim($_POST[$clave]);
        }
    }

    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }

    }

    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;
    }

    public function getPropertyPhotos($data)
    {
        $path = ROOT.'public/uploads/photos/'.$data['user_company'].'/property/'.$data['prop_id'].'/';

        /*if(!file_exists($path))
        {
            mkdir($path,0755,true);
            chmod($path,0755);
        }*/

        $photos = array();
        if(file_exists($path))
        {
            if ($dh = opendir($path))
            {
                while (($file = readdir($dh)) !== false)
                {
                    if($file !== '.' && $file !== '..')
                    {
                        array_push(
                            $photos,
                            $file
                        );
                    }
                }
                closedir($dh);
            }

            return $photos;
        }else{
            return false;
        }

    }

    public function getRealIP()
    {
        if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) &&  $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
        {
            $client_ip =( !empty($_SERVER['REMOTE_ADDR']) ) ?$_SERVER['REMOTE_ADDR']:( ( !empty($_ENV['REMOTE_ADDR']) ) ?$_ENV['REMOTE_ADDR']:"unknown" );

            // los proxys van añadiendo al final de esta cabecera
            // las direcciones ip que van "ocultando". Para localizar la ip real
            // del usuario se comienza a mirar por el principio hasta encontrar
            // una dirección ip que no sea del rango privado. En caso de no
            // encontrarse ninguna se toma como valor el REMOTE_ADDR

            $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

            reset($entries);
            while (list(, $entry) = each($entries))
            {
                $entry = trim($entry);
                if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
                {
                    // http://www.faqs.org/rfcs/rfc1918.html
                    $private_ip = array(
                        '/^0\./',
                        '/^127\.0\.0\.1/',
                        '/^192\.168\..*/',
                        '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                        '/^10\..*/');

                    $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

                    if ($client_ip != $found_ip)
                    {
                        $client_ip = $found_ip;
                        break;
                    }
                }
            }
        }
        else
        {
            $client_ip =
                ( !empty($_SERVER['REMOTE_ADDR']) ) ?
                    $_SERVER['REMOTE_ADDR']
                    :
                    ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
                        $_ENV['REMOTE_ADDR']
                        :
                        "unknown" );
        }
        return $client_ip;
    }
    
    public function printR($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public function get_url_contents($url,$private=false)
    {
        try
        {
            $username='';
            $password='';
            
            if($private)
            {
                $username=URL_ASS_USER;
                $password=URL_ASS_PASS;
            }
           

            $crl = curl_init();
            curl_setopt($crl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
            curl_setopt($crl, CURLOPT_URL, $url);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($crl, CURLOPT_USERPWD, "$username:$password");
            curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, 50);

            $ret = curl_exec($crl);

            if (FALSE === $ret)
            {
                throw new Exception(curl_error($crl), curl_errno($crl));
            }
            curl_close($crl);
            return $ret;

        } catch(Exception $e)
        {
            //echo 'Curl failed code '.$e->getCode().' Message: '.$e->getMessage();
            return false;
        }
    }

    public function validate_cc_number($cc_number) {
        /* Validate; return value is card type if valid. */
        $false = false;
        $card_type = "";
        $card_regexes = array(
            "/^4\d{12}(\d\d\d){0,1}$/" => "visa",
            "/^5[12345]\d{14}$/"       => "mastercard",
            "/^3[47]\d{13}$/"          => "amex",
            "/^6011\d{12}$/"           => "discover",
            "/^30[012345]\d{11}$/"     => "diners",
            "/^3[68]\d{12}$/"          => "diners",
        );

        foreach ($card_regexes as $regex => $type) {
            if (preg_match($regex, $cc_number)) {
                $card_type = $type;
                break;
            }
        }

        if (!$card_type) {
            return $false;
        }

        /*  mod 10 checksum algorithm  */
        $revcode = strrev($cc_number);
        $checksum = 0;

        for ($i = 0; $i < strlen($revcode); $i++) {
            $current_num = intval($revcode[$i]);
            if($i & 1) {  /* Odd  position */
                $current_num *= 2;
            }
            /* Split digits and add. */
            $checksum += $current_num % 10; if
            ($current_num >  9) {
                $checksum += 1;
            }
        }

        if ($checksum % 10 == 0) {
            return $card_type;
        } else {
            return $false;
        }
    }

    function unserilizeArray($array)
    {
        //////// ::UNSERIALIZE DATA:: ////////
        $dataArray=array();
        foreach($array as $k=>$d)
        {
            $dataArray[$d['name']] = $d['value'];
        }
        return $dataArray;
    }

    function pr($array)
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
    
    function getEmailTemplate($file_template,$template_data,$template_replace)
    {
        $htmlContent = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/public/email_templates/'.$file_template);
        $htmlContent = str_replace($template_data, $template_replace, $htmlContent);
        return $htmlContent;
    }
    
    function paginateThis($count,$function,$limite=false,$page=false)
    {
        if(Session::get('page') )
        {
            $pagina=Session::get('page');
        }elseif($page)
        {
            $pagina=$page;
        }
        else{
            $pagina=1;
         }

        if(Session::get('count'))
        {
            $count=Session::get('count');
        }elseif($count && !Session::get('count') ){
            $count=$count;
        }
        else
        {
            Session::set('count',$count);
        }


        $this->getLibrary('class.paginador');
        $paginador=new Paginador();
        $l=$limite;
        $paginador->paginar($count,$pagina,$l);
        $this->_view->paginacion = $paginador->getView('paginator',$function);
        return $this->_view->paginacion;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    public function dataStuff()
    {
        $Enterprise = Session::get('Shopping');
        #$this->pr($Enterprise);

        $hm = 0;
        $cycler = 0;
        if(!empty($Enterprise))
        {
            $gtotal=0;
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
                        if(isset($Enterprise['Enterprise'][$e]['stuff'][$s_id]['how_many']))
                        {
                            $hm += intval($Enterprise['Enterprise'][$e]['stuff'][$s_id]['how_many']);
                            $gtotal += $Enterprise['Enterprise'][$e]['stuff'][$s_id]['how_many'] * $Enterprise['Enterprise'][$e]['stuff'][$s_id]['price'];
                        }
                    }
                }
                $cycler += CYCLER;
            }

            Session::write('HowMany',$hm);
            Session::write('gtotal',$gtotal);
            Session::write('cycler',$cycler);
            Session::write('Shopping',$Enterprise);
            #echo Session::get('gtotal');
        }else{
            return false;
        }

    }

    public function cyclerCostDistance($geo_lat_c,$geo_lng_c,$geo_lat_e,$geo_lng_e)
    {
        /*
         case 'km':
            $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
            break;
        case 'mi':
            $distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
            break;
        case 'nmi':
            $distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
        */
        $degrees = rad2deg(acos((sin(deg2rad($geo_lat_c))*sin(deg2rad($geo_lat_e))) + (cos(deg2rad($geo_lat_c))*cos(deg2rad($geo_lat_e))*cos(deg2rad($geo_lng_c-$geo_lng_e)))));
        $distance = $degrees * 111.13384; #KM

        $kmDistance = round($distance, 0, PHP_ROUND_HALF_UP);
       
        return $kmDistance;
    }
    
    public function CO2KG($kmDistance)
    {
        $Emissions = ($kmDistance * .11) * 2;
        return $Emissions;
    }

    public function countShoppings($table,$user_id)
    {
        $this->shop=$this->loadModel('db');
        $Shoppings = $this->shop->select_count($table,"user_id", array("user_id" => $user_id));
        return $Shoppings;
    }

     
}
