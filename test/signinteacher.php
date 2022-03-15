<?php
include 'connection.php';
$uname=$_POST['uname'];
$password=$_POST['password1'];
$sql="SELECT * FROM userb WHERE (username='$uname' AND password='$password')";
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
	$_SESSION['tname']=$row['tname'];
	$_SESSION['tid']=$row['tid'];
	header('location:homet.php');
}
?>
