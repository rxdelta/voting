<?php
	$status="";
	$message="";
	if (file_exists('../php_headers/headers.php'))
		include_once '../php_headers/headers.php';
	global $user;
	if ($user->status == true) {
		$message = "";
	} else {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if ($user->login($username, $password)) {
				$status="success";
				$message="";
			} else {
				$status="failed";
				$message="نام کاربری یا کلمه عبور اشتباه است";
			}
		} else if (!isset($_GET['initial'])) {
			//$status="failed";
			//$message="نام کاربری یا کلمه عبور وارد نشده است";
		}
	}
	
	if ($user->status == true) :
?>
				<span><?=$user->name?></span> خوش آمدید. &nbsp;<a href="logout.php">(خروج از سیستم)</a>
<?php			if (file_exists('../php_headers/headers.php')) : ?>
					<script type="text/javascript">
						//$(document).ready(function(e) {
							var id="#content";
							$.ajax('ui_ajax/getcontent.php').done(
									function(response){
										if(response!=''){
											$(id).fadeOut(400, function() {
												$(id).html(response).fadeIn(400, function() {
													$('.app').first().click();
												});
												reload_all();
												
											});
										} else {
											$('#login-info').html("دریافت اطلاعات ناموفق بود");
										}
									}
								);
						
						//});
					</script>
<?php
				endif;
	else :
?>
				<table cellspacing="0">
					<tr>
						<td> نام کاربری:</td>
						<td> <input type="text" name="username" id="username" /> </td>
						<td> &nbsp;&nbsp;کلمه عبور: </td>
						<td> <input type="password" name="password" id="password" /> </td>
						<td> <button class="button" type="submit" style="margin-right:5px;" id="login-button"><span style="top: -3px; position: relative;">ورود</span></button> </td>
						<td> &nbsp;&nbsp;&nbsp;<span class="message<?=" message".$status?>" id="login-info"> <?=$message?> </span></td>
					</tr>
				</table>
				<script type="text/javascript">
					$(document).ready(function(e) {
						$('#login-button').click( function() {
							var u = $('#username').val();
							var p = $('#password').val();
							var id='#login-bar';
							$.ajax('ui_ajax/login.php',{type:'POST',data:'username='+encodeURIComponent(u)+'&password='+encodeURIComponent(p)}).done(
									function(response){
										if(response!=''){
											$(id).fadeOut(400, function() {$(id).html(response).fadeIn(400);});
										} else {
											$('#login-info').html("دریافت اطلاعات ناموفق بود");
										}
									}
								);
						});
					});
				</script>
<?php
	endif;
?>
