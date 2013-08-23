<?php
	if (file_exists('../php_headers/headers.php')){
		include_once '../php_headers/headers.php';
		include_once '../php_headers/uif.php';
		include_once '../php_headers/voting/uif.php';
	}
	global $user;
	global $db;
	getContent();
?>