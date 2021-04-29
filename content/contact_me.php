<?php

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['message'])   ||
   empty($_POST['email'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'joohyun.ann@ut-capitole.fr';
$email_subject = "Blog | New message from $name";
$email_body = "New message from your blog.\n\n"."Here are the details :\n\nName: $name\n\nEmail: $email_address\n\nMessage: $message\n\n";
$headers = "From: noreply@blog.islamelshobokshy.info\n";
$headers .= "Reply-To: $email_address";   
ob_start();
mail($to,$email_subject,$email_body,$headers);
ob_end_clean();
header('Location: '. '/');
exit();       
?>
