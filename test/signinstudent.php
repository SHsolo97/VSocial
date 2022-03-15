<?php
include 'connection.php';
$reg_no=$_POST['reg_no1'];
$password=$_POST['password3'];
$sql="SELECT COUNT(*) FROM student WHERE (name='$reg_no' AND password='$password')";
$sql1="SELECT COUNT(*) FROM teacher WHERE (teacher_name='$reg_no' AND password='$password')";
$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
$result1 = mysqli_query($conn,$sql1) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
if($row[0]==0)
{	
	echo "not Present";
}
else
{	$id=0;
	session_start();
	$_SESSION['reg_no']=$reg_no;
	$_SESSION['id']=$id;
	header('location:homes.php');
}
if($row1[0]==0)
{
	$returnfalse="Whoops. Invalid username/password.";
	echo "<span class='false'>".$returnfalse."</span>";
}
else
{	$id=1;
	session_start();
	$_SESSION['reg_no']=$reg_no;
	$_SESSION['id']=$id;
	header('location:homet.php');
}

?>