<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $to = 'moassad@mrweiss.de';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

    $headers = "From: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Success";
    } else {
        echo "Error";
    }
}
?>
