<?php
// Instantiate secret key as our private key for server-side validation
// Used to detect if the domain is valid
$secretKey = "6LdVBKUUAAAAABND3uFiW_YJj3ptMCJ_e24HYL1Q";

$msg = '';

if (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
// Tell reCAPTCHA to look into at the private key to verify the user's response after reCAPTCHA
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$_POST["g-recaptcha-response"]."&remoteip=".$_SERVER["REMOTE_ADDR"]);
	
	if (($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
	    // Take JSON encoded data and convert it into a PHP variable
	    $captcha = json_decode($response);

	    if ($captcha->success) {
	    	$msg = "Success";
	    } else {
	    	$msg = "U a basic bitch";
	    }
	}
}
?>