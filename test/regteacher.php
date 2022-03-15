<?php
//signupteacher.php
include "connection.php";
session_start();
$tid=$_POST['tid'];
$sid=$_POST["sid"];
$uid=$_SESSION['uid'];


if($sid=="")
{
	echo "There seems to be an empty field.";
	echo $sid;
}
else
{

$sql1="INSERT INTO enroll (userid,sid,tid) VALUES ('$uid','$sid','$tid')";
$sql1q=mysqli_query($conn,$sql1) or die(mysqli_error());



if ($sql1q)
header('location:homes.php');
}

?>