<?php
$messageSent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $to = "piyushgirase26@gmail.com";
    $subject = "New Contact Message from $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";
    if (mail($to, $subject, $body, $headers)) {
        $messageSent = true;
    } else {
        $messageSent = false;
    }
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
</head>
<body>
    <div class="contact-container">
    <img src="image/photo1.jpg" alt="Profile" class="profile-img"/>
    <h1 class="heading1">CONTACTS</h1>
    <p class="paragraph1">Use our contact form for all information requests or contact us directly using the contact information below.</p>
    <?php if ($messageSent): ?>
        <p style="color: green;">Thank you! Your message has been sent successfully.</p>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p style="color: red;">Oops! Something went wrong. Please try again.</p>
    <?php endif; ?>
    <div class="contact-info">
        <div>
        <i class="material-icons" style="color: rgb(158, 3, 3); font-size: 30px;">my_location</i>
        <h2 class="heading2">Our Office Location</h2>
        <p class="paragraph2">G.H.Raisoni College of Engineering and Management, Pune</p>
        </div>
        <div>
        <i class="material-icons" style="color: rgb(45, 129, 24); font-size: 30px;">local_phone</i>
        <h2 class="heading3">Phone (Personal)</h2>
        <a class="paragraph3" href="tel:+917410184345">+91 7410184345</a> <br>
        <a class="paragraph3" href="tel:+916260612397">+91 6260612397</a>
        </div>
        <div>
        <i class="material-icons" style="color: rgb(27, 35, 255); font-size: 30px;">local_post_office</i>
        <h2 class="heading4">Office Mail</h2>
        <a class="paragraph4" href="mailto:piyushgirase26@gmail.com">piyushgirase26@gmail.com</a> <br>
        <a class="paragraph4" href="mailto:pratikdeshmukh6190@gmail.com">pratikdeshmukh6190@gmail.com</a>
        </div>
    </div>
    </div>
</body>
</html>
