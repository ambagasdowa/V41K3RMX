<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class dbModel
{
    private $db;


    public function __CONSTRUCT()
    {
        $this->db = Database::StartUp();
    }

    public function select($table, $columns, $where,$order=false,$page=false,$limit=false){
        try{
            $l="";
            $a = array();
            $w = "";
            $o = (!empty($order)) ? ' ORDER BY '.$order : '';
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }

            if($limit) {

                if($page==1) {
                    $left=0;
                }else{
                    $left=($page-1)*$limit;
                }

                if($limit && is_numeric($limit)){
                    $limit = $limit;
                } else {
                    $limit = 10;
                }

                $l=' LIMIT '.$left.','.$limit;
            }

            $query="select ".$columns." from ".$table." where 1=1 ". $w ." ".$o.$l;

            //echo $query;

            $stmt = $this->db->prepare($query);

            $stmt->execute($a);
            $rows = $stmt->fetchAll();
            if(count($rows)<=0){
                return false;
            }else{
               return $rows;
            }

        }catch(PDOException $e){
            return false;
        }

    }

    public function select_row($table, $columns, $where){
        try{

            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }

            $query="select ".$columns." from ".$table." where 1=1 ". $w;

            #echo $query;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetch();
            if(count($rows)<=0){
                /* $response["status"] = "warning";
                 $response["message"] = "No data found.";*/
                return false;
            }else{
                /*  $response["status"] = "success";
                  $response["message"] = "Data selected from database";*/

            }
            $response = $rows;
        }catch(PDOException $e){
            return false;
        }
        return $response;
    }

    public function select_order($table, $columns, $where, $order){
        try{
            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }

            $query="select ".$columns." from ".$table." where 1=1 ". $w." ".$order ;
            #echo $query;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)<=0){
                /* $response["status"] = "warning";
                 $response["message"] = "No data found.";*/
                return false;
            }else{
                /*$response["status"] = "success";
                $response["message"] = "Data selected from database";*/
            }
            $response = $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }
    
    public function insert($table, $columnsArray) {

        try{
            $a = array();
            $c = "";
            $v = "";
            foreach ($columnsArray as $key => $value) {
                $c .= $key. ", ";
                $v .= ":".$key. ", ";
                $a[":".$key] = $value;
            }
            $c = rtrim($c,', ');
            $v = rtrim($v,', ');

            $query="INSERT INTO $table(id,$c) VALUES('',$v)";
            $stmt =  $this->db->prepare($query);
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            $lastInsertId = $this->db->lastInsertId();
            /*  $response["status"] = "success";
              $response["message"] = $affected_rows." row inserted into database";
              $response["data"] = $lastInsertId;*/
            return true;
        }catch(PDOException $e){
            /*      $response["status"] = "error";
                  $response["message"] = 'Insert Failed: ' .$e->getMessage();
                  $response["data"] = 0;*/
            return false;
        }
        //  return $response;
    }

    public function update($table, $columnsArray, $where){
        try{
            $a = array();
            $w = "";
            $c = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " = :".$key;
                $a[":".$key] = $value;
            }
            foreach ($columnsArray as $key => $value) {
                $c .= $key. " = :".$key.", ";
                $a[":".$key] = $value;
            }
            $c = rtrim($c,", ");

            $query="UPDATE $table SET $c WHERE 1=1 ".$w;
            $stmt =  $this->db->prepare($query);
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            if($affected_rows<=0){
                /* $response["status"] = "warning";
                 $response["message"] = "No row updated";*/
                return false;
            }else{
                /* $response["status"] = "success";
                 $response["message"] = $affected_rows." row(s) updated in database";*/
                return true;
            }
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = "Update Failed: " .$e->getMessage();
        }
        return $response;
    }

    public function delete($table, $where){
        if(count($where)<=0){
            $response["status"] = "warning";
            $response["message"] = "Delete Failed: At least one condition is required";
        }else{
            try{
                $a = array();
                $w = "";
                foreach ($where as $key => $value) {
                    $w .= " and " .$key. " = :".$key;
                    $a[":".$key] = $value;
                }
                $stmt =  $this->db->prepare("DELETE FROM $table WHERE 1=1 ".$w);
                $stmt->execute($a);
                $affected_rows = $stmt->rowCount();
                if($affected_rows<=0){
                    $response["status"] = "warning";
                    $response["message"] = "No row deleted";
                    return false;
                }else{
                    $response["status"] = "success";
                    $response["message"] = $affected_rows." row(s) deleted from database";
                    return true;
                }
            }catch(PDOException $e){
                $response["status"] = "error";
                $response["message"] = 'Delete Failed: ' .$e->getMessage();
            }
        }
        return $response;
    }


    public function getRealIP()
    {
        if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
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

}