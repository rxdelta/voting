<?php
	include_once '../php_headers/headers.php';
	global $db;
	global $user;
	$key = 0;
	$rows=3;
	$alphanum = array (
		0 => 'صفر',
		1 => 'یک',
		2 => 'دو',
		3 => 'سه',
		4 => 'چهار',
		5 => 'پنج',
		6 => 'شش',
		7 => 'هفت',
		8 => 'هشت',
		9 => 'نه'
	);
		
	
	if (isset($_GET['id'])) {
		$key = $_GET['id'];
		$election = new election($db,$key);
		if (!$election->getData()) $key = 0;
	}
	
	if ($key > 0) :
		$elec = array();
		$uv = $user->getVotes($election);
		$uservote = array();
		foreach ($uv as $v) {
			if (!isset($uservote[$v])) {
				$uservote[$v] = 1; //a vote is given to candidate
			} else {
				$uservote[$v]++; //increase his vote count. this is not legal in checkbox election!
			}
		}
		foreach ($election->candidates as $candidate) {
			if (!isset($uservote[$candidate->ID])) {
				$uservote[$candidate->ID] = 0;
			}
			$elec[] = array($candidate->ID, $candidate->name, $uservote[$candidate->ID]); 
			
		}
	
?>
<div id="show-time">
	<span style="color:gold;">زمان شروع:</span><br/>
	<span style="background-color: rgb(120,20,120);"><?=convertTimeStampToShamsi($election->startTime, 3)?></span>
</div>
<div class="app-title">
	<?=$election->description?>
</div>
<?php 	if (isset($elec) && $elec != NULL && count($elec) > 0) :?>
<div>
	لطفا 
	<span style='color:red'><u>
		<?=$alphanum[$election->electingNumber]?>
	</u> </span>
	مورد از کاندیدهای مورد نظر خود را انتخاب کنید
</div>
<div id="candidates">
	<form method="post" action="submit_election.php">
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
								class="candidate-checkbox"
								type="checkbox" 
								name="candidate[]" 
								value="<?=$elecItem[0]?>"
								<?php if ($elecItem[2]=='1') : ?>checked = "checked"<?php endif; ?>
							/>
							<?=$elecItem[1]?>
						</label>
						<a candidate_id="<?=$elecItem[0]?>" id="can<?=$elecItem[0]?>" class="election-candidate-moreinfo" >(شناخت بیشتر)</a>
					</div>
				<?php endif;?>
				</td>
			<?php	endfor; 
					echo '</tr>';
				endfor;
			?>
		</table>
		<div id="submit-candidate">
			<label><span style="margin-right:20px;"><a target="_blank" href="http://news.sampad.info/article253.html" style="text-decoration:none;color:gold">شرایط انتخابات</a> را می‌پذیرم</span><input type="checkbox" name="condition" value="accept"/></label>
			<button class="button" type="submit" style="margin-right:5px;background-color:rgb(10,80,10);">
				<span style="top: -3px; position: relative; margin-left:10px;margin-right:10px;">ثبت رای</span>
			</button>
		</div>
	</form>
</div>
<script type="text/javascript">
		reload_candidate();
		var maxElection=<?=$election->electingNumber?>;
</script>
<?php	else : ?>
<span style="position:relative;margin-right:50px;top:10px;color:rgb(255,128,128);">هیچ کاندیدایی معرفی نشده است.</span>
<?php	
		endif;
	else :
?>
	انتخابات مورد نظر معتبر نیست
<?php
	endif;

?>
