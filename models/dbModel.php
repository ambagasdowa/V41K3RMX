<?php
class dbModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function query($query){
        try{

            $stmt = $this->db->query($query);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["error_info"] = $stmt->errorInfo();
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_count($table,$columns, $where, $clause='and'){
        try {

            $a=array();
            $w = "";

            foreach ($where as $key => $value) {
                $w .= " $clause " . $key . " like :" . $key;
                $a[":" . $key] = $value;
            }

            $w = ($clause==='or') ? ' AND ('.substr($w,3).')' : $w;

            $query="select COUNT(".$columns.") as count from ".$table." where 1=1 ". $w;

            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
#   print_r($rows);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_count_where($table,$columns, $where){
        try{
            $query="select COUNT(".$columns.") as count from ".$table." where 1=1 ". $where;
            $stmt = $this->db->prepare($query);

            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
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
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_data($table, $columns, $where,$page=false,$limit=false,$order=false,$o_by=false,$rand=false){
        try{

            $a = array();
            $w = "";
            $l="";
            $r="";
            $o = (!empty($order)) ? ' ORDER BY ' : '';

            if(!empty($where))
            {
                foreach ($where as $key => $value) {
                    $w .= " and " . $key . " like :" . $key;
                    $a[":" . $key] = $value;
                }
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

            if($rand)
            {
                $r = 'ORDER BY RAND() ';
            }


            $query ="SELECT ".$columns." FROM ".$table." WHERE 1=1 ". $w .$o.$order." ".$o_by." ".$r.$l;
            #echo $query;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_data_rand($table, $columns, $where,$limit=false,$order=false,$in=false){
        try{

            $l = (!empty($limit))   ? ' LIMIT  '.$limit: ' ';
            $o = (!empty($order))   ? ' ORDER BY '.$order : ' ORDER BY RAND() ';
            $i = (!empty($in))      ? ' AND '.$in.' ' : '' ;
            $w = "";
            $a = array();
            if(!empty($where))
            {
                foreach ($where as $key => $value) {
                    $w .= " and " .$key. " like :".$key;
                    $a[":".$key] = $value;
                }
            }
            $query="SELECT ".$columns." FROM ".$table." WHERE 1=1 ".$w.$i.$o.$l;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select2($table, $columns, $where, $order){
        try{
            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }

            $query="select ".$columns." from ".$table." where 1=1 ". $w." ".$order ;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_data_where($table, $columns, $where){
        try{
            $a = array();
            $w = "";

            $query="select ".$columns." from ".$table." where ". $where;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public function select_data_where_order($table, $columns, $where,$order){
        try{
            $a = array();
            $w = "";
            $o = (!empty($order)) ? ' ORDER BY ' : '';

            $query="select ".$columns." from ".$table." where ". $where." ".$o.$order;
            #echo $query;
            $stmt = $this->db->prepare($query);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = (count($rows)<=0) ? false : $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }

    public  function insert($table, $columnsArray, $requiredColumnsArray) {
        $this->verifyRequiredParams($columnsArray, $requiredColumnsArray);

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

            $query="INSERT INTO $table($c) VALUES($v)";
            /*echo $query;
            print_r($a);*/

            $stmt =  $this->db->prepare($query);
            $stmt->execute($a);

            $affected_rows = $stmt->rowCount();
            $lastInsertId = $this->db->lastInsertId();

            if($affected_rows==0)
            {
                $response["status"] = "error";
                $response["message"] = 'Error';
                $response["error_info"] = $stmt->errorInfo();
            }else{
                $response["status"] = "success";
                $response["message"] = 'Data saved';
                $response["data"] = $lastInsertId;
            }


            #return true;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Insert Failed: ' .$e->getMessage();
            #$response["message"] = 'Error saving data';

            $response["data"] = 0;
            #return false;
        }
        return $response;
    }

    public function update($table, $columnsArray, $where){
        #$this->verifyRequiredParams($columnsArray, $requiredColumnsArray);
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
                $response["status"] = "error";
                $response["message"] = "No row updated";
                $response["error_info"] = $stmt->errorInfo();
            }else{
                $response["status"] = "success";
                $response["message"] = "Data updated in database";
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
                $query="DELETE FROM $table WHERE 1=1 ".$w;

                $stmt =  $this->db->prepare($query);
                $stmt->execute($a);
                $affected_rows = $stmt->rowCount();
                if($affected_rows<=0){
                    // $response["status"] = "warning";
                    // $response["message"] = "No row deleted";
                    return false;
                }else{
                    return true;
                    // $response["status"] = "success";
                    // $response["message"] = $affected_rows." row(s) deleted from database";

                }
            }catch(PDOException $e){
                $response["status"] = "error";
                $response["message"] = 'Delete Failed: ' .$e->getMessage();
            }
        }
        //return $response;
    }

    function verifyRequiredParams($inArray, $requiredColumns) {
        $error = false;
        $errorColumns = "";
        foreach ($requiredColumns as $field) {
            // strlen($inArray->$field);
            if (!isset($inArray->$field) || strlen(trim($inArray->$field)) <= 0) {
                $error = true;
                $errorColumns .= $field . ', ';
            }
        }

        if ($error) {
            $response = array();
            $response["status"] = "error";
            $response["message"] = 'Required field(s) ' . rtrim($errorColumns, ', ') . ' is missing or empty';
            return $response;
            exit;
        }
    }

    function getFirstPhoto($p_id,$fields='prop_id,name_photo')
    {
        $conditions = array('prop_id'=>$p_id,'order_photo'=>1);
        $photo = $this->select_row('m_properties_photo', $fields, $conditions);
        if($photo)
        {
            $image="/public/uploads/photos/".Session::get('company')."/property/".$photo['prop_id']."/".$photo['name_photo'];

            return $image;
        }else{

            return '/public/img/sample.png';
        }
    }

    public function saveMessage($data)
    {
        $res=$this->insert('email_messages',$data,array());
        if($res['status']=='success') {
            return $res;
        }else{
            return false;
        }

    }
}
