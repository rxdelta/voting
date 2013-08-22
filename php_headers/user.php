<?php
class user{
    private $db;
    private $session=array();
    public $status=false;
    private $candidates=array();
            
    function __construct($db) {
        $this->db=$db;
        $this->session=$_SESSION;
        if(isset($this->session['status'])){
            $this->status=  $this->session['status'];
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
                    $this->session['ID']=$result[0]['ID'];
                    $this->session['roll']=$result[0]['roll'];
                    $this->session['password']=$password;
                    $this->session['status']=true;
                    $this->status=  $this->session['status'];
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
}
?>
