<?php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
$sql0="SELECT userid FROM usera WHERE username='$username'";
$result0=mysqli_query($conn,$sql0) or die("Error: ".mysqli_error($conn));
$row0=mysqli_fetch_array($result0);
$userid=$row0[0];
$sql1="SELECT postid FROM post ORDER BY postid DESC LIMIT 1";
$result1=mysqli_query($conn,$sql1) or die("Error: ".mysqli_error($conn));
$row1=mysqli_fetch_array($result1);
$id=$row1[0]+1;
$fileName = $_FILES["file1"]["name"]; // The file name
$fileName = $id.$fileName;
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$link="../uploads/$fileName";
$timestamp=time();
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../uploads/$fileName")){
	$sql2="INSERT into post (userid,content,timestamp) VALUES ('$userid','$link','$timestamp')";
	if(mysqli_query($conn,$sql2))
	{
		echo "<hr>&#9989 Successfully posted. Click on close. <hr>";
	}
	else
	{
		die("Error: ".mysqli_error($conn));
	}
} else {
    echo "move_uploaded_file function failed";
}

?>