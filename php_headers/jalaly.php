<?php
// "jalali.php" is convertor to and from Gregorian and Jalali calendars.
// Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// A copy of the GNU General Public License is available from:
//
//    http://www.gnu.org/copyleft/gpl.html
//


function div($a,$b) {
    return (int) ($a / $b);
}

function gregorian_to_jalali ($g_y, $g_m=1, $g_d=1)
{
	if (is_array($g_y)){
		$g_d=$g_y[2];
		$g_m=$g_y[1];
		$g_y=$g_y[0];
	}
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);     
    


   

   $gy = $g_y-1600;
   $gm = $g_m-1;
   $gd = $g_d-1;

   $g_day_no = 365*$gy+div($gy+3,4)-div($gy+99,100)+div($gy+399,400);

   for ($i=0; $i < $gm; ++$i)
      $g_day_no += $g_days_in_month[$i];
   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
      /* leap and after Feb */
      $g_day_no++;
   $g_day_no += $gd;

   $j_day_no = $g_day_no-79;

   $j_np = div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
   $j_day_no = $j_day_no % 12053;

   $jy = 979+33*$j_np+4*div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */

   $j_day_no %= 1461;

   if ($j_day_no >= 366) {
      $jy += div($j_day_no-1, 365);
      $j_day_no = ($j_day_no-1)%365;
   }

   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
      $j_day_no -= $j_days_in_month[$i];
   $jm = $i+1;
   $jd = $j_day_no+1;

   return array($jy, $jm, $jd);
}

function jalali_to_gregorian($j_y, $j_m=1, $j_d=1)
{
	if (is_array($j_y)){
		$j_d=$j_y[2];
		$j_m=$j_y[1];
		$j_y=$j_y[0];
	}
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
    
   

   $jy = $j_y-979;
   $jm = $j_m-1;
   $jd = $j_d-1;

   $j_day_no = 365*$jy + div($jy, 33)*8 + div($jy%33+3, 4);
   for ($i=0; $i < $jm; ++$i)
      $j_day_no += $j_days_in_month[$i];

   $j_day_no += $jd;

   $g_day_no = $j_day_no+79;

   $gy = 1600 + 400*div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
   $g_day_no = $g_day_no % 146097;

   $leap = true;
   if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */
   {
      $g_day_no--;
      $gy += 100*div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */
      $g_day_no = $g_day_no % 36524;

      if ($g_day_no >= 365)
         $g_day_no++;
      else
         $leap = false;
   }

   $gy += 4*div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
   $g_day_no %= 1461;

   if ($g_day_no >= 366) {
      $leap = false;

      $g_day_no--;
      $gy += div($g_day_no, 365);
      $g_day_no = $g_day_no % 365;
   }

   for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
      $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
   $gm = $i+1;
   $gd = $g_day_no+1;

   return array($gy, $gm, $gd);
}

$jd=gregorian_to_jalali(gmdate('Y'),gmdate('n'),gmdate('j'));
if ($jd[1]>=6){
	Define("IRANTIMEZONE",3600*3.5);
} else {
	Define("IRANTIMEZONE",3600*4.5);
}
define('DAYOFWEEKDIFFRENCE',1);
$PersianDayOfWeekNames=array('شنبه','یک‌شنبه','دوشنبه','سه‌شنبه','چهارشنبه','پنج‌شنبه','جمعه');
$PersianMonthNames=array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور',
						 'مهر','آبان','آذر','دی','بهمن','اسفند');

