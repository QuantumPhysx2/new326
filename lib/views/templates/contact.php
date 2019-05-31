<?php
$success = false;

if (isset($_POST["email"])) {
	// Setting up message block
	$to = "mipython@hotmail.com";
	// Grab user's contact email
	$from = $_POST["user-email"];
	
	// Grab user's firstname and lastname
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	
	// Grab subject
	$subject = $_POST["subject"];

	// Grab email content
	$message = $_POST["enquiry"];

	$header = "From:".$from;

	// Send the original message to target destination following the format of 'mail()''
	$sendEmail = mail($to, $subject, $message, $header);

	// If the email goes through successfully...
	if ($sendEmail) {
		// ...execute this block scope
	    $success = true;
		$successMessage = "<p class='successMessage'>Your message was sent. You will receive a reply in 48 hours</p>";
	} else {
		$errorMessage = "<p class='errorMessage'>Message failed to send. Please try again</p>";
	}
}
?>
<div class="contact-section">
	<h2>Contact Us</h2>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="subject">Subject</label>
		<input id="subject" name="subject" type="text" required>
		
		<label for="firstname">Firstname</label>
		<input id="firstname" name="firstname" type="text" required>

		<label for="lastname">Lastname</label>
		<input id="lastname" name="lastname" type="text" required>

		<label for="user-email">Your Contact Email</label>
		<input id="user-email" name="user-email" type="email" required>		

		<label for="enquiry">Your enquiry...</label>
		<input id="enquiry" name="enquiry" type="text" required>
		
		<button type="submit" id="email" name="email">Send Email</button>
	</form>
	<?php
	if ($success) {
	    echo $successMessage;
	} else {
	    echo $errorMessage;
	}
	?>
</div>