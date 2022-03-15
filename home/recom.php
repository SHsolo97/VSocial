<?php
include '../connection.php';
session_start();
$user_id = $_SESSION['uid'];
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

?>