<?php
// Check for empty fields
if(empty($_POST['produit'])      ||
   empty($_POST['pays'])     ||
   empty($_POST['nom'])     ||
   empty($_POST['adresse'])   ||
   empty($_POST['email'])   ||
   empty($_POST['phone'])   ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'tipeuz@live.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Demande de devis:  $nom";
$email_body = "vous avez reçu un nouveau message de votre site: onglet-Demander un devis.\n\n"."Voici les détails:\n\nProduit: $produit\n\nPays: $pays\n\nNom: $nom\n\nAdresse: $adresse\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: cauris@caurismultiservice.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>