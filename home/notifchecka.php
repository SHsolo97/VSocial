<?php
//notifchecka.php
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

$sql2="INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','a','$timestamp')";
$sql2result=mysqli_query($conn,$sql2) or die(mysql_error());

$bsql="SELECT * FROM notification_checked_on WHERE userid='$id' AND type='a' ORDER BY id DESC LIMIT 1";
$bsqlquery=mysqli_query($conn,$bsql) or die(mysqli_error($conn));
$bsqlfetch=mysqli_fetch_array($bsqlquery) or die(mysqli_error($conn));
$timecheckeda=$bsqlfetch['timestamp'];

$xsql="SELECT * FROM friend WHERE userid='$id' AND status=1 ORDER BY id DESC";
$xsqlquery=mysqli_query($conn,$xsql) or die(mysqli_error($conn));
$countz=0;
$countz1=0;
while($xsqlfetch=mysqli_fetch_array($xsqlquery))
{
$timea=$xsqlfetch['timestamp'];
$acceptuserid=$xsqlfetch['friendid'];
$vsql="SELECT name FROM primaryinfo WHERE userid='$acceptuserid'";
$vsqlquery=mysqli_query($conn,$vsql) or die(mysqli_error($conn));
$vsqlfetch=mysqli_fetch_array($vsqlquery);
$acceptusername=$vsqlfetch['name'];	
if($timecheckeda<$timea)
{
$countz++;	
}
else
{
$countz1++;
}
}


if($countz>0)
{
echo "Friend Acceptances <span class='badge' style='background:darkred'>".$countz;	
}
else
{
echo "Friend Acceptances <span class='badge' style='background:grey'>".$countz1;		
}
?>