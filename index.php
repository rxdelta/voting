<?php
	include_once "php_headers/headers.php";
	include_once "php_headers/uif.php";
	include_once "php_headers/voting/uif.php";
	getHeader('صفحه اصلی');
	if ($user->status) {
		
		$userinfo = array(
			array('u_name','نام','مصطفی نظری'/*$user->name*/,'false'),
			array('u_username','نام کاربری','rxdelta'/*,$user->username*/,'true'),
			array('u_username','شناسه عضویت','384003','false'),
			array('u_graddate','سال دانش‌آموختگی','1384','false'),
			array('u_grant','اعتبار عضویت','یک سال','false')		
		);
		
		$app = election::getAllElectionList($db);
		showUserInfo($userinfo,$app);
	} else {
		showIndexPage();
	}
	getFooter();
?>