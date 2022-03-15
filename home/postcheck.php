<?php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
$sql1="SELECT userid FROM usera WHERE username='$username'";
$result1=mysqli_query($conn,$sql1) or die("Error: ".mysqli_error($conn));
$row1=mysqli_fetch_array($result1);
$id=$row1[0];
$content=$_POST['content'];
$timestamp=time();
if($content=="")
{
	die("Oops, it seems like your post is empty.");
}
$sql2="INSERT into post (userid,content,timestamp) VALUES ('$id','$content','$timestamp')";
if(mysqli_query($conn,$sql2))
{
	echo "<hr>Successfully posted &#9989<hr>";
}
else
{
	die("Error: ".mysqli_error($conn));
}
?>