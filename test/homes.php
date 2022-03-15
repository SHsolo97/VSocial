<?php
include '../connection.php';
session_start();
$username=$_SESSION['username'];
if(isset($_SESSION['state']))
{
$state=$_SESSION['state'];
}
$sql="SELECT userid FROM usera WHERE username='$username'";
$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
$row = mysqli_fetch_array($result);
$id=$row[0];
$sql2="SELECT name FROM primaryinfo WHERE userid='$id'";
$result2 = mysqli_query($conn,$sql2) or die("Error: ".mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);
$name=$row2[0];
?>
<html>
<head>
	<title>Student Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
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

<h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{<?php echo $name;?>}</small></h1>


</div>
<div class="col-xs-12 col-md-2"></div>
<div class="col-xs-12 col-md-5 text-center">
<h1><div class="btn-group btn-group-md " role="group" aria-label="...">
  <a href="../home" class="btn btn-primary button_white">&nbsp;<span class="glyphicon glyphicon-home"></span></a>
  <a href="../messenger" class="btn btn-primary button_white">&nbsp;<span class="glyphicon glyphicon-comment"></span></a>
  <!--<button type="button" class="btn btn-primary settings">Settings <span class="glyphicon glyphicon-cog"></span></button>-->
  <a href="../test/homes.php" class="btn btn-primary button_white">VAcademics </a>
  <a href="../test/learn.php" class="btn btn-primary button_white">VLearn </a>
  <a href="../logout.php" class="btn button_white btn-danger">&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
</div></h1>
</div>
</div>
</div>

<div class="col-xs-12 col-md-1"></div>
<div class="col-xs-12 col-md-10"><br><br>
	<h3>Welcome <?php echo  "" . $_SESSION['regno']. ""; ?><h3><br>
	<div class="col-xs-12 col-md-6 text-center"><h3><a href="../test/ssubjects.php"><img src="../suitcase.png"><br><br>Enrolled Subjects</a></h3><br></div>
	<div class="col-xs-12 col-md-6 text-center"><h3><a href="../test/stusubjects.php"><img src="../add (1).png"><br><br>Enroll New Subjects</a></h3><br></div>


	<form action="logout.php">

	</form>

</div>
<div class="col-xs-12 col-md-1"></div>

</body>
</html>