function getJalalyDayOfWeek ($tm='now'){
	if ($tm==='now')
		$tm=time()+IRANTIMEZONE;
	return (gmdate('w',$tm)+DAYOFWEEKDIFFRENCE)%7;
}
function get1stJalalyWeekDateInGregorian($tm='now'){
	if ($tm=='now'){
		$now=time()+IRANTIMEZONE;
	} else {
		$now=$tm;
	}

	$now_Y=gmdate('Y',$now);
	$now_M=gmdate('n',$now);
	$now_D=gmdate('j',$now);

	$daylenght=60*60*24;
	$weeklenght=$daylenght*7;
	
	list($jnow_Y,$jnow_M,$jnow_D)=gregorian_to_jalali($now_Y,$now_M,$now_D);
		
	$firstjmonthday=jalali_to_gregorian($jnow_Y,$jnow_M,1);
	$firstday=gmmktime(0,0,0,$firstjmonthday[1],$firstjmonthday[2],$firstjmonthday[0]);
	
	$lastday=$firstday+$weeklenght+$daylenght-1;
	while (getJalalyDayOfWeek($lastday)!=6)	{
		$lastday-=$daylenght;
	}

//	$lastday=$firstday+(7-getJalalyDayOfWeek($firstday))*$daylenght;
	return array($firstday,$lastday);
	
}
function getJalalyWeekDateInGregorian($weeknumber=1,$onlystart=false,$tm='now'){
	if ($tm=='now')
		$tm=time()+IRANTIMEZONE;

	$firstweek=get1stJalalyWeekDateInGregorian($tm);

	if ($weeknumber==1) 
		if ($onlystart) 
			return $firstweek[0];
		else
			return array($firstweek[0],$firstweek[1]);
	else{
		$daylenght=60*60*24;
		$weeklenght = $daylenght * 7;
		$daynum=getJalalyDayOfWeek($firstweek[0]);
		$weeknumber = $weeknumber-1;
		
		$firstday=$firstweek[0]+($weeknumber*$weeklenght)-($daynum*$daylenght);
		if ($onlystart)
			return $firstday;
		
//		$weeknumber = $weeknumber+1;
		
		$lastday=$firstday+$weeklenght;
		while (getJalalyDayOfWeek($lastday)==0)		$lastday-=$daylenght;
		list($y,$sm,$d)=gregorian_to_jalali(gmdate('Y',$firstday),gmdate('m',$firstday),gmdate('d',$firstday));
		if ($weeknumber=4){
				list($y,$m,$d)=gregorian_to_jalali(gmdate('Y',$lastday),gmdate('m',$lastday),gmdate('d',$lastday));
				while ($sm!=$m){
					$lastday-=$daylenght;
					list($y,$m,$d)=gregorian_to_jalali(gmdate('Y',$lastday),gmdate('m',$lastday),gmdate('d',$lastday));
				}
		}
		$lastday+=$daylenght-1;
				
		return array($firstday,$lastday);
	}
}
function GetWeekNumber ($tm='now'){
	if ($tm=='now')	$tm=time()+IRANTIMEZONE;
	$wn=1;
	$w=getJalalyWeekDateInGregorian(1,false,$tm);
	while (!($w[1]>=$tm && $w[0]<=$tm)){
		$wn++;
		$w=getJalalyWeekDateInGregorian($wn,false,$tm);
	}
	return $wn;
}

function DayNumberToJDate($day){
	$jd=$day % 31; 
	$day-=$jd;
	
	$day=(int) ($day/31);
	$jm=$day % 12;
	
	$day-=$jm;
	$day=(int) ($day/12);
	
	$jy=$day;
	
	return array($jy,$jm+1,$jd+1);
}

/**
 * Get a Jalaly date (array format or YMD) and return day number of that day
 *
 * @param int $jy
 * @param int $jm
 * @param int $jd
 * @return int
 */
function GregorianArrayDateToTime($a){
	//print_r($a);
	return gmmktime(0,0,0,$a[1],$a[2],$a[0]);
}

function convertToJalali($gdate, $BetweenChar=" ", $Mod=1) {
    list( $gyear, $gmonth, $gday ) = preg_split('/-/', $gdate);
    list( $jyear, $jmonth, $jday ) = gregorian_to_jalali($gyear, $gmonth, $gday);
    $month = Array("فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند");
    if ($jmonth < 10)
	$jmonth = '0' . $jmonth;
    if ($jday < 10 && $Mod!=1)
	$jday = '0' . $jday;
    if ($Mod == 1)
	$sq = $jday . $BetweenChar . $month[--$jmonth] . $BetweenChar . $jyear;
    else if ($Mod == 2)
	$sq = $jday . $BetweenChar . $jmonth . $BetweenChar . $jyear;
    else if ($Mod == 3)
	$sq = $jyear . $BetweenChar . $jmonth . $BetweenChar . $jday;
    else
	$sq= $jday . $jmonth . $jyear;

    return $sq;
}

function convertTimeStampToShamsi($date, $mode=0) {
    $splitDateTime = explode(" ", $date);
    list($year, $month, $day) = explode('-', $splitDateTime[0]);
    if ($year == 0 && $month == 0 && $day == 0) {
	return false;
    }

    $splitTime = explode(":", $splitDateTime[1]);
    $jDate = convertToJalali($splitDateTime[0], '/', 3);
    $jDate2 = convertToJalali($splitDateTime[0], ' ', 1);
    if ($mode == 0)
                  return $jDate;
    else if ($mode == 1)
		return $jDate . " " . $splitTime[0] . ":" . $splitTime[1];
    else if ($mode == 2)
		return $jDate . " " . $splitTime[0] . ":" . $splitTime[1] . ":" . $splitTime[2];
    else if ($mode == 3)
		return $jDate2 . " ساعت " . $splitTime[0] . ":" . $splitTime[1];
	
}

?>