<?php
include 'connection.php';
$username = $_POST['username'];
$email    = $_POST['email'];
$flag     = 0;
$sql      = "SELECT COUNT(*) FROM usera WHERE username='$username'";
$result = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
$row       = mysqli_fetch_array($result);
$timestamp = time();
if ($row[0] != 0) {
    $flag        = 1;
    $returnfalse = "Whoops. The username is taken.";
}
$sql2 = "SELECT COUNT(*) FROM primaryinfo WHERE email='$email'";
$result2 = mysqli_query($conn, $sql2) or die("Error: " . mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);
if ($row2[0] != 0) {
    $flag        = 1;
    $returnfalse = "Whoops. Looks like you already signed up.";
}
if ($flag == 0) {
    $name     = $_POST['name'];
    $password = $_POST['password'];
    $sql3     = "INSERT INTO usera (username,password) VALUES     ('$username','$password')";
    if (mysqli_query($conn, $sql3)) {
        $returnstatement = "Successfully signed up! You may now log in.";
        
        $ssql = "SELECT userid FROM usera WHERE username='$username'";
        $result = mysqli_query($conn, $ssql) or die("Error: " . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        $id  = $row[0];
        
        $sql4 = "INSERT INTO primaryinfo (userid,name,email) VALUES ('$id','$name','$email')";
        $sql5 = "INSERT INTO vitdetails (userid) VALUES ('$id') ";
        $sql6 = "INSERT INTO profilepic (userid,link,timestamp) VALUES ('$id','download.png','$timestamp')";
        
        $ssql2result1 = mysqli_query($conn, $sql4) or die(mysql_error());
        $ssql2result2 = mysqli_query($conn, $sql5) or die(mysql_error());
        $ssql2result3 = mysqli_query($conn, $sql6) or die(mysql_error());
        
        $ssql2 = "INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','f','$timestamp')";
        $ssql2result = mysqli_query($conn, $ssql2) or die(mysql_error());
        $ssql3 = "INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','m','$timestamp')";
        $ssql3result = mysqli_query($conn, $ssql3) or die(mysql_error());
        $ssql4 = "INSERT INTO notification_checked_on (userid,type,timestamp) VALUES ('$id','a','$timestamp')";
        $ssql4result = mysqli_query($conn, $ssql4) or die(mysql_error());
        
        echo "<span class='true'>" . $returnstatement . "</span>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<span class='false'>" . $returnfalse . "</span>";
}
?>