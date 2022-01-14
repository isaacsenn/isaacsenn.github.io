<?php
// Put contacting email here
$php_main_email = "contact@isaacsenn.me";

//Fetching Values from URL
$php_name = $_POST['ajax_name'];
$php_email = $_POST['ajax_email'];
$php_message = $_POST['ajax_message'];

//Sanitizing email
$php_email = filter_var($php_email, FILTER_SANITIZE_EMAIL);

//After sanitization Validation is performed
if (filter_var($php_email, FILTER_VALIDATE_EMAIL)) {
		$php_subject = "Confirmation of Contact Form Submission";
		
		$php_headers = 'MIME-Version: 1.0' . "\r\n";
		$php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$php_headers .= 'From:' . $php_email. "\r\n";
		$php_headers .= 'Cc:' . $php_email. "\r\n";
		
		$php_template = '<div style="padding:50px;">Hello ' . $php_name . ',<br/>'
		. 'Thank you for contacting me!<br/>'
		. '<br/>'
		. '<strong style="color:#f00a77;">Name:</strong>  ' . $php_name . '<br/>'
		. '<strong style="color:#f00a77;">Email:</strong>  ' . $php_email . '<br/>'
		. '<strong style="color:#f00a77;">Message:</strong>  ' . $php_message . '<br/>'
		. '<br/>'
		. 'This email serves as confirmation of your contact form submission.<br/>'
		. 'I will be in touch with you as soon as possible.</br>'
		. '<br/>'
		. 'Best regards,<br/>'
		. 'Isaac Senn</div>';
		
		$php_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $php_template . "</div>";
		$php_sendmessage = wordwrap($php_sendmessage, 70);
		
		mail($php_main_email, $php_subject, $php_sendmessage, $php_headers);
		echo "";
} else {
	echo "<span class='contact_error'>* Invalid email *</span>";
}
?>