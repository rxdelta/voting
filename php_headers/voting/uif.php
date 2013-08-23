<?php
	
	function showUserInfo($info,$app) {
?>
		<div id="userinfo">
			<table id="userinfo-maintable" cellspacing="3px" width="100%">
				<tr>
					<td colspan="2" height="50px">
						<table>
							<tr>
								<td><img src="html_headers/images/user.png" /></td>
								<td><span id="userinfo-title"> مصطفی نظری </span></td>
							</tr>
						</table>
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
											$appItem = array('ID' =>'none','name'=>'none');
							?>
								<td width="<?=$w?>px" height="<?=$h?>px" style="padding-bottom:<?=$sp?>px;padding-top:<?=$sp?>px;">
									<div 
										id="appshortcut<?=$appItem['ID']?>"
										index="<?=$itemIndex?>"
										appid="<?=$appItem['ID']?>" 
										class="<?=$appItem['ID']=='none'?'no-app':'app'?>" 
										<?php if ($appItem['ID']!='none') : ?>
										style="background-image: url('app/image/<?=$appItem['ID']?>.png');" 
										<?php endif;?>
										title="<?=$appItem['name']?>" 
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
						</div>
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
	
	function showIndexPage() {
?>
		<div id="indexpage-banner">
		</div>
		<div id="index-items">
			<table width="100%">
				<tr>
					<td valign="top" width="23%" height="100%">
						<div class="index-item">
							<div class="index-item-title">
								هیئت مدیره انجمن دانش‌آموختگان
							</div>
							<div class="index-item-content">
								انتخابات هیئت مدیره انجمن دانش‌آموختگان استعدادهای درخشان (سمپاد یزد) هر دوسال یک بار در مجمع عمومی انجمن و با شرکت اعضای آن برگزار می‌گردد.
								<a href="http://www.sampad.info"> (بیشتر درباره انجمن سمپاد بدانید...) </a>
							</div>
						</div>
					</td>
					<td valign="top" width="46%" height="100%">
						<div class="index-item">
							<div class="index-item-title">
								راهنمای عضویت و شرکت در انتخابات
							</div>
							<div class="index-item-content">
								چهارمین دوره انتخابات هیئت مدیره و بازرس هیئت مدیره انجمن سمپاد یزد در پنجم شهریورماه ۱۳۹۲
								 (سه‌شنبه) برگزار می‌گردد. تمامی اعضای رسمی انجمن سمپاد می‌توانند در این 
								انتخابات شرکت کرده و به 
								<u>پنج نفر</u>
								از کاندیداهای هیئت مدیره و 
								<u>یک نفر</u>
								 از کاندیداهای بازرس هیئت مدیره
								رای دهند. انتخابات به دو صورت حضوری (در محل پارک علم و فناوری یزد)
								و اینترنتی (در این پایگاه وب) برگزار گردیده و هردو همزمان پایان می‌یابند.
								شرایط انتخابات انجمن سمپاد را در
								<a href="http://news.sampad.info/article253.html">اینجا</a> و 
								<a href="http://news.sampad.info/article254.html">اینجا</a> ببینید.<br/>
								داوطلبان شرکت در انتخابات به صورت <u>اینترنتی</u> پس از دریافت نام کاربری و کلمه عبور خود از مدیریت انجمن
								می‌توانند با ورود به این سیستم در زمان اعتبار انتخابات، آرای خود را وارد نمایند.
								<u>
									توجه داشته باشید، در زمان شرکت در انتخابات و ثبت آرا، در هردو انتخابات 
									<span style="font-size: 18pt">اعضای هیئت مدیره و بازرسین</span>
									شرکت نمایید
								</u>
							</div>
						</div>
					</td>
					<td valign="top" width="31%" height="100%">
						<div class="index-item">
							<div class="index-item-title">
								درباره انتخابات اینترنتی
							</div>
							<div class="index-item-content">
								پایگاه وب انتخابات انجمن سمپاد برای سهولت فرآیند برگزاری انتخابات انجمن و به همت جمعی از دانش‌آموختگان
								این انجمن طراحی شده و برای اولین بار در چهارمین دوره انتخابات هیئت مدیره و بازرسین انجمن سمپاد بهره‌برداری می‌شود.
								از این سامانه می‌توان رای برگزاری تمامی انتخابات انجمن (اعم از انتخاب اعضا مانند انتخابات هیئت مدیره و یا رای گیری از اعضای سمپاد در زمینه‌های مختلف) بهره برد.<br/>
								از مزایای این پایگاه وب، ثبت آرای افراد به صورت امن است، به نحوی که تنها اطلاعات تجمعی قابل بازیابی بوده و رای افراد برای شخص رای دهنده محفوظ خواهد بود
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">
			$(document).ready(function(e) {
				
				$('#indexpage-banner').fadeIn(1000);
			});
		</script>
<?php
	}
?>
