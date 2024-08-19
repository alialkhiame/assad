<?php
if(!empty($_POST['website'])) die();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
	$email_subject = "New Form submission";

  $phone = $_POST['phone'];
  $email_body = "You have received a new message from the user $name.\n".
                "Phone: $phone\n".
                "Here is the message:\n $message";
  
$to="moassad@mrweiss.de";
$headers = "From: $visitor_email\r\n";
mail($to, $email_subject, $email_body, $headers);
$text = "Thank you for your Message, i'll be reaching out to you soon";
echo '<pre>';
echo htmlspecialchars($text);
echo '</pre>';



}
?>