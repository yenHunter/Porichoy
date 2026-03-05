<?php
// Only process POST requests.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"] ?? ''));
    $name = str_replace(array("\r", "\n"), array(" ", " "), $name);
    $email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"] ?? '');
    $website = trim($_POST["website"] ?? '');
    $sub = trim($_POST["subject"] ?? '');
    $date = trim($_POST["date"] ?? '');
    $time = trim($_POST["time"] ?? '');
    $message = trim($_POST["message"] ?? '');

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;
    }

    $recipient = "demo@gmail.com";

    $subject = "New contact from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";

    if (!empty($phone)) {
        $email_content .= "Phone: $phone\n";
    }
    if (!empty($website)) {
        $email_content .= "Website: $website\n";
    }
    if (!empty($sub)) {
        $email_content .= "Subject: $sub\n";
    }
    if (!empty($date)) {
        $email_content .= "Date: $date\n";
    }
    if (!empty($time)) {
        $email_content .= "Time: $time\n";
    }
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
