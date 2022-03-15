<?php
include "connection.php" ;
session_start();
$tid=$_SESSION['tid'];
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

  <tr>
    <td><?php echo " " . $row["ccode"]. "";?></td>
    <td><?php echo  "" . $row["ctitle"]. " ";?></td>
	<form action="subteachers.php" method="post">
	<input type="hidden" name='sid' value="<?php echo $row["sid"]; ?>"  >
    <td><input type="submit" value="register" >   </form> </td>
  </tr>

	<?php } }
	mysqli_close($conn);
	?>
</table>

</body>
</html>
