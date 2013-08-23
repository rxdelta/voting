<?php
	
	function showUserInfo($info,$app) {
?>
		<div id="userinfo">
			<table id="userinfo-maintable" cellspacing="3px" width="100%">
				<tr>
					<td colspan="2" height="50px">
						<span id="userinfo-title"> مصطفی نظری </span>
					</td>
				</tr>
				<tr >
					<td width="200px" height="264px" >
						<div id="userinfo-image" style="padding:10px 0px;"><img src="content/images/mostafa.jpg" width="180px" height="244px" style="margin:10px"/></div>
					</td>
					<td rowspan="2" valign="top">
					
						<!--span class="itemtitle" style="position:relative;top:10px;">درباره‌ی من</span>
						<hr/-->
				<!--tr>
					<td height="208px" >
						<div id="userinfo-desc"></div>
					</td>
				</tr-->
					<?php 	if (isset($app) && $app != NULL && count($app) > 0) :?>
						<table cellspacing="0px" cellpadding="0px" border="0px">
							<?php 
								$rows=5; //value reference is also in all.js:$('.app').click
								$w=120;
								$h=60;
								$sp=2;
								for($i=0;$i<$rows;$i++) :
									echo '<tr>';
									for ($j=0;$j < (int)((count($app)-1) / $rows)+1; $j++) :
										$itemIndex = $j*$rows + $i;
										if ($itemIndex < count($app))
											$appItem = $app[$itemIndex];
										else
											$appItem = array('none','none');
							?>
								<td width="<?=$w?>px" height="<?=$h?>px" style="padding-bottom:<?=$sp?>px;padding-top:<?=$sp?>px;">
									<div 
										id="appshortcut<?=$appItem[0]?>"
										index="<?=$itemIndex?>"
										appid="<?=$appItem[0]?>" 
										class="<?=$appItem[0]=='none'?'no-app':'app'?>" 
										<?php if ($appItem[0]!='none') : ?>
										style="background-image: url('app/image/<?=$appItem[0]?>.png');" 
										<?php endif;?>
										title="<?=$appItem[1]?>" 
									>
									</div>
								</td>
							<?php 		if ($i==0) : ?>
								<td width="4px" height="<?=(($h+2*$sp)*$rows-2*$sp)?>px" rowspan="5" style="padding-bottom:<?=$sp+1?>px;padding-top:<?=$sp+1?>px;">
									<div id="app_show<?=$j?>" class="app-show" style="padding:<?=$sp?>px;"></div>
								</td>
							<?php 		endif; 
									endfor;
									echo '</tr>';
								endfor;
							?>
						</table>
					<?php	else : ?>
								<div><span style="position:relative;margin-right:50px;top:10px;color:rgb(255,128,128);">هیچ برنامه‌ای تنظیم نشده است.</span></div>
					<?php	endif ?>
						<div id="show-candidate">
						Test
						</div
					</td>
				</tr>
				<tr>
					<td valign="top">
						<table cellspacing="0px" width="100%">
						<?php foreach($info as $item) { ?>
							<tr><td>
								<div class="userinfo-item" title="<?=$item[1]?>" id="<?=$item[0]?>" edible="<?=$item[3]?>">
									<span class="userinfo-item-title"><?=$item[1]?>:</span>
									<span class="userinfo-item-value"><?=$item[2]?></span>
									<div class="userinfo-item-edit" style="display: none; opacity: 0.5;" title="ویرایش"></div>
									<div class="userinfo-item-submit" style="display: none; opacity: 0.5;" title="ذخیره"></div>
								</div>
							</td></tr>
						<?php } ?>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">
			$(document).ready(function(e) {
<?php
		if (isset($_GET['appid'])) :
?>
				//window.setTimeout( function() {
					$('#appshortcut<?=$_GET['appid']?>').click();
				//	}, 1000);
			<?php
				else /*if (isset($app) && $app != NULL && count($app) == 1)*/ :
			?>
					$('.app').first().click();
			<?php
				endif;
			?>
			});
		</script>
<?php
		
	}
?>
