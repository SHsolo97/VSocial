<?php
include "../connection.php" ;
session_start();
$tid=$_SESSION['regno'];
$sql = "SELECT * FROM subject";
$result = mysqli_query($conn,$sql) or die(mysqli_error()); ?>

<html>
<head>
<title>Subjects</title>
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

  <h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{Student}</small></h1>


  </div>
  <div class="col-xs-12 col-md-2"></div>
  <div class="col-xs-12 col-md-5 text-center">
  <h1><div class="btn-group btn-group-md " role="group" aria-label="...">
    <a href="homes.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-chevron-left"></span></a>
    <a href="../logout.php" class="btn button_white btn-danger">&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
  </div></h1>
  </div>
  </div>
  </div>
  <br><br>
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
