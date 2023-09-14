<?php
include("../connect.php");
// echo $con;
if(isset($_POST["sub2"]))
{

    $a=$_POST['name1'];
    $b=$_POST['pincode']; 
    $c=$_POST['email'];
    $d=$_POST['mobile'];
	$e=$_POST['route'];
   

$q="INSERT INTO customer(name,pincode,email,mobile,route)values('$a','$b','$c','$d','$e')";
$res=mysqli_query($con,$q);

if ($con->query($q) === TRUE)
{
  echo "New record created successfully";
} else
{
  echo "Error: " . $sql . "<br>" . $con->error;
}
header("Location: https://raghnall.msmeaccelerate.in/$e/");
}
?>