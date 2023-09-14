<?php
include("../connect.php");
// echo $con;
if(isset($_POST["sub4"]))
{

    $a=$_POST['commodity'];
    $b=$_POST['cargo']; 
    $c=$_POST['mobile'];
    $d=$_POST['email'];
    $e=$_POST['company'];
    $f=$_POST['pincode'];
	$g=$_POST['route'];
   

$q="INSERT INTO marine_transist(commodity_type,cargo_sum_insured,mobile,email,name_company,pincode,route)values('$a','$b','$c','$d','$e','$f','$g')";
$res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
header("Location: https://raghnall.msmeaccelerate.in/marine-transist");
}

// if(isset($_POST["sub10"]))
// {

//     $a=$_POST['name1'];
   
//     $b=$_POST['email'];
//     $c=$_POST['phone'];
   
   
// 	$d=$_POST['route'];
   

// $q="INSERT INTO bookconsultation(name,email,phone,route)values('$a','$b','$c','$d')";
// $res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// } else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
// header("Location: http://raghnall.msmeaccelerate.in/$f");
// // ob_start();

// }
?>