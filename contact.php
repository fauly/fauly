<!-- contact.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $contact = filter_var(trim($_POST["contact"]));
    $message = strip_tags(trim($_POST["message"]));

    if (empty($name) OR empty($message) OR empty($contact)) {
        // Handle error here
        echo "Invalid input.";
        exit;
    }

    $recipient = "ryanspencercowley@gmail.com";
    $subject = "New contact from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Contact: $contact\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$contact>";

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