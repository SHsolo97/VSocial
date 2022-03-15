<?php
//postcall2.php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
$sql1="SELECT userid FROM usera WHERE username='$username'";
$result1=mysqli_query($conn,$sql1) or die("Error: ".mysqli_error($conn));
$row1=mysqli_fetch_array($result1);
$id=$row1[0];

$array=$_POST['frienduserid'];
$query="SELECT * FROM post WHERE userid IN ('".$array."') ORDER BY postid DESC";
$result2=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($row2=mysqli_fetch_array($result2))
{
$timestamp=$row2['timestamp'];
$difference=time()-$timestamp;
	if ($difference>86400)
	{
		$difference=$difference/86400;
		$difference=intval($difference);
		$difference=$difference." days ago";
	}
	else
	{
		$difference=$difference/3600;
		$difference=intval($difference);
		if ($difference==0)
		{
			$difference="Less than 1 hour ago";
		}
		else if ($difference==1)
		{
			$difference="1 hour ago";
		}
		else
		{
			$difference=$difference." hours ago";
		}
	}
//timecheckend	
$id2=$row2['userid'];
$sqlname="SELECT name FROM primaryinfo WHERE userid='$id2'";
$resultname=mysqli_query($conn,$sqlname) or die("Error: ".mysqli_error($conn));
$rowname=mysqli_fetch_array($resultname);
$name=$rowname[0]; 
	if(substr($row2['content'], 0, 7)=="http://" || substr($row2['content'], 0, 8)=="https://" || substr($row2['content'], 0, 10)=="../uploads") {
    echo "<hr><span class='postcontent'><img src='".$row2['content']."' width='100%'></span><br><span class='postname'>".$name."</span><span class='posttime'> | ".$difference."</span>" ;	
	}
	else
	{
echo "<hr><span class='postcontent'>".$row2['content']."</span><br><span class='postname'>".$name."</span><span class='posttime'> | ".$difference."</span>" ;	
	}
}
?>