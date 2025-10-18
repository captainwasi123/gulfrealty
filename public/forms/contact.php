<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to      = "dawoodpasha29@gmail.com";  // Receiver email
    $subject = "New Contact Form Message from $name";
    $body    = "You have received a new message:\n\n".
               "Name: $name\n".
               "Email: $email\n\n".
               "Message:\n$message";

    // Always use your domain email in "From"
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h3 style='color:green;text-align:center;'>Message sent successfully! ✅</h3>";
    } else {
        echo "<h3 style='color:red;text-align:center;'>Message could not be sent. ❌</h3>";
    }
} else {
    echo "Invalid request.";
}
?>
