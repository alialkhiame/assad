<?php
if(!empty($_POST['website'])) die();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = trim(htmlspecialchars($_POST['name']));
  $visitor_email = trim(htmlspecialchars($_POST['email']));
  $message = trim(htmlspecialchars($_POST['msg']));
	$email_subject = "New Form submission";

	$email_body = "You have received a new message from the user $name.\n".
                            "Here is the message:\n $message";

$to="moassad@mrweiss.de";
mail($to,$email_subject,$email_body,$visitor_email);
$text = "Thank you for your Message, i'll be reaching out to you soon";
echo '<pre>';
echo htmlspecialchars($text);
echo '</pre>';



}
?>