<?php
include "connection.php" ;
session_start();
$sql = "select * from usera,vitdetails,primaryinfo where usera.userid=vitdetails.userid and usera.userid=primaryinfo.userid order by cgpa desc";
$result = mysqli_query($conn,$sql) or die(mysqli_error()); ?>
<html>
<head>
<title>Subjects</title>

<title>Student Home</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

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
.top
{
  font-family: 'Comfortaa', cursive;
  background: rgb(1,102,102);
  color:white;
}
.top_name
{
  color:rgb(200,200,200);
}
.button_white
{
  color:black;
  background: #eee;
  border:#eee;
}
</style>
</head>
<body>

  <div class="container-responsive">
  <div class="row bstop top">
  <div class="col-xs-12 col-md-5">

  <h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{Admin}</small></h1>


  </div>
  <div class="col-xs-12 col-md-2"></div>
  <div class="col-xs-12 col-md-5 text-center">
  <h1><div class="btn-group btn-group-md " role="group" aria-label="...">
    <a href="homea.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-home"></span></a>
    <a href="index.php" class="btn button_white btn-danger">&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
  </div></h1>
  </div>
  </div>
  </div>
<br><br>

<table id="subjects">
  <tr>
	<th>Rank</th>
    <th>Registration Number</th>
    <th>Name</th>
	<th>CGPA</th>
  </tr>
<?php
	if ($result->num_rows > 0) {  $i=0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$i=$i+1; ?>

  <tr>
	<td><?php echo $i;?></td>
    <td><?php echo  "" . $row["regno"]. " ";?></td>
    <td><?php echo  "" . $row["name"]. " ";?></td>
	<td><?php echo  "" . $row["cgpa"]. " ";?></td>
  </tr>

	<?php } } ?>
	<?php
	mysqli_close($conn);
	?>
</table>

</body>
</html>
