<?php 	
include '../connection.php';
session_start();
$user_id = $_SESSION['uid'];
$mutual=array();	
$fr1=array();
$fr2=array();
$score=array();
$recom=array();
$friendsql="SELECT * FROM friend WHERE (userid='$user_id' OR friendid='$user_id') AND status=1";
$friendsqlresult=mysqli_query($conn,$friendsql) or die(mysqli_error($conn));




for ($x = 1; $x <= 13; $x++) 
{

	$uid=$x;
  $friendsql2="SELECT * FROM friend WHERE (userid='$uid' OR friendid='$uid') AND status=1";
  $friendsqlresult2=mysqli_query($conn,$friendsql2) or die(mysqli_error($conn));
  $friendsql2row=mysqli_fetch_array($friendsqlresult2);
	$count=0;

	while($friendsql2row=mysqli_fetch_array($friendsqlresult2))
	{
$zid1=$friendsql2row['userid'];
$zid2=$friendsql2row['friendid'];
	
if($zid1==$user_id)
{
  $f1=$zid2;
}
else {
  $f1=$zid1;
}
	array_push($fr1,$f1);
	}

	//user's friends
while($friendsqlrow=mysqli_fetch_array($friendsqlresult))
{
$zid1=$friendsqlrow['userid'];
$zid2=$friendsqlrow['friendid'];
if($zid1==$user_id)
{
  $f2=$zid2;
}
else {
  $f2=$zid1;
}
array_push($fr2,$f2);}


array_push($mutual,count(array_intersect($fr1,$fr2)));

}

for($i=12;$i>0;$i--){
$mutual[$i]=$mutual[$i]-$mutual[$i-1];}
for($i=0;$i<13;$i++){
$mutual[$i]=$mutual[$i]/11;}
echo "<br>";
print_r ($mutual);
echo "<br>";


$cwt=array();
$cwt=array_fill(0, 13, 0);

$friendsql="SELECT * FROM enroll WHERE (userid='$user_id')";
$friendsqlresult=mysqli_query($conn,$friendsql) or die(mysqli_error($conn));

while($friendsqlrow=mysqli_fetch_array($friendsqlresult))
{
$sid=$friendsqlrow['sid'];
$friendsql1="SELECT * FROM enroll WHERE (sid='$sid')";
$friendsql1result=mysqli_query($conn,$friendsql1) or die(mysqli_error($conn));
while($friendsqlrow1=mysqli_fetch_array($friendsql1result))
{
$uid=$friendsqlrow1['userid'];
$cwt[$uid-1]=$cwt[$uid-1]+1;
}

}
for($i=0;$i<13;$i++){
$cwt[$i]=$cwt[$i]/10;}
  print_r ($cwt);
  echo "<br>";
for($i=0;$i<13;$i++){
$score[$i]=(2*$cwt[$i]+$mutual[$i])/3;}
print_r ($score);
echo "<br>";

arsort($score);

$recom=(array_keys($score));
for($i=0;$i<13;$i++){
	$b=$recom[$i]+1;
  $friendsql2="SELECT username FROM usera WHERE userid='$b'";
  $friendsqlresult2=mysqli_query($conn,$friendsql2) or die(mysqli_error($conn));
  $friendsql2row=mysqli_fetch_array($friendsqlresult2);
  echo "<a href='../user/index.php?target=".$b."'>".$friendsql2row['username']."</a><br>";
}
?>

