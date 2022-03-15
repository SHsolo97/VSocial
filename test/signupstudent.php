<?php
//signupstudent.php
include "connection.php";
$name=$_POST["Name"];
$reg_no=$_POST["reg_no"];
$phone=$_POST["phone"];
$password=$_POST["password1"];



if($name=="" || $reg_no=="" || $phone=="" || $password=="" )
{
	echo "There seems to be an empty field.";
	echo $name.$reg_no.$phone.$password;
}
else
{

$sql1="INSERT INTO student (name,reg_no,password,contact_no) VALUES ('$name','$reg_no','$password','$phone')";
$sql1q=mysqli_query($conn,$sql1) or die(mysqli_error());



if ($sql1q)
header('location:index.php');
}

?>