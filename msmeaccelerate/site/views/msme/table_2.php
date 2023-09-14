<?php
session_start();
include("../connect.php");
// echo $con;
if(isset($_POST["sub5"]))
{

    $a=$_POST['name1'];
    $b=$_POST['pincode']; 
    $c=$_POST['email'];
    $d=$_POST['mobile'];
    $e=$_POST['name_corporate'];
   
	$f=$_POST['route'];
   

$q="INSERT INTO table_2(name_insured,name_corporate,pincode,email,mobile,route)values('$a','$e','$b','$c','$d','$f')";
$res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
header("Location: https://raghnall.msmeaccelerate.in/$f");
// ob_start();

}
?>