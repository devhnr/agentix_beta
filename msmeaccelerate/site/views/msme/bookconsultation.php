<?php
// session_start();

include("connect.php");
// echo $con;
if(isset($_POST["sub10"]))
{
ob_end_clean();
header("Connection: close\r\n");
header("Content-Encoding: none\r\n");
ignore_user_abort(true); // optional
ob_start();
// echo ('Process running...');
$size = ob_get_length();
header("Content-Length: $size");
ob_end_flush();     // Strange behaviour, will not work
flush();            // Unless both are called !
ob_end_clean();
    $a=$_POST['name1'];
    $b=$_POST['email'];
    $c=$_POST['phone'];
    $d=$_POST['route'];
   
$q="INSERT INTO bookconsultation(name,email,phone,route)values('$a','$b','$c','$d')";
$res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
header("Location: https://raghnall.msmeaccelerate.in/$d");
// ob_start();

}
?>