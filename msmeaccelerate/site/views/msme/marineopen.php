<?php
include("../connect.php");
// echo $con;
if(isset($_POST["sub3"]))
{

    $a=$_POST['product'];
    $b=$_POST['corporate']; 
    $c=$_POST['mobile'];
    $d=$_POST['email'];
	$e=$_POST['route'];
   

$q="INSERT INTO marineopen(products,corporate,mobile,email,route)values('$a','$b','$c','$d','$e')";
$res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
header("Location: https://raghnall.msmeaccelerate.in/$e");
}
?>