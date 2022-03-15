<?php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
$sql="SELECT userid FROM usera WHERE username='$username'";
$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
$id=$row[0];
//name,generalemail,gender,age,phoneno,address
$part=$_POST['part'];
if($part=="general")
{
	$name=$_POST['name'];
	$generalemail=$_POST['generalemail'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$phoneno=$_POST['phoneno'];
	$address=$_POST['address'];
	$sqlquery1="UPDATE primaryinfo SET name='$name',email='$generalemail',gender='$gender',age='$age',phonenumber='$phoneno',address='$address' WHERE userid='$id'";
	$result1=mysqli_query($conn,$sqlquery1) or die("Error: ".mysqli_error($conn));
	echo "<hr>Successfully updated &#9989<hr>";
}
else
{
	$regno=$_POST['regno'];
	$vitemail=$_POST['vitemail'];
	$cgpa=$_POST['cgpa'];
	$clubs=$_POST['clubs'];
	$branch=$_POST['branch'];
	$classes=$_POST['classes'];
	$sqlquery2="UPDATE vitdetails SET regno='$regno',email='$vitemail',cgpa='$cgpa',clubs='$clubs',branch='$branch',classes='$classes' WHERE userid='$id'";
	$result2=mysqli_query($conn,$sqlquery2) or die("Error: ".mysqli_error($conn));
	echo "<hr>Successfully updated &#9989<hr>";
}

//regno,vitemail,cgpa,clubs,branch,classes
?>