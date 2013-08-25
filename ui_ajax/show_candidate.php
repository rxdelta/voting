<?php
	include_once '../php_headers/headers.php';
	include_once '../php_headers/voting/candidate.php';
	global $user;
	global $db;
	$cid = 0;
	if (isset($_GET['id'])) $cid = $_GET['id'];
	
	function getCandidateImage($id) {
		global $user;
		$f="";
		if (
			file_exists('../content/images/candidate/'.$id.'.jpg') || 
			file_exists('../../content/images/candidate/'.$id.'.jpg') || 
			file_exists('content/images/candidate/'.$id.'.jpg') ) {
				$f = $id.'.jpg';
		} else if (
			file_exists('../content/images/candidate/'.$id.'.jpeg') || 
			file_exists('../../content/images/candidate/'.$id.'.jpeg') || 
			file_exists('content/images/candidate/'.$id.'.jpeg') ) {
				$f = $id.'.jpeg';
		} else if (
			file_exists('../content/images/candidate/'.$id.'.png') || 
			file_exists('../../content/images/candidate/'.$id.'.png') || 
			file_exists('content/images/candidate/'.$id.'.png') ) {
				$f = $id.'.png';
		} else {
			return "html_headers/images/no-profile-img.gif";
		}
		return "content/images/candidate/".$f;
	}
	$c = NULL;
	if ($cid != 0) {
		$c = new candidate($db,0,$cid);
		if (!$c->getData()) $c = NULL;
	}
	
	if ($c != NULL) {
?>
							<table width="100%">
								<tr>
									<td width="200px" rowspan="2">
										<div id="userinfo-image" style="padding:10px 0px;"><img src="<?=getCandidateImage($c->ID)?>" width="180px" height="244px" style="margin:10px"/></div>
									</td>
									<td height="60px">
										<div id="candidate-name"><?=$c->name?></div>
									</td>
								</tr>
								<tr>
									<td valign="top">
										<div id="candidate-desc"><?=$c->description?></div>
									</td>
								</tr>
							</table>
<?php
	}
	else {
?>
	اطلاعات کاندیدا موجود نیست
<?php
	}
?>