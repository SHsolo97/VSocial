<?php
//signupteacher.php
include "connection.php";
$name=$_POST["tname"];
$uname=$_POST["uname1"];
$password=$_POST["password1"];



if($name=="" || $uname=="" || $password=="" )
{
	echo "There seems to be an empty field.";
	echo $name.$teacher_id.$phone.$password;
}
else
{

$sql1="INSERT INTO userb (username,password,tname) VALUES ('$uname','$password','$name')";
$sql1q=mysqli_query($conn,$sql1) or die(mysqli_error());



if ($sql1q)
header('location:index.php');
}

?>