<?php 


/********API Register Form*********/
function pu_form($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'language' => '',
			'title' => '',
			'title_2' => '',
			'subtitle' => '',
			'name' => '',
			'name_placeholder' => '',
			'nric' => '',
			'nric_placeholder' => '',
			'nric_length' => '',
			'mobile' => '',
			'mobile_prefix' => '',
			'mobile_sub' => '',
			'email_text' => '',
			'email_placeholder' => '',
			'referral' => '',
			'register_text' => '',
			'congrate_text' => '',
			'success_text' => '',
			'android_text' => '',
			'android_ver' => '',
			'android_url' => '',
			'ios_text' => '',
			'ios_ver' => '',
			'ios_url' => '',
			'app_text' => '',
			'thankyou_url' => '',
			'mask' => '',
			
			'otptitle' => '',
			'otp_placeholder' => '',
			'desiredtitle' => '',
			'request_otp' => '',
			
			
			
			
		), 
		$atts
	);
	// Attributes in var
	$language = $atts['language'];
	$title = $atts['title'];
	$title_2 = $atts['title_2'];
	$subtitle = $atts['subtitle'];
	$id_name = $atts['name'];
	$id_name_placeholder = $atts['name_placeholder'];
	$nric = $atts['nric'];
	$nric_placeholder = $atts['nric_placeholder'];
	$nric_length = $atts['nric_length'];
	$mobile = $atts['mobile'];
	$mobile_prefix = $atts['mobile_prefix'];
	$mobile_sub = $atts['mobile_sub'];
	$email_name = $atts['email_text'];
	$email_placeholder = $atts['email_placeholder'];
	$referral = $atts['referral'];
	$register_text = $atts['register_text'];
	$congrate_text = $atts['congrate_text'];
	$success_text = $atts['success_text'];
	$android_text = $atts['android_text'];
	$android_ver = $atts['android_ver'];
	$android_url = $atts['android_url'];
	$ios_text = $atts['ios_text'];
	$ios_ver = $atts['ios_ver'];
	$ios_url = $atts['ios_url'];
	$app_text = $atts['app_text'];
	$thankyou_url = $atts['thankyou_url'];
	$mask = $atts['mask'];
	
	$otptitle = $atts['otptitle'];
	$otp_placeholder = $atts['otp_placeholder'];
	$desiredtitle = $atts['desiredtitle'];
	$request_otp = $atts['request_otp'];
	
	$API_POST_URL = 'https://api.mlend.xyz/';
	$authorization = 'Basic bVlsM25EMTExMjI4dnYzYlE6anJXXmZUJm8lYVhiMVk=';
	
	$tnc_text = "I have read and agree to the <a href=\"" . get_site_url() . "/term-and-condition/\">Terms of Service</a> and <a href=\"" . get_site_url() . "/privacy-policy/\">Privacy Policy</a>";

	$output .= '<div id="pu_reg_form">';	//Pop Up Register
	$output .= '<h2>'.$title.' <span style="display:block;color:#9A7DB7;">'.$title_2.'</span></h2>';
	$output .= '<h4>'.$subtitle.'</h4>';

	$output .= '<form method="POST" id="puRegForm">';
	$output .= '<div class="form-group">
	<label>'.$id_name.'</label>
	<input class="form-control full_name" type="text" placeholder="'.$id_name_placeholder.'" name="full_name" id="full_name" required>
	</div>';
	$output .= '<div class="form-group">
	<label>'.$nric.'</label>
	<input class="form-control ic" type="text" placeholder="'.$nric_placeholder.'" name="ic" required maxlength="'.$nric_length.'" id="pu_nric">
	</div>';
	
	//Email
	$output .= '
	<label>'.$email_name.'</label>
	<div class="form-group">
	<input class="form-control email" type="email" id="email" name="email" placeholder="'.$email_placeholder.'" required>
	</div>';
	
	/**************Wish Amount*****************/
    $curl_loan = curl_init();
    curl_setopt_array($curl_loan, array(
      CURLOPT_URL => $API_POST_URL . 'enquiry/loan-package',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '',
      CURLOPT_HTTPHEADER => array(
        "Authorization: " . $authorization,
        'mobileType: web',
        'fromApp: Asialend'
      ),
    ));
    $loan = curl_exec($curl_loan);
    $loan_package = json_decode($loan, true);
    $max_data = count($loan_package['data']['amount']) - 1;
    curl_close($curl_loan);
	
	//Wish Amount
	$output .= '
	<label>'.$desiredtitle.'</label>

	<div class="form-group">
	<select class="form-control loan_amount" name="loan_amount">';
	$output .= '<option value="" disabled selected>Select your option</option>';
    for ($x = 0; $x <= $max_data; $x++) {
        $output .= '<option value="'.$loan_package['data']['amount'][$x].'">'. $loan_package['data']['amount'][$x] .'</option>';
    }
	$output .= '
	</select>
	</div>';
	
	//Mobile Number
	$output .= '
	<label>'.$mobile.' <span>'.$mobile_sub.'</span></label>
	<div class="form-row">
	<div class="form-group col-4 col-md-3 mr-0">
	<select class="form-control" name="prefix">';
	$output .= '<option value="'.$mobile_prefix.'">+'.$mobile_prefix.'</option>';
	foreach($array_phone as $value => $label){
		$output .= '<option value="'.$value.'">+'.$value.'</option>';
	}
	$output .= '
	</select>
	</div>
	<div class="form-group col-8 col-md-9 ml-0">
	<input class="form-control mobile_num" type="text" name="mobile" maxlength="10" required>
	</div>
	</div>';
	
	//OTP
	$output .= '
	<label>'.$otptitle.'</label>
	
	<div class="form-group">
	<input class="form-control reg_num otp_field" type="text" name="otp" maxlength="6" placeholder="'.$otp_placeholder.'" disabled>
	 <button type="submit" class="registered_btn otp_btn" name="pu_otp" data-type="otp">'.$request_otp.'</button>
	 <div id="countdown" style="margin-top:5px;"></div>
	</div>';	

	//T&c
	$output .= '
	<div class="form-group d-flex align-items-start">
	<input type="checkbox" id="tnc" name="tnc" required class="mr-3 mt-1">
	<label>'.$tnc_text.'</label>
	</div>';

	$output .= '<button type="submit" class="registered_btn btn_submit" name="pu_submit" data-type="submit" disabled>'.$register_text.'</button>';

	$output .= '</form>';



	$output .= '<script>';

	if($mask == 'yes') {
		$output .= 'jQuery("#pu_nric").mask("000000-00-0000");';
	}

	$output .="jQuery('.registered_btn').click(function (event) {
		event.preventDefault();

		action = 'request_form';
		var btntype = jQuery(this).attr('data-type');
		var otp = jQuery('.otp_field').val();
		var mobile = jQuery('.mobile_num').val();
		var name = jQuery('.full_name').val();
		var ic = jQuery('.ic').val();
		var email = jQuery('.email').val();
		var wish_amount = jQuery('.loan_amount option:selected').val();
		var countdown = jQuery('#countdown');
        var countdownDuration = 3 * 60; // 3 minutes in seconds
        var countdownInterval;


		if(btntype == 'submit' && otp == ''){
				alert('empty OTP');
		} else if(btntype == 'submit' && !jQuery('#tnc').prop('checked') ){
				alert('Please check the required checkbox before submitting.');
		} else {
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url :'".admin_url( 'admin-ajax.php' )."',
				data: {
					'action': action,
					'btntype': btntype,
					'mobile': mobile,
					'ic': ic,
					'name': name,
					'email': email,
					'wish_amount': wish_amount,
					'otp': otp,
				},

			        success: function (response) {

    					if(response.content == 'OTP request successful.'){
    					alert(response.content);
    					    jQuery('.otp_field').prop('disabled', false);
        					 jQuery('.otp_btn').prop('disabled', true);
							 jQuery('.btn_submit').prop('disabled', false);
							 
        					 setTimeout(function() {
                              jQuery('.btnrequest_opt').prop('disabled', false);
                            }, 3 * 60 * 1000); // 3 minutes in milliseconds

                             // Start the countdown
								var remainingTime = countdownDuration;
								countdown.text('Time remaining: ' + remainingTime + ' seconds');
								countdownInterval = setInterval(function() {
								  remainingTime--;
								  countdown.text('Time remaining: ' + remainingTime + ' seconds');
								  if (remainingTime <= 0) {
									// Enable the button
									button.prop('disabled', false);
									countdown.text('');
									clearInterval(countdownInterval);
								  }
								}, 1000); // Update countdown every second

    					} else if(response.content == 'Thank you.') {
    					    	alert(response.content);
                                jQuery('input[type=\'text\']').val('');
								  jQuery('input[type=\'number\']').val('');
								  jQuery('input[type=\'email\']').val('');
								 jQuery('#countdown').hide();
								 jQuery('.loan_amount option:first').prop('selected', 'selected');
								  jQuery('.otp_field').prop('disabled', true);
        					     jQuery('.otp_btn').prop('disabled', false);
								 jQuery('.btn_submit').prop('disabled', true);
								 jQuery('#tnc').prop('checked', false);
		
    					} else {
    						alert(response.content);
    					}
					},
					error: function (response) {
						alert(response.content);
						console.log(response.content);
					}
			});

		}
	}); ";

	$output .= '</script>';

	$output .= '</div>'; //Pop Up Register


	return $output;
}
add_shortcode('pu_form','pu_form');