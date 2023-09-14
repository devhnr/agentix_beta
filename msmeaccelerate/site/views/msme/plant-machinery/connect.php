<?php
$con = mysqli_connect("localhost","mititeki_admin","E4#&utgi^*_l","mititeki_msmeaccelerate");
if(!$con)
{
    die(mysqli_connect_error());
}
else
{
    echo "hello";
}

?>