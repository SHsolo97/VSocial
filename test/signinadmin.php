<?php
include 'connection.php';
$uname=$_POST['reg_no1'];
$password=$_POST['password3'];
$sql="SELECT * FROM admin WHERE (username='$uname' AND password='$password')";
$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
if($row[0]==0)
{
	$returnfalse="Whoops. Invalid username/password.";
	echo "<span class='false'>".$returnfalse."</span>";
}
else
{
	session_start();
	$_SESSION['name']=$row['name'];
	$_SESSION['username']=$row['name'];
	$_SESSION['id']=$row['id'];
	$_SESSION['t']="admin";
	header('location:homea.php');
}
?>
