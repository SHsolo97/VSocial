<?php
//signupteacher.php
include "connection.php";
session_start();
$tid=$_SESSION['tid'];
$sid=$_POST["sid"];



if($sid=="")
{
	echo "There seems to be an empty field.";
	echo $sid;
}
else
{

$sql1="INSERT INTO teaches (sid,tid) VALUES ('$sid','$tid')";
$sql1q=mysqli_query($conn,$sql1) or die(mysqli_error());



if ($sql1q)
header('location:tsubjects.php');
}

?>