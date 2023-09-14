<?php
include("../connect.php");
// echo $con;
if(isset($_POST["sub1"]))
{

    $a=$_POST['name1'];
    $b=$_POST['email'];
    $c=$_POST['message'];
	$d=$_POST['route'];
   

$q="INSERT INTO career(name,email,message,route)values('$a','$b','$c','$d')";
$res=mysqli_query($con,$q);
header("Location: https://raghnall.msmeaccelerate.in");
// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }

}
?>