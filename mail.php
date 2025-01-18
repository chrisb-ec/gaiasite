<?php
	// assign the form data to variables
	$email_to = "person@example.com"; // email address to send the form to
	$email_from = $_POST['email']; // sender's email address pulled from the form
	$email_from_name = $_POST['name'];
	$subject = "Enquiry"; // set the email Subject

	// Construct the email headers, similar to html page head section.
	$headers = "MIME-Version: 1.0\n"; // MIME version
	$headers .= "Content-type: text/html; charset=iso-8859-1\n"; // email content type
	$headers .= "From: GAIA Contact Form <$email_from>\n"; // email from setting seen in mail inbox

	$message = $_POST['message']; // sender's message pulled from the form
	$message .= "<p>Kind regards, <br>the GAIA web team</p>
				 <p>Request received from IP address [{$_SERVER['REMOTE_ADDR']}]
				 <br>at ".gmdate("l dS F Y h:i:s A")." GMT"; // adding a 'footer' to the email including a GMT timestamp and the sender's IP address

	$body = "From: $email_from_name ($email_from)\n Message:\n $message\n"; // construct the email

	echo("Thank you, your message has been sent!"); // echo a message to the user to confirm the email has been sent
	mail($email_to, $subject, $body, $headers); // send the email

?>