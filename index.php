<?php
	include_once "php_headers/headers.php";
	include_once "php_headers/uif.php";
	include_once "php_headers/voting/uif.php";
	getHeader('صفحه اصلی');
	
	$user = array(
		array('u_name','نام','مصطفی نظری','false'),
		array('u_username','نام کاربری','rxdelta','true'),
		array('u_username','شناسه عضویت','3840103','false'),
		array('u_graddate','سال دانش‌آموختگی','1384','false'),
		array('u_grant','اعتبار عضویت','یک سال','false')		
	);
	
	$app = election::getValidElectionList($db);
	foreach ($app as $item) {
		$resDesc = str_replace("<br/>"," - ",$item[1]);
		$res[1] = $resDesc;
	}
	showUserInfo($user,$app);
	
	getFooter();
?>