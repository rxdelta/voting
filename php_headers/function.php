<?php
        function dateToDBTimestamp($date){
            if(!is_null($date)){
                $jDate=explode("/", $date);
                $gDate=jalali_to_gregorian($jDate[0], $jDate[1], $jDate[2]);
                $date="TIMESTAMP('".$gDate[0]."-".$gDate[1]."-".$gDate[2]."')";
            }else{
                $date="CURRENT_TIMESTAMP";
            }
            return $date;
        }
	function do_post_request($url, $data, $optional_headers = null)
	{
		$params = array('http' => array(
			'method' => 'POST',
			'content' => $data
		));
		if ($optional_headers!== null)
		{
			$params['http']['header'] = $optional_headers;
		}
		$ctx = stream_context_create($params);
		$fp = @fopen($url, 'rb', false, $ctx);
		if (!$fp)
		{
			throw new Exception("Problem with $url, $php_errormsg");
		}
		$response = @stream_get_contents($fp);
		if ($response === false)
		{
			throw new Exception("Problem reading data from $url, $php_errormsg");
		}
		return $response;
	} 
        
	function fullname($firstname,$lastname,$gender)
	{
		if($gender=='m')
			$fullname='جناب آقای ';
		else if($gender=='f')
			$fullname='سرکار خانم ';
		$fullname.="$firstname $lastname";
                return $fullname;   
	}
?>