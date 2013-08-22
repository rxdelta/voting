<?php

class link{
    private $link;
    private $preSetting=array(
            "SET NAMES utf8 collate utf8_persian_ci",
            "SET CHARACTER SET utf8",
            "SET character_set_client = utf8",
            "SET character_set_results = utf8",
            "SET character_set_connection = utf8"//,
        //    "SET SESSION time_zone = 'Asia/Tehran'"
        );
    
    public function __construct($username,$password,$host="127.0.0.1",$port="3306") {
        $this->connect($username,$password,$host,$port);
        return $this->link;
    }
    
    function connect($username,$password,$host,$port){
        $result=mysql_connect($host.":".$port, $username, $password);
        if($result){
            $this->link=$result;
            $this->set_pre_settings();
            return true;
        }else{
            return false;
        }
    }
    
    function disconnect(){
        $result=mysql_close($this->link);
        if($result){
            $this->link=false;
            return true;
        }else{
            return false;
        }
    }
    
    private function set_pre_settings(){
        foreach($this->preSetting as $var){
            $this->getQuery($var);
        }
    }
    
    function setDB($name){
        mysql_select_db($name, $this->link);
    }
    
    function getQuery($query){
        $result=mysql_query($query, $this->link);
        if($result){
            return $result;
        }else{
            $error=$query."\n".mysql_error($this->link);
            die($error);
        }
    }
    
    function fetchArray($result){
        $arrayResult=array();
        if($result){
            while($tmp=mysql_fetch_array($result)){
                $tmpArray=array();
                if(is_array($tmp)){
                    foreach ($tmp as $key => $value) {
                        if(is_string($key)){
                            $tmpArray[$key]=$value;
                        }
                    }
                }
                $arrayResult[]=$tmpArray;
            }
        }
        return $arrayResult;
    }
    
    function insertId()
    {
            return mysql_insert_id($this->link);
    }

    function affectedRows()
    {
            return mysql_affected_rows($this->link);
    }

    function startTransaction()
    {
        $this->getQuery('START TRANSACTION');
    }

    function commitTransaction()
    {
            $this->getQuery('COMMIT');
    }

    function rollbackTransaction()
    {
            $this->getQuery('ROLLBACK');
    }

}
?>