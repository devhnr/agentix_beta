<?php 
$errors = '';
$myemail = 'asha.fiveonline@gmail.com';//<-----Put Your email address here.
$myemailnew = 'yatrik.fiveonline@gmail.com';
if(empty($_POST['name'])  ||
   empty($_POST['phone']) ||
   empty($_POST['email']) ||
   empty($_POST['company'])) 
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$phone_number = $_POST['phone'];
$email_address = $_POST['email']; 
$company = $_POST['company'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)@[a-z0-9-]+(\.[a-z0-9-]+)(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "Buy Request from Group Insurace Product: $name";
    $email_body = "You have received a New Buy Request".
    " Here are the details:\n Name: $name   \n Contact No. : $phone_number   \n Email: $email_address    \n Message : $company"; 
    
    $headers = "From: $name\n"; 
    $headers = "Reply-To: $email_address";
    
    mail($to,$email_subject,$email_body,$headers);
    
    
    $to = $myemailnew; 
    $email_subject = "Buy Request from Group Insurace Product: $name";
    $email_body = "You have received a New Buy Request".
    " Here are the details:\n Name: $name   \n Contact No. : $phone_number   \n Email: $email_address    \n Message : $company"; 
    
    $headers = "From: $name\n"; 
    $headers = "Reply-To: $email_address";
    
    mail($to,$email_subject,$email_body,$headers);

    //redirect to the 'thank you' page
    header('Location: https://sme.icicilombard.com/group-health-insurance-policy');
    
    exit(); 
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
    <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>