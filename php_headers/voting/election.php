<?php

class election{
    private $db;
    private $ID=0;
    private $votes=array();
    private $candidates=array();
    private $data=array();
            
    function election($db,$ID=0){
        $this->db=$db;
        if((int)$ID!=0){
            $this->ID=(int)$ID;
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
        
        if(isset($data['candidate'])&&!empty($data['candidate'])){
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
            if($result){
                $result=$this->db->fetchArray($result);
                $this->data=$result[0];
            }
            
            $query="SELECT * FROM vote where electionID =".$this->ID;
            $result=$this->db->getQuery($query);
            if($result){
                $result=$this->db->fetchArray($result);
                foreach ($result as $var) {
                    $this->candidates[$var['candidateID']]=new candidate($var['candidateID']);
                    $this->data['candidates'][$var['candidateID']]=$this->candidates[$var['candidateID']]->getData();
                    $this->votes[$this->data['candidates'][$var['candidateID']]['name']]=$result['vote'];
                }
            }
                      
        }
        
        return $this->data;
    }
    
    function setVotes($added,$removed=null){
        if(!is_null($removed) && !empty($removed)){
            foreach ($removed as $key=>$var){
                if(isset($this->data['candidates'][$key])){
                    $this->data['candidates'][$key]->removeVote($var);
                }
            }
        }
        if(!empty($added)){
            foreach ($added as $key=>$var){
                if(isset($this->data['candidates'][$key])){
                    $this->data['candidates'][$key]->addVote($var);
                }
            }
        }
        
        $this->getElectionData();
    }
    
    function getVotes(){
        if(empty($this->votes)){
            $this->getElectionData(); 
        }
        return $this->votes;
    }
}

?>
