<?php
include "connection.php" ;
$sql = "SELECT * FROM subject";
$result = mysqli_query($conn,$sql) or die(mysqli_error()); ?>

<html>
<head>
<title>Subjects</title>
<style>
#subjects {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#subjects td, #subjects th {
    border: 1px solid #ddd;
    padding: 8px;
}

#subjects tr:nth-child(even){background-color: #f2f2f2;}

#subjects tr:hover {background-color: #ddd;}

#subjects th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<table id="subjects">
  <tr>
    <th>Course Code</th>
    <th>Course Title</th>
    <th>Register</th>
  </tr>
<?php 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { $i=0;
	$i=$i+1; ?>
	<form action="tregsub.php" type="post">
  <tr>
    <td><?php echo " " . $row["ccode"]. "";?></td>
    <td><?php echo  "" . $row["ctitle"]. " ";?></td>
	<input type="hidden" value="<?php $i ?>" name="sid">
    <td><input type="submit" value="register" > </td>
  </tr>
  </form>
	<?php } }
	mysqli_close($conn);
	?>
</table>

</body>
</html>
