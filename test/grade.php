<?php
include "connection.php" ;
session_start();
$tid=$_SESSION['tid'];
$sid=$_POST['sid'];
$sql = "select * from primaryinfo,vitdetails,usera,userb,enroll where '$tid'=enroll.tid and enroll.sid='$sid' and usera.userid=enroll.userid and usera.userid=primaryinfo.userid and usera.userid=vitdetails.userid";
$result = mysqli_query($conn,$sql) or die(mysqli_error()); ?>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">

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

  <h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{Teacher}</small></h1>


  </div>
  <div class="col-xs-12 col-md-2"></div>
  <div class="col-xs-12 col-md-5 text-center">
  <h1><div class="btn-group btn-group-md " role="group" aria-label="...">
    <a href="tsubjects.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-chevron-left"></span></a>
    <a href="homet.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-home"></span></a>
    <a href="index.php" class="btn button_white btn-danger">&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
  </div></h1>
  </div>
  </div>
  </div>
  <br><br>
<table id="subjects">
  <tr>
	<th>Sl No</th>
    <th>Registration Number</th>
    <th>Name</th>
	<th>Grade</th>
  </tr>
<?php
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { $i=0;
	$i=$i+1; ?>

  <tr>
    <td><?php echo " " . $row["slno"]. "";?></td>
    <td><?php echo  "" . $row["regno"]. " ";?></td>
    <td><?php echo  "" . $row["name"]. " ";?></td>
	<form action="savegrade.php" method="post">
	<input type="hidden" name='sid' value="<?php echo $row["sid"]; ?>"  >
	<input type="hidden" name='uid' value="<?php echo $row["userid"]; ?>"  >
<td><input type="text" name='grade' value="<?php echo $row["grade"]; ?>"  >
	<input type="submit" value="enter" >   </form> </td>
  </tr>

	<?php } } ?>
	<?php
	mysqli_close($conn);
	?>
</table>

</body>
</html>
