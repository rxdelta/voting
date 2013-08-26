<?php
	include_once "function.php";
	
	function getHeader($title=NULL) {
		my_session_start();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta itemprop="image" content="images/favicon.png">
    <title>انجمن دانش‌آموختگان استعدادهای درخشان<?=($title!= NULL?" | ".$title:"")?></title>
    <link href="html_headers/css/style.css" rel="stylesheet" />
    <script src="html_headers/jquery-1.9.1.min.js"></script>
    <script src="html_headers/jquery-ui.min.js"></script>
    <script src="html_headers/js/all.js" type="text/javascript"></script>
</head>
<body>
	<div id="top">
		<div id="top-content">
			<div id="login-bar">
<?php	include_once 'ui_ajax/login.php'; ?>
			</div>	
			<?php if (isset($_GET['status']) && isset($_GET['msg'])) : ?>
				<div class="message-div<?=" message".$_GET['status']?>"><span class="message<?=" message".$_GET['status']?>" id="login-info"> <?=$_GET['msg']?> </span></div>
			<?php endif; ?>
		</div>
		<a target="_blank" href="http://www.sampad.info/"><div id="logo"></div></a>
	</div>
	<div id="content">
<?php
	}
	
	function getFooter() {
	?>
	</div>
	<div id="bottom">
		Copyright© 2013 by <a target="_blank" href="http://www.sampad.info/">Sampad Community</a>. all rights reseved<br/>
		designed by <a target="_blank" href="mailto:me@mnazari.ir">rxdelta</a> & <a target="_blank" href="mailto:h.bahadorzadeh@gmail.com">hbx</a>
	</div>
</body>
</html>
	<?php
	}
	
	function getContent() {
		global $user;
		global $db;
		if ($user->status) {
			
			$userinfo = array(
				array('u_name','نام',$user->name,'false'),
				array('u_username','نام کاربری',$user->username,'true'),
				array('u_username','شناسه عضویت','-','false'),
				array('u_graddate','سال دانش‌آموختگی','-','false'),
				array('u_grant','اعتبار عضویت','-','false')		
			);
			
			$app = election::getAllElectionList($db);
			showUserInfo($userinfo,$app);
		} else {
			showIndexPage();
		}
	
	}
	
?>