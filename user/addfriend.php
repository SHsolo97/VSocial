<?php
//addfriend.php
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

$friendid=$_GET['friend'];

$sql1="SELECT * FROM friend WHERE (userid='$id' AND friendid='$friendid') OR (userid='$friendid' AND friendid='$id')";
$s2=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
$s3=mysqli_num_rows($s2);
if ($s3==1)
{
$s4=mysqli_fetch_array($s2);
if ($s4['status']==1)
{
//friends, delete request
$s9="DELETE FROM friend WHERE (userid='$id' AND friendid='$friendid') OR (userid='$friendid' AND friendid='$id')";
$s10=mysqli_query($conn,$s9) or die(mysqli_error());	
echo "request deleted 1";
}
else if ($s4['status']==0 && $s4['userid']==$id && $s4['friendid']==$friendid)
{
//request sent, delete request
$s5="DELETE FROM friend WHERE userid='$id' AND friendid='$friendid'";
$s6=mysqli_query($conn,$s5) or die(mysqli_error());	
echo "request deleted 2";
}
else if ($s4['status']==0 && $s4['userid']==$friendid && $s4['friendid']==$id)
{
//request recieved, accept request
$s7="UPDATE friend SET status=1,timestamp='$timestamp' WHERE userid='$friendid' AND friendid='$id'";
$s8=mysqli_query($conn,$s7) or die(mysqli_error($conn));	
echo "request accepted";
}
else
{
//error	
}
}
elseif($s3==0)
{
//send request
$s11="INSERT INTO friend (userid,friendid,status,timestamp) VALUES ('$id','$friendid',0,'$timestamp')";
$s12=mysqli_query($conn,$s11) or die(mysqli_error($conn));
echo "request sent";
}
else
{
//error
}
header("Location: index.php?target=$friendid");
?>