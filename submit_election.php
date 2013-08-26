<?php
	include_once 'php_headers/headers.php';
	global $db;
	global $user;
	$status="";
	$msg="";
	if (isset($_POST['electionID']))
		$electionID = $_POST['electionID'];
	
	if (!isset($_POST['condition']) ||  $_POST['condition'] != 'accept') {
		$status='failed';	
		$msg = 'شما شرایط برگزاری انتخابات را نپذیرفته‌اید';
	} 
	else 
	if (isset($_POST['electionID']) && isset($_POST['candidate'])) {
		$votes = $_POST['candidate'];
		$election = new election($db, $electionID);
		if (count($votes) > $election->electingNumber) {
			$status='failed';
			$msg = 'شما تنها مجاز به انتخاب '.$election->electingNumber.' کاندیدا هستید';
		} else {
			$v = $user->setVotes($election,$votes);
			switch ($v) {
				case 0:
					$status='success';
					$msg = 'تعداد '.count($votes).' رای برای '.$election->name.' از طرف شما ثبت شد';
					//check if new election available
					$e2 = new election($db, $electionID+1);
					if ($e2->getData()) $electionID++;
					break;
				case 1:
					$status='failed';
					$msg= 'انتخابات هنوز شروع نشده است';
					break;
				case 2:
					$status='failed';
					$msg= 'مهلت انتخابات تمام شده است';
					break;
				default:
					$status='failed';	
					$msg = 'عملیات با شکست مواجه شد';			
			}
			if ($status == 'failed')
				$msg = '('.$v.') '.$msg;			
		}

	} else {
		$status='failed';	
		$msg = 'تغییرات قابل اعمال نیست';			
	}
	$param = array();
		if (isset($electionID)) $param['appid']=$electionID;
	$param['status']=$status;
	$param['msg']=$msg;
	
	header('Location: index.php?'.http_build_query($param));
?>