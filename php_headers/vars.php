<?php

	$fieldregxp['firstname']='^[ضصثقفغعهخحجچشسیلاتنمکگظطزرذدپوًٌٍَُِّْؤئيإأآةكٓژٰ‌ٔء ب]+$';
	$fieldregxp['lastname']=$fieldregxp['firstname'];
	$fieldregxp['gender']='^m|f$';
	$fieldregxp['email']='^[a-zA-Z\.\_]+@[a-zA-Z\-\.]+\.[a-zA-Z]+$';
	$fieldregxp['mobile']='^09[0-9]{9}$';
	$fieldregxp['gradyear']='^0|7[3-9]|8[0-9]|90$';
	
        
	$smspanel['username']='sampad';
	$smspanel['password']='';
	$smspanel['number']='30007654321765';
        
                
	$db['user']="root";
	$db['pass']="mysqlroot";
	$db['dbname']="voting";
	$db['host']="192.168.1.20";
            
?>