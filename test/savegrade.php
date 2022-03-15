<?php
//signupteacher.php
include "connection.php";
session_start();
$grade=$_POST['grade'];
$tid=$_SESSION['tid'];
$sid=$_POST['sid'];
$uid=$_POST['uid'];

if($grade=="")
{
	echo "There seems to be an empty field.";
	echo $grade;
}
else
{

$sql1="update enroll set grade='$grade' where '$sid'=sid and '$tid'=tid and '$uid'=userid" ;
$sql1q=mysqli_query($conn,$sql1) or die(mysqli_error());

$cgpa=computecgpa($uid);
$sql = "update vitdetails set cgpa='$cgpa' where '$uid'=vitdetails.userid";
$result = mysqli_query($conn,$sql) or die(mysqli_error());

if ($sql1q)
header('location:tsubjects.php');
}

function computecgpa($uid){
include "connection.php";
$sql = "select * from usera,vitdetails,enroll,primaryinfo where enroll.userid='$uid' and usera.userid='$uid' and usera.userid=vitdetails.userid and vitdetails.userid=primaryinfo.userid";
$result = mysqli_query($conn,$sql) or die(mysqli_error());
$cgpa=0;
$c=0;
$m=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row["userid"]==$uid){
			$c=$c+1;
			if($row["grade"]=='S'){
				$m=$m+10;}
			elseif($row["grade"]=='A'){
				$m=$m+9;}
			elseif($row["grade"]=='B'){
				$m=$m+8;}
			elseif($row["grade"]=='C'){
				$m=$m+7;}
			elseif($row["grade"]=='D'){
				$m=$m+6;}
			elseif($row["grade"]=='E'){
				$m=$m+5;}
			elseif($row["grade"]=='F'){
				$m=$m+0;}
			elseif($row["grade"]=='N'){
				$m=$m+0;}
			else {
				$c=$c-1;
			}
				$cgpa=$m/$c;}
}}
return $cgpa;}
		


?>