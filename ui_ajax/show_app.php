<?php
	include_once '../php_headers/headers.php';
	$key = $_GET['id'];
	$elec =array(
				array('1','مصطفی نظری','1'),
				array('2','حامد بهادرزاده','1'),
				array('3','حامد بهادرزاده','0'),
				array('4','حامد بهادرزاده','1'),
				array('5','حامد بهادرزاده','1'),
				array('6','حامد بهادرزاده','1'),
				array('7','مصطفی نظری','1'),
				array('8','حامد بهادرزاده','1'),
				array('9','حامد بهادرزاده','1'),
				array('10','حامد بهادرزاده','1'),
				array('11','حامد بهادرزاده','1'),
				array('12','حامد بهادرزاده','1'),
				array('13','مصطفی نظری','1'),
				array('14','حامد بهادرزاده','1'),
				array('15','حامد بهادرزاده','1'),
				array('16','حامد بهادرزاده','0'),
				array('17','حامد بهادرزاده','1'),
				array('18','حامد بهادرزاده','1'),
				array('19','حامد بهادرزاده','1'),
				array('20','حامد بهادرزاده','1')
	);
	$rows=5;
	$election = new election($db,$key);
?>
<div class="app-title">
	<?=$election->description?>
</div>
<?php 	if (isset($elec) && $elec != NULL && count($elec) > 0) :?>
<div>
	لطفا کاندیدهای مورد نظر خود را انتخاب کنید
</div>
<div id="candidates">
	<form method="post" action="form/submit_election.php">
		<input type="hidden" name="electionID" value="<?=$key?>" />
		<table cellspacing="0px" cellpadding="2px" border="0px">
			<?php 
				for($i=0;$i<$rows;$i++) :
					echo '<tr>';
					for ($j=0;$j < (int)((count($elec)-1) / $rows)+1; $j++) :
						$itemIndex = $j*$rows + $i;
						if ($itemIndex < count($elec))
							$elecItem = $elec[$itemIndex];
						else
							$elecItem = array('none','none');
			?>
				<td>
				<?php if ($elecItem[0]!='none') : ?>
					<div class="election-item" title="<?=$elecItem[1]?>">
						<label>
							<input 
								id="chbox<?=$elecItem[0]?>"
								type="checkbox" 
								name="candidate[]" 
								value="<?=$elecItem[0]?>"
								<?php if ($elecItem[2]=='1') : ?>checked = "checked"<?php endif; ?>
							/>
							<?=$elecItem[1]?>
						</label>
						<a href="#moreinfo<?=$elecItem[0]?>">(اطلاعات بیشتر)</a>
					</div>
				<?php endif;?>
				</td>
			<?php	endfor; 
					echo '</tr>';
				endfor;
			?>
		</table>
		<div id="submit-candidate">
			<label><span style="margin-right:20px;">شرایط انتخابات را می‌پذیرم</span><input type="checkbox" name="condition" value="accept"/></label>
			<button class="button" type="submit" style="margin-right:5px;background-color:rgb(10,80,10);">
				<span style="top: -3px; position: relative; margin-left:10px;margin-right:10px;">ثبت رای</span>
			</button>
		</div>
	</form>
</div>
<?php	else : ?>
<span style="position:relative;margin-right:50px;top:10px;color:rgb(255,128,128);">هیچ کاندیدایی معرفی نشده است.</span>
<?php	endif ?>
