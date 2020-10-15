<?php
class LCOHRecaptcha
{
	private static $site_key = RECAPTCHA_PUBLIC_KEY;
	private static $secret_key = RECAPTCHA_PRIVATE_KEY;
	private static $api_url = 'https://www.google.com/recaptcha/api/siteverify';
	
	
	public static function recaptcha_field($echo=false)
	{
		$field = '<div id="recaptcha-wrapper"><div class="g-recaptcha" data-sitekey="'.self::$site_key.'"></div></div>';
		if ($echo) echo $field;
		else return $field;
	}
	
	// return the Google response
	public static function validate_recaptcha()
	{
		//echo 'validating recaptcha<br />';
		if (isset($_POST['g-recaptcha-response']))
		{
			//echo 'starting curl<br />';
			$curl = curl_init(self::$api_url);
			$curl_post_data = array(
				"secret" => self::$secret_key,
				"response" => $_POST['g-recaptcha-response'],
				);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
			$curl_response = curl_exec($curl);
			curl_close($curl);
			//echo 'closed curl<br />';
			$response = json_decode($curl_response);
			return ($response->success);
		}
		else
		{
			return false;
		}
		
		
	}
	
}
 
// Include javascripts
function uch2016recaptcha_js()
{
	// Google Recaptcha
	wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', array(), '2016', false );
}
add_action( 'wp_enqueue_scripts', 'uch2016recaptcha_js' );