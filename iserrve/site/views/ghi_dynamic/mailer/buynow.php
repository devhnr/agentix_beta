<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$phone = $_POST['company'];

$formcontent=" From: $email \n\n Name: $name \n Email ID: $email \n Mobile No.: $phone \n Company.: $company" ;
$recipient = "asha.fiveonline@gmail.com, yatrik.fiveonline@gmail.com";
$subject = "You have a new Buy Enquiry";
$mailheader = "From: $email \r\n";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");header('Location: https://sme.icicilombard.com/group-health-insurance-policy');  //Redirect to new url if form submitted}
?>