<?php
class candidate{
    
    private $db;
    private $ID=0;
    private $electionID;
    private $data=false;
	
	function __get($name) {
		if ($name == 'ID') return $this->ID;
		else
		if (isset($this->data) && isset($this->data[$name])) return ($this->data[$name]);
		else {
			$q = "SELECT `data` FROM `candidatedata` WHERE `CandidateID`=".$this->ID." AND `type`='".$name."'";
			if ( ($result = $this->db->getQuery($q)) && ($result = $this->db->fetchArray($result))) {
				return $result['data'];
			} else
				return null;
		}
	}
	
	function getAttributeList() {
		$q = "SELECT `type`, `data` FROM `candidatedata` WHERE `CandidateID`=".$this->ID;
		if ($result = $this->db->getQuery($q)) {
			$array = $this->db->fetchArray($result);
			return $array;
		} else
			return null;
	}
            
    function candidate($db,$electionID,$candidateID=null){
        $this->db=$db;
        $this->electionID=$electionID;
        if(!is_null($candidateID)){
            $this->ID=$candidateID;
            $this->getCandidate($candidateID);
        }
    }
    
    function getCandidate(){
        if($this->ID!=0){
            $query='SELECT * FROM candidate WHERE ID='.$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                if ($result=  $this->db->fetchArray($result))
					$this->data=$result[0];
            }
        }
    }
    
    function getData(){
        if($this->data==false && $this->ID!=0){
            $this->getCandidate();
        }
        return $this->data;
    }
    
    function setData($data){ 
        $name=isset($data['Name'])?mysql_real_escape_string($data['Name']):'';
        $description=isset($data['Description'])?mysql_real_escape_string($data['Description']):'';
        if($this->ID==0){            
            $query='INSERT INTO candidate (`name`,`description`)VALUES("'.$name.'","'.$description.'")';
            $result=$this->db->getQuery($query);
            if($result){
                $this->ID=$this->db->insertId();
                return $this->ID;
            }else{
                return false;
            } 
        }else{
            $ID=$this->ID;
            if($data['delete']){
                $query='UPDATE candidate SET `deleted`=current_timestamp WHERE `ID`='.$ID;
            }else{
                $query='UPDATE candidate SET `name`="'.$name.'" , `description`="'.$description.'" WHERE `ID`='.$ID;
                $result=$this->db->getQuery($query);
                if($result){
                    return $this->ID;
                }else{
                    return false;
                }
            }
        }
    }
    
    function addVote($number=1){
        $number=(int)$number;
        if($number!=0){
            $query='update `vote` set `vote`=`vote`+'.$number.' where electionID='.$this->electionID.' and candidateID='.$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                return true;
            }else{
                $this->db->rollbackTransaction();
                return false;
            } 
        }else{
            $this->db->rollbackTransaction();
            return false;
        } 
    }
    
    function removeVote($number=1){
        $number=(int)$number;
        if($number!=0){
            $query='update `vote` set `vote`=`vote`-'.$number.' where electionID='.$this->electionID.' and candidateID='.$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                return true;
            }else{
                $this->db->rollbackTransaction();
                return false;
            } 
        }else{
            $this->db->rollbackTransaction();
            return false;
        } 
    }
    
}
?>
