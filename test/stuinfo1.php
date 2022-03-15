<?php
include "connection.php" ;
session_start();
$uid=$_POST['uid'];
$sql = "SELECT * FROM subject,userb,enroll,usera,vitdetails,primaryinfo where enroll.userid='$uid' and usera.userid='$uid' and userb.tid=enroll.tid and enroll.sid=subject.sid and usera.userid=primaryinfo.userid and usera.userid=vitdetails.userid";
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
	<th>Registration Number</th>
    <th>Name</th>
    <th>Course Code</th>
    <th>Course Title</th>
    <th>Teacher Name</th>
	<th>Grade</th>
  </tr>
<?php $count=0;
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo " " . $row["regno"]. "";?></td>
    <td><?php echo  "" . $row["name"]. " ";?></td>
    <td><?php echo " " . $row["ccode"]. "";?></td>
    <td><?php echo  "" . $row["ctitle"]. " ";?></td>
	<td><?php echo  "" . $row["tname"]. " ";?></td>
	<td><?php echo  "" . $row["grade"]. " ";?></td>
  </tr>
  <?php if( $count <1){ ?>
  <h3> CGPA :
	<?php 
	echo  "" . $row["cgpa"]. " ";
	}
		$count=$count+1;
		}}
	mysqli_close($conn);
	?>
	</h3>
</table>

</body>
</html>