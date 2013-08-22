<?php
        
         $ticketAmount=70000;

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
        $db['dbname']="11farvardin";
        
        
	$samanMID='02130171-125980';
	$samanRedirect='https://pay.sampad.info/complete_payment.php';
	$samanPwd='';
	
        
	$stateErrors = array(
		'Canceled By User'     => 'تراکنش بوسيله خريدار کنسل شده',
		'Invalid Amount'       => 'مبلغ سند برگشتي  از مبلغ تراکنش اصلي بيشتر است',
		'Invalid Transaction'  => 'درخواست برگشت تراکنش رسيده است در حالي که تراکنش اصلي پيدا نمي شود',
		'Invalid Card Number'  => 'شماره کارت اشتباه است',
		'No Such Issuer'       => 'چنين صادر کننده کارتي وجود ندارد',
		'Expired Card Pick Up' => 'از تاريخ انقضاي کارت گذشته است',
		'Incorrect PIN'        => 'رمز کارت اشتباه است pin',
		'No Sufficient Funds'  => 'موجودي به اندازه کافي در حساب شما نيست',
		'Issuer Down Slm'      => 'سيستم کارت بنک صادر کننده فعال نيست',
		'TME Error'            => 'خطا در شبکه بانکي',
		'Exceeds Withdrawal Amount Limit'      => 'مبلغ بيش از سقف برداشت است',
		'Transaction Cannot Be Completed'      => 'امکان سند خوردن وجود ندارد',
		'Allowable PIN Tries Exceeded Pick Up' => 'رمز کارت 3 مرتبه اشتباه وارد شده کارت شما غير فعال اخواهد شد',
		'Response Received Too Late'           => 'تراکنش در شبکه بانکي تايم اوت خورده',
		'Suspected Fraud Pick Up'              => 'اشتباه وارد شده cvv2 ويا ExpDate فيلدهاي'
	);
	$verifyErrors = array(
		'-1'  => 'خطاي داخلي شبکه',
		'-2'  => 'سپرده ها برابر نيستند',
		'-3'  => 'ورودي ها حاوي کاراکترهاي غير مجاز ميباشد',
		'-4'  => 'کلمه عبور يا کد فروشنده اشتباه است',
		'-5'  => 'خطاي بانک اطلاعاتي',
		'-6'  => 'سند قبلا برگشت کامل خورده',
		'-7'  => 'رسيد ديجيتالي تهي است',
		'-8'  => 'طول ورودي ها بيشتر از حد مجاز است',
		'-9'  => 'وجود کارکترهاي غير مجاز در مبلغ برگشتي',
		'-10' => 'رسيد ديجيتالي حاوي کارکترهاي غير مجاز است',
		'-11' => 'طول ورودي ها کمتر از حد مجاز است',
		'-12' => 'مبلغ برگشتي منفي است',
		'-13' => 'مبلغ برگشتي براي برگشت جزيي بيش از مبلغ برگشت نخورده رسيد ديجيتالي است',
		'-14' => 'چنين تراکنشي تعريف نشده است',
		'-15' => 'مبلغ برگشتي به صورت اعشاري داده شده',
		'-16' => 'خطاي داخلي سيستم',
		'-17' => 'برگشت زدن تراکنشي که با کارت بانکي غير از بانک سامان انجام شده',
		'-18' => 'فروشنده نامعتبر است ip address'
	);
?>