<?php
include 'connection.php';
$username = $_POST['username2'];
$password = $_POST['password2'];
$sql      = "SELECT COUNT(*) FROM usera WHERE (username='$username' AND password='$password')";
$result = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
if ($row[0] == 0) {
    $returnfalse = "Whoops. Invalid username/password.";
    echo "<span class='false'>" . $returnfalse . "</span>";
} else {
    session_start();
    $_SESSION['username'] = $username;
    echo 1;
}
?>