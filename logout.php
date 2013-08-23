<?php
	include_once 'php_headers/headers.php';
	global $user;
	$user->logout();
	header('Location: index.php');