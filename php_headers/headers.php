<?php
include_once 'vars.php';
include_once 'db_functions.php';
include_once 'jalaly.php';
include_once 'function.php';
include_once 'voting/voting.php';
include_once 'user.php';
include_once 'securimage/securimage.php';

my_session_start();

$db = new dblink($db['user'],$db['pass'],$db['dbname'],$db['host']);
$user = new user($db);
?>
