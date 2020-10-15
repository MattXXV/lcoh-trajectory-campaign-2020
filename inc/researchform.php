<?php

/** Set mode to "short" to use the short contact form insted **/
function lcoh_researchform($atts) {
	extract( shortcode_atts( array ('to' => 1, 'mode' => 'standard'), $atts ));
	
	$value = explode(',', $to);
	$html = '';
		
	$showform = true;
	$showthankyou = false;
	
	if (!function_exists('recaptcha_get_html'))
	require_once('recaptchalib.php');
	
	if ( get_magic_quotes_gpc() ) {
    	$_POST      = array_map( 'stripslashes_deep', $_POST );
    	$_GET       = array_map( 'stripslashes_deep', $_GET );
    	$_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
    	$_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );
	}
	
	if (isset($_POST['lcoh_contactform'])) {
		$recaptcha_results = LCOHRecaptcha::validate_recaptcha();
		
        if ($recaptcha_results!=true) {
        	$firstname = wp_kses_data($_POST['firstname']);
			$lastname = wp_kses_data($_POST['lastname']);
			$email = wp_kses_data($_POST['email']);
			$phone = wp_kses_data($_POST['phone']);
			$address = wp_kses_data($_POST['address']);
			$saddress = wp_kses_data($_POST['saddress']);
			$city = wp_kses_data($_POST['city']);
			$state = $_POST['state'];
			$zip = wp_kses_data($_POST['zip']);
			$timetocall = wp_kses_data($_POST['timetocall']);
			$program = wp_kses_data($_POST['program']);
			$formcomments = $_POST['formcomments'];
			$heardfrom = $_POST['heardfrom'];
			
        	$showform = true;
        	$showerr = true;
        	//echo 'There was an error in the reCAPTCHA word verification. Please try again.';
        }
        
        else {
			$showform = false;
		
			$firstname = wp_kses_data($_POST['firstname']);
			$lastname = wp_kses_data($_POST['lastname']);
			$email = wp_kses_data($_POST['email']);
			$phone = wp_kses_data($_POST['phone']);
			$address = wp_kses_data($_POST['address']);
			$saddress = wp_kses_data($_POST['saddress']);
			$city = wp_kses_data($_POST['city']);
			$state = $_POST['state'];
			$zip = wp_kses_data($_POST['zip']);
			$timetocall = wp_kses_data($_POST['timetocall']);
			$program = wp_kses_data($_POST['program']);
			$formcomments = $_POST['formcomments'];
			$heardfrom = $_POST['heardfrom'];
			
			$body = "Research Contact Form<br>
				<strong>From:</strong> $firstname $lastname <br/>
				<strong>Email:</strong> $email <br/>
				<strong>Daytime Phone:</strong> $phone <br/>
				<strong>Address Line 1:</strong> $address <br/>
				<strong>Address Line 2:</strong> $saddress <br/>
				<strong>City:</strong> $city <br/>
				<strong>State:</strong> $state <br/>
				<strong>Zip:</strong> $zip <br/>
				<strong>Daytime Phone:</strong> $phone <br/>
				<strong>Best Time To Call:</strong> $timetocall <br />
				<strong>Program:</strong> $program <br />
				<strong>Comments:</strong> $formcomments <br />
				<strong>Heard From:</strong> $heardfrom <br />";
			
			$results = UCHMail::send_mail($to,'',UCHMail::$default_bcc,'Lindner Center of HOPE: Research Contact Form',$body,'Lindner Center of HOPE Website');
			
			print_r($results);
			
			if ($results['success']) {
				$showform = false;
				$showthankyou = true;
			}
			else {
				echo $results['error'];
			}
			
		}
	}
	
	if ($showform) {
		if ($showerr) {
			$html .= '<div class="alert alert-warning">There was an error in the reCAPTCHA word verification. Please try again.</div>';
			$html .= '<br/><br/>';
		}
		$html .= '<div class="custom_form">
					Please fill out this form and we will get in touch with you. Thank you.<br/><br/>
					<form id="lcoh_contactform" class="form-horizontal" enctype="multipart/form-data" method="post" action="#contactus">
					
						<div class="form-group">
							<label for="firstname" class="col-sm-3 control-label">First Name *</label>
							<div class="col-sm-9">
							  <input name="firstname" id="firstname" type="text" required="required" value="'.$firstname.'" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="lastname" class="col-sm-3 control-label">Last Name *</label>
							<div class="col-sm-9">
							  <input name="lastname" id="lastname" type="text" required="required" value="'.$lastname.'" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email Address *</label>
							<div class="col-sm-9">
							  <input name="email" id="email" type="email" required="required" value="'.$email.'" class="form-control"/>
							</div>
						</div>
						
						
			
						<div class="form-group">
							<label for="address" class="col-sm-3 control-label">Address 1</label>
							<div class="col-sm-9">
							  <input name="address" id="address" type="text" value="'.$address.'" class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<label for="saddress" class="col-sm-3 control-label">Address 2</label>
							<div class="col-sm-9">
							  <input name="saddress" id="saddress" type="text" value="'.$saddress.'" class="form-control"/>
							</div>
						</div>

						<div class="form-group">
							<label for="city" class="col-sm-3 control-label">City</label>
							<div class="col-sm-9">
							  <input name="city" id="city" type="text" value="'.$city.'" class="form-control"/>
							</div>
						</div>

						<div class="form-group">
							<label for="state" class="col-sm-3 control-label">State</label>
							<div class="col-sm-9">
							  <select name="state" class="form-control">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH" selected>Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>
							</div>
						</div>

						<div class="form-group">
							<label for="zip" class="col-sm-3 control-label">Zip Code</label>
							<div class="col-sm-9">
							  <input name="zip" id="zip" type="text" value="'.$zip.'" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="phone" class="col-sm-3 control-label">Phone Number</label>
							<div class="col-sm-9">
							  <input name="phone" id="phone" type="text" value="'.$phone.'" class="form-control"/>
							</div>
						</div>
						
						<!-- Research Specific -->
						<div class="form-group">
							<label for="timetocall" class="col-sm-3 control-label">Best Time To Call</label>
							<div class="col-sm-9">
								<input name="timetocall" id="timetocall" type="text" value="'.$timetocall.'" class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3">
								<label for="program" class="control-label">Indicate which program you would be interested in</label>
								<select name="program" class="form-control">
									<option value="Depression">Depression</option>
									<option value="Bipolar Disorder">Bipolar Disorder</option>
									<option value="Binge Eating and Obesity">Binge Eating and Obesity</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3">
								<label for="formcomments" class="control-label">Comments</label>
								<textarea name="formcomments" id="formcomments" class="form-control">'.$formcomments.'</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3">
								<label for="heardfrom" class="control-label">How did you hear about our program?</label>
								<textarea name="heardfrom" id="heardfrom" class="form-control">'.$heardfrom.'</textarea>
							</div>
						</div>
						';
						
						$html .= '<div class="form-group">
									<div class="col-sm-9 col-sm-offset-3">
										Word Verification:
									  <div id="recaptcha-wrapper">'.LCOHRecaptcha::recaptcha_field().'</div>
									  
									  <input  type="hidden" name="lcoh_contactform" value="1" />
									  <p><button class="btn btn-primary" type="submit">Send Message</button></p>
									  <p>This form may take a few moments to process, please only hit Send Message once.</p>
							
									</div>
								</div>
					</form></div>';
	}
	
	if ($showthankyou)
	{
		$html .= '<p><div class="alert alert-success">Thank you for contacting Lindner Center of HOPE. We will review your message promptly.</div></p>';
	}
	
	
	return $html;
}

add_shortcode('lcoh_researchform','lcoh_researchform');