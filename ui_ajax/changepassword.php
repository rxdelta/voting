<?php
include_once "../php_headers/headers.php";
global $db;
global $user;

if (isset($_POST['old']) && isset($_POST['new'])) {
	$record = array ( 'password' => array('oldpass' => $_POST['old'], 'newpass' => $_POST['new']));
	if (!$user->isOldPasswordEquals($record['password']['oldpass'])) {
		echo 'کلمه عبور قدیمی با اطلاعات پایگاه داده مطابقت ندارد';
	} else if ($user->setUserData($record,0)) {
		echo 'عملیات تغییر موفقیت آمیز بود';
	} else {
		echo 'عملیات با شکست مواجه شد';
	}
}
?>
