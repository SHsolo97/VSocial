<?php
include '../connection.php';
session_start();
$user_id = $_SESSION['uid'];


$friendsql="SELECT * FROM friend WHERE (userid='$user_id' OR friendid='$user_id') AND status=1";
$friendsqlresult=mysqli_query($conn,$friendsql) or die(mysqli_error($conn));

while($friendsqlrow=mysqli_fetch_array($friendsqlresult))
{
$zid1=$friendsqlrow['userid'];
$zid2=$friendsqlrow['friendid'];
if($zid1==$user_id)
{
  $friend_id=$zid2;
}
else {
  $friend_id=$zid1;
}
  $friendsql2="SELECT username FROM usera WHERE userid='$friend_id'";
  $friendsqlresult2=mysqli_query($conn,$friendsql2) or die(mysqli_error($conn));
  $friendsql2row=mysqli_fetch_array($friendsqlresult2);
  echo "<a href='../user/index.php?target=".$friend_id."'>".$friendsql2row['username']."</a><br>";
}


?>
