<?php

class election{
    private $db;
    public $ID=0;
    private $votes=array();
    public $candidates=array();
    private $data=array();
            
    function election($db,$ID=0){
        $this->db=$db;
        if((int)$ID!=0){
            $this->ID=(int)$ID;
			$this->getElectionData();
        }
    }
    
    function setElectionData($data){
        $electingNumber=(isset($data['electingNumber'])&&((int)$data['electingNumber'])!=0)?(int)$data['electingNumber']:(isset($this->data['electingNumber'])?$this->data['electingNumber']:1);
        $description=isset($data['description'])?mysql_real_escape_string($data['description']):(isset($this->data['description'])?$this->data['description']:'');
        $name=isset($data['name'])?mysql_real_escape_string($data['name']):(isset($this->data['name'])?$this->data['name']:'voting');
        $startTime=isset($data['startTime'])?dateToDBTimestamp($data['startTime']):(isset($this->data['startTime'])?'timestamp('.$this->data['startTime'].')':'current_timestamp');
        $endTime=isset($data['endTime'])?dateToDBTimestamp($data['endTime']):(isset($this->data['endTime'])?'timestamp('.$this->data['endTime'].')':'TIMESTAMPADD(day,1,current_timestamp)');
        if($this->ID==0){
            $query='insert into election (electingNumber, name, description, startTime, endTime) values ('.$electingNumber.', "'.$name.'", "'.$description.'", '.$startTime.', '.$endTime.');';
            $result=$this->db->getQuery($query);
            if($result){
                $this->ID=$this->db->insertId();
            }
        }else{
            $query='update election set electingNumber='.$electingNumber.', name="'.$name.'", description="'.$description.'", startTime='.$startTime.', endTime='.$endTime.' where ID='.$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                $this->ID=$this->db->insertId();
            }
        }
        
        if(isset($data['candidate'])&& count($data['candidate'])>0){
            $this->candidates=array();
            foreach($data['candidate'] as $var){
                $tmp=new candidate($this->db,  $this->ID);
                $tmp->setData($var);
            }
        }
    }
    
    function getElectionData(){
        if($this->ID!=0){
            $query="SELECT * FROM election where ID =".$this->ID;
            $result=$this->db->getQuery($query);
            if($result && ($result=$this->db->fetchArray($result))){
                
                $this->data=$result[0];

				$query="SELECT * FROM vote where electionID =".$this->ID;
				$result=$this->db->getQuery($query);
				
				if($result && ($result=$this->db->fetchArray($result))){
					foreach ($result as $var) {
						$this->candidates[$var['candidateID']]=new candidate($this->db, $this->ID, $var['candidateID']);
						$this->data['candidates'][$var['candidateID']]=$this->candidates[$var['candidateID']]->getData();
						$this->votes[$this->data['candidates'][$var['candidateID']]['name']]=$var['vote'];
					}
				}				
            } else {
				$this->data = false;
            }
        }
        return $this->data;
    }
    
    function setVotes($added,$removed){
        if(!is_null($removed) && count($removed)>0){
            foreach ($removed as $key=>$var){
                if(isset($this->candidates[$key])){
                    if(!$this->candidates[$key]->removeVote($var)){
                        return false;
		    }
                }
            }
        }
        if(!is_null($added) && count($added)>0){
            foreach ($added as $key=>$var){
                if(isset($this->candidates[$key])){
                    if(!$this->candidates[$key]->addVote($var))
                        return false;
                }
            }
        }
        
        $this->getElectionData();
        
        return true;
    }
    
    function getVotes(){
        if(count($this->votes)==0){
            $this->getElectionData(); 
        }
        return $this->votes;
    }
	
	function getData() { return $this->data; }
	
	function __get($name) {
		if ($name == 'ID') return $this->ID;
		else
		if (isset($this->data) && isset($this->data[$name])) return ($this->data[$name]);
		else
		return null;
	}
	
        function timeValidation(){
            $query='select true from election where (current_timestamp between startTime and endTime) and ID ='.$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                $result=$this->db->fetchArray($result);
                if($result and count($result)>0){
                    return true;
                }
            }
            return false;
        }
        
	function getTimeDeltaTime() {
		$q = "SELECT current_timestamp - `startTime` as `toStart`,  `endTime` - current_timestamp  as `toEnd`  FROM `election` WHERE ID=".$this->ID;
		$result = $db->getQuery($q);
		$result=$db->fetchArray($result);
		return $result[0];	
	}
	
	static function getAllElectionList($db) {
		$q = "SELECT `ID`,`name` FROM `election` WHERE deleted IS NULL";
		$result = $db->getQuery($q);
		$result=$db->fetchArray($result);
		return $result;
	}
	
	static function getValidElectionList($db) {
		$q = "SELECT `ID`,`name` FROM `election` WHERE deleted IS NULL AND `startTime` > current_timestamp AND  `endTime` > current_timestamp";
		$result = $db->getQuery($q);
		$result=$db->fetchArray($result);
		return $result;		
	}
	
	
}

?>
