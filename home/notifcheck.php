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
	
$cql1="SELECT * FROM notification_checked_on WHERE userid='$id' AND type='f' ORDER BY id DESC LIMIT 1";
$cql2=mysqli_query($conn,$cql1) or die(mysqli_error($conn));
$cql3=mysqli_fetch_array($cql2) or die(mysql_error($conn));
$timecheckedf=$cql3['timestamp'];
$dql1="SELECT * FROM notification_checked_on WHERE userid='$id' AND type='m' ORDER BY id DESC LIMIT 1";
$dql2=mysqli_query($conn,$dql1) or die(mysqli_error($conn));
$dql3=mysqli_fetch_array($dql2) or die(mysql_error($conn));
$timecheckedm=$dql3['timestamp'];


$type=$_POST['type'];
if ($type != "z")
{
$sql2="INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','$type','$timestamp')";
$sql2result=mysqli_query($conn,$sql2) or die(mysql_error($conn));



}
else
{

}
$count1=0;
$count2=0;
$zzql1="SELECT * FROM friend WHERE friendid='$id' AND status=0 ORDER BY id DESC";
$zzql2=mysqli_query($conn,$zzql1) or die(mysqli_error($conn));
while ($zzzql1=mysqli_fetch_array($zzql2))
{
$timesent=$zzzql1['timestamp'];
if ($timesent>$timecheckedf)
{
$count1++;	
}
else
{
$count2++;	
}
}
if ($count1>0)
{
echo "Friend Requests <span class='badge' style='background:darkred'>".$count1."</span>";	
}
else
{
echo "Friend Requests <span class='badge' style='background:grey'>".$count2."</span>";
}
?>