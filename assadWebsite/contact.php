<?php

// Exit if 'website' field is filled (spam prevention)
if (!empty($_POST['website'])) {
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic form validation
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $visitor_email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($name) || empty($visitor_email) || empty($message)) {
        echo 'All fields are required.';
        exit;
    }

    // Validate email
    if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }

    // Email content
    $email_subject = "New Form Submission";
    $email_body = "You have received a new message from the user $name.\n\nHere is the message:\n$message";
    
    // Set the recipient email
    $to = "moassad@mrweiss.de";

    // Set additional headers to prevent email injection
    $headers = [
        'From' => $visitor_email,
        'Reply-To' => $visitor_email,
        'X-Mailer' => 'PHP/' . phpversion()
    ];
    $headers_string = '';
    foreach ($headers as $key => $value) {
        $headers_string .= "$key: $value\r\n";
    }

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers_string)) {
        echo '<div>Thank you for your message, I\'ll be reaching out to you soon.</div>';
    } else {
        echo '<div>Error sending message. Please try again later.</div>';
    }
}
?>
