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
<?php
	if (isset($_SESSION['uname'])) :
?>
			<div id="user-console">
				<?= $_SESSION['uname'] ?>&nbsp;<a href="logout.php">(خروج)</a>
			</div>
<?php
	else :
?>
			<div id="login-bar">
				<form action="login.php" method="post">
					<table cellspacing="0">
						<tr>
							<td> نام کاربری:</td>
							<td> <input type="text" name="uname" /> </td>
							<td> &nbsp;&nbsp;کلمه عبور: </td>
							<td> <input type="password" name="password" /> </td>
							<td> <button class="button" type="submit" style="margin-right:5px;"><span style="top: -3px; position: relative;">ورود</span></button> </td>
						</tr>
					</table>
				</form>
			</div>
<?php
	endif;
?>			
		</div>
		<a href="http://www.sampad.info/"><div id="logo"></div></a>
	</div>
	<div id="content">
<?php
	}
	
	function getFooter() {
	?>
	</div>
	<div id="bottom">
		Copyright© 2013 by <a href="www.sampad.info">Sampad Comunity</a>. all rights reseved<br/>designed by <a href="mailto:me@mnazari.ir">rxdelta</a> & <a href="mailto:h.bahadorzadeh@gmail.com">hbx</a>
	</div>
</body>
</html>
	<?php
	}
	
	
?>