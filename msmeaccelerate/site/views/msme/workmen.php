<?php
include("connect.php");
// echo "alert('hi')";
if(isset($_POST["sub6"]))
{

    $a=$_POST['industry'];
    $b=$_POST['subcategory']; 
    $c=$_POST['policy'];
    $d=$_POST['skilled'];
    $e=$_POST['salary_skill'];
	$f=$_POST['unskilled'];
   	$g=$_POST['salary_unskill'];
   	$h=$_POST['claim'];
   	$i=$_POST['email'];
   	$j=$_POST['mobile'];
   	$k=$_POST['company'];
   	$l=$_POST['pincode'];
   
$q="INSERT INTO workmen_insurance(industry_category,sub_category,policy_period,skilled_worker,salary_skilled,unskilled_worker,salary_unskilled,claim,email,mobile,name_company,pincode)values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";
$res=mysqli_query($con,$q);

// if ($con->query($q) === TRUE)
// {
//   echo "New record created successfully";
// }
// else
// {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }
header("Location: https://raghnall.msmeaccelerate.in/workmen-insuranace/");
}
?>