<?php
class user{
    private $db;
    private $ID=0;
    private $data=array();
    private $session=array();
    public $status=false;
    private $candidates=array();
            
    function __construct($db) {
        $this->db=$db;
        $this->session=$_SESSION;
        if(isset($this->session['status'])){
            $this->status=  $this->session['status'];
        }
        if(isset($this->session['ID'])){
            $this->ID=$this->session['ID'];
            $this->getUserData();
        }
    }
    
    function login($username,$password){
        $username=mysqli_real_escape_string($username);
        $query='select ID,roll from user where username="'.$username.'" and password="'.md5($username.$password).'";';
        $result=$this->db->getQuery($query);
        if($result){
            $result=$this->db->fetchArray($result);
            if($result){
                if($result[0]['ID']>0){
                    $this->ID=$result[0]['ID'];
                    $this->session['ID']=$this->ID;
                    $this->session['roll']=$result[0]['roll'];
                    $this->session['password']=$password;
                    $this->session['status']=true;
                    $this->status=  $this->session['status'];
                    $this->getUserData();
                    $this->saveSession();
                    return true;
                }
            }
        }else{
            return false;
        }
    }
    
    function logout(){
        $this->session=array();
        $this->data=array();
        $this->status=false;
        $this->saveSession();
    }


    private function saveSession(){
        $_SESSION=  $this->session;
    }
    
    function getVotes($election){
        $electionID=$election->ID;
        $votesResult=array();
        if(electionID>0){
            $query='select vote from uservote where userID='.$this->session['ID'].' electionID='.$electionID.';';
            $result=  $this->db->getQuery($query);
            $votes=  $this->db->fetchArray($result);
            if(count($votes)>0){
                $result=  $election->candidates;
                
                $this->candidates=array();
                $candidates=array();
                
                foreach ($result  as $var){
                    $this->candidates[$var->ID]=  md5($electionID.$var->ID.$this->session['password']);
                    $candidates[md5($electionID.$var->ID.$this->session['password'])]=  $var->ID;
                }
                
                foreach ($votes as $var){
                    if(isset($candidates[$var['vote']])){
                        $votesResult[]=$candidates[$var['vote']];
                    }
                }
            }    
        }
        return $votesResult;
    }
    
    function setVotes($election,$votes){
        $this->db->startTransaction();
        $added=isset($votes['added'])?$votes['added']:null;
        $removed=isset($votes['removed'])?$votes['removed']:null;
        if(!$election->setVotes($added,$removed))
                return false;
        if(!is_null($added) && count($added)>0){
            $query=array();
            foreach($added as $candidate=>$number){
                $query[]='('.$this->session['ID'].', '.$election->ID.',"'.  md5($election->ID.$candidate.$this->session['password']).'")';
            }
            $query='insert into uservote (userID,electionID,vote) values '.  implode(', ', $query);
            if(!$this->db->getQuery($query)){
                $this->db->rollbackTransaction();
                return false;
            }
        }
        
        if(!is_null($removed) && count($removed)>0){
            $query=array();
            foreach($removed as $candidate=>$number){
                $query[]='(vote ='.md5($election->ID.$candidate.$this->session['password']).')';
            }
            $query='delete from uservote where '.  implode(' or ', $query);
            if(!$this->db->getQuery($query)){
                $this->db->rollbackTransaction();
                return false;
            }
        }
        
        $this->db->commitTransaction();
        return true;
    }
    
    private function updateUserData($key,$var){
        $type=mysql_real_escape_string($key);
        if($type!='password'){
            $data=mysql_real_escape_string($var);
            $query='insert into userdata values('.$this->ID.',"'.$type.'","'.$data.'") on duplicate key update data="'.$data.'";';
            if($this->db->getQuery($query)){
                return true;
            }else{
                return false;
            }
        }else{
            $oldpass=mysql_real_escape_string($var['oldpass']);
            $newpass=mysql_real_escape_string($var['newpass']);
            $query='select updatepass ('.$this->ID.',"'.$oldpass.'","'.$newpass.'");';
            $result=$this->db->getQuery($query);
            if($result){
                $result=$this->db->fetchArray();
                return true;
            }else{
                return false;
            }
        }
    }
            
    private function createUser($userData){
        if(!isset($userData['username'])){
            return false;
        }else{
            $username=  mysql_real_escape_string($userData['username']);
            unset($userData['username']);
        }
        
        if(!isset($userData['password'])){
            return false;
        }else{
            $password=$userData['password'];
            unset($userData['password']);
        }
        
        $name=isset($userData['name'])? mysql_real_escape_string($userData['name']):'';
        if(!isset($userData['name'])){unset($userData['name']);}
        
        $roll=(isset($userData['roll'])&&$userData['roll']=='admin')? 'admin':'user';
        if(!isset($userData['roll'])){unset($userData['roll']);}
        
        $query='insert into user (name,username,password,roll) values ("'.$name.'","'.$username.'","'.  md5($username.$password).'","'.$roll.'")';
        if($this->db->getQuery($query)){
            $this->ID=$this->db->insertId();
        }else{
            return false;
        }
        
        foreach($userData as $key=>$var){
            $data=mysql_real_escape_string($var);
            $type=mysql_real_escape_string($key);
            $query='insert into userdata values('.$this->ID.',"'.$type.'","'.$data.'") on duplicate key update data="'.$data.'";';
            if(!$this->db->getQuery($query)){
                return false;
            }
        }
    }
    
    function setUserData($data,$ID){
        $this->db->startTransaction();
        $ID=($this->ID > 0)?$this->ID:(((int)$ID)>0?(int)$ID:0);
        if($ID > 0){
            foreach($data as $key=>$var){
                if(!$this->updateUserData($key,$var)){
                    $this->db->rollbackTransaction();
                    return false;
                }
            }
        }else{
            if(!$this->createUser($data)){
                $this->db->rollbackTransaction();
                return false;
            }
        }
        
        $this->db->commitTransaction();
        return true;
    }
    
    
    function getUserData(){
        if($this->ID>0){
            $query='select ID,name,username,roll from user where ID ='.$this->ID;
            $result=$this->db->getQuery($query);
            $result=$this->db->fetchArray($result);
            $data=$result[0];
            
            $query='select * from userdata where userID='.$this->ID;
            $result=$this->db->getQuery($query);
            $result=$this->db->fetchArray($result);
            foreach ($result as $value) {
                $data[$value['type']]=$value['data'];
            }
            
            $this->data=$data;
        }
    }
    
    function __get($name){
        if(count($this->data)>0 && isset($this->data[$name])){
            return $this->data[$name];
        }else if(count($this->data)==0){
            $this->getUserData();
            if(isset($this->data[$name])){
                return $this->data[$name];
            }
        }else{
            return null;
        }
    }
}
?>
