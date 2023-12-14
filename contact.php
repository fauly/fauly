<!-- contact.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle error here
        echo "Invalid input.";
        exit;
    }

    $recipient = "ryanspencercowley@gmail.com";
    $subject = "New contact from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Success        
        header("Location: thankyou.html");
        exit;
    } else {
        // Error
        echo "Oops! Something went wrong and I couldn't get your message. Reach out directly via email or Discord.";
    }
}
?>