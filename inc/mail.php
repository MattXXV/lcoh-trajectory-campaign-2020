<?php
class UCHMail
{
	// centralize the mail functions
	private static $smtp_server = 'secure.emailsrvr.com';
	private static $smtp_port = '465';
	private static $smtp_user = 'uchealth2@websterlabs.com';
	private static $smtp_pass = 'pLe7uy98h9Sc';
	
	private static $internal_from = 'uchealth2@websterlabs.com'; // FROM address for users inside the UCHealth.com domain
	private static $external_from = 'noreply@uchealth.com';		 //FROM for external addresses
	private static $from_name_default = 'UC Health Website';
	
	public static $default_bcc = 'joe@websterinteractive.com';
	
	public static function init()
	{
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/wp-includes/';
		require_once($path.'class-phpmailer.php');
		require_once($path.'class-smtp.php');
	}
	
	// send a message
	public static function send_mail($to,$cc,$bcc,$subject,$message,$fromname=false,$from=false)
	{
		self::init();
		//if ($from==false)
		//{
		//	$from = (strpos('uchealth.com',$to) !== false) ?  self::$internal_from : self::$external_from;	
		//}
		$from = self::$internal_from;
		
		if ($fromname==false)
		{
			$fromname = self::$from_name_default;
		}
		
		// validate entry
		if (empty($to))
		{
			return array('success'=>false,'error'=>'Missing To.');
		}
		if (empty($subject))
		{
			return array('success'=>false,'error'=>'Missing subject.');
		}
		if (empty($message))
		{
			return array('success'=>false,'error'=>'Missing message.');
		}
		
		// send the mail
		$mymail = new PHPMailer();
		$mymail->IsSendmail();
		$mymail->IsSMTP();
		$mymail->Host = self::$smtp_server;
		$mymail->Port = self::$smtp_port;
		$mymail->SMTPAuth = true;
		$mymail->SMTPSecure = true;
		$mymail->Username = self::$smtp_user;
		$mymail->Password = self::$smtp_pass;
		
		$to = str_replace(' ','',$to);
		$to = explode(',',$to);
		foreach($to as $addr)
		{ 
			$mymail->AddAddress(trim($addr));
		}
		
		if (!empty($cc))
		{
			$cc = str_replace(' ','',$cc);
			$cc = explode(',',$cc);
			foreach($cc as $addr)
			{ 
				$mymail->AddCC(trim($addr));
			}
		}
		
		if (!empty($bcc))
		{
			$bcc = str_replace(' ','',$bcc);
			$bcc = explode(',',$bcc);
			foreach($bcc as $addr)
			{ 
				$mymail->AddBCC(trim($addr));
			}
		}
		//print_r($mymail);
		
		$mymail->From = $from;
		$mymail->FromName = $fromname;
		$mymail->AddReplyTo($from, $fromname);
		
		$mymail->IsHTML(true);
		$mymail->Subject = $subject;
		$mymail->MsgHTML($message);
		
		if(!$mymail->Send())
			$emailSent = false;
		else
			$emailSent = true;

			
		if ($emailSent) return array('success'=>true);
		else
		{
			$results = array('success'=>false);
			if (!$emailSent)
				$results['error']=$mymail->ErrorInfo;
			return $results;
		}
	}
	
}