<?php
include "connection.php" ;
$sql = "SELECT * FROM subject";
$result = mysqli_query($conn,$sql) or die(mysqli_error());

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Course Code: " . $row["ccode"]. " - Course Name: " . $row["ctitle"]. "" ?>
		<input type="submit" value="Register" >
		<?php echo "<br>"; 
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>