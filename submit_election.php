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
			if ($user->setVotes($election,$votes)) {
				$status='success';
				$msg = 'تعداد '.count($votes).' رای برای '.$election->name.' از طرف شما ثبت شد';
				//check if new election available
				$e2 = new election($db, $electionID+1);
				if ($e2->getData()) $electionID++;
			} else {
				$status='failed';	
				$msg = 'عملیات با شکست مواجه شد';			
			}
		}

	}
	header('Location: index.php?'.(isset($electionID)?'appid='.$electionID.'&':'').'status='.$status.'&msg='.$msg);
?>