<?php
//notifcheck.php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
$timestamp=time();
if(isset($_SESSION['state']))
{
$state=$_SESSION['state'];	
}
$sql="SELECT userid FROM usera WHERE username='$username'";
$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
$id=$row[0];

$type=$_POST['type'];
$sql2="INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','$type','$timestamp')";
$sql2result=mysqli_query($conn,$sql2) or die(mysql_error());

echo "done";

?>