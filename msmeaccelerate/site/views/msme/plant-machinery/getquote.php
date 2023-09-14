<?php
$servername="localhost";

$username="mititeki_admin";

$password="E4#&utgi^*_l";

$databasename="mititeki_msmeaccelerate";

$conkey=mysqli_connect('$servername','$username','$password','$databasename');

if(!$conkey)
{
    die(mysqli_connect_error());
}
else
{
    echo "hai";
}
?>