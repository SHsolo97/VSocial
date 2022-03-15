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

<!doctype html>
<html lang="en">
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="../../jquery-1.12.4.min.js"></script>
<meta charset="utf-8">
<title>vsocial</title>
<link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fauna+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<style type="text/css">
table.message {
  background-color: #f5f5f5;
  border:thin solid  #c4c4c4;
  color:grey;
  padding: 3px;
  font-family: 'Raleway', sans-serif;
  font-size:18.5px;
  width:100%;
}
span.logo
    {
        font-size:50px;
        font-family:'Montserrat Alternates', sans-serif;
    }
span.n
    {
        font-family: 'Raleway', sans-serif;
        font-size:25px;
    }
table.g2
{
		font-family: 'Raleway', sans-serif;
        font-size:20px;
}
table.total
{
	width:100%;
	border-spacing:0px;
	border-collapse:collapse;
	border:none;
}
.overlay{
    opacity:1;
    background-color:rgb(247, 231, 206);
    position:fixed;
    width:100%;
    height:100%;
    top:0px;
    left:0px;
    z-index:1000;
}
table.head
{
	background-color:rgb(247, 231, 206);
	width:100%;
	border:none;
}
body
{
	padding:0px;
	margin:0px;
}
button.x,button.u,button.postbutton,button.postimage,.general
{
	transition:all ease 0.5s;
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border: thin solid #666;
	background-color:white;
	color:#666;
	border-radius:5%;
}
input.settings
{
	transition:all ease 0.5s;
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border: thin solid #666;
	background-color:white;
	color:#666;
	border-radius:5%;
}
button.x:hover,button.u:hover,button.postbutton:hover,input.settings:hover,button.postimage:hover,.general:hover
{
	cursor:pointer;
	border:thin solid black;
	color:black;
}
textarea#postcontenthandler
{
	font-size:15px;
	font-family:'Raleway', sans-serif;
	border:thin solid #f5f5f5;
	height:50px;
	grid-rows:100;
	outline:none;
	resize:none;
}
textarea#postcontenthandler:active
{
	border:thin solid #c4c4c4;
	height:50px;

}
div.pointer:hover
{
	cursor:pointer;
}
table.post
{
	width:100%;
}
td.postresult,td.settingsresult,#status
{
	font-size:14px;
	color:green;
	font-family:'Raleway', sans-serif;
	text-align:center;
}
span.postcontent
{
	font-size:14px;
	color:black;
	font-family:'Raleway', sans-serif;
}
span.postname
{
	font-size:12.5px;
	color:grey;
	font-family:'Raleway', sans-serif;
}
span.posttime
{
	font-size:12.5px;
	color:grey;
	font-family:'Raleway', sans-serif;
}
hr
{
	border:thin solid #f5f5f5;
	color:#f5f5f5;
	background-color:#f5f5f5;
}
hr.different
{
	border:thin solid #c4c4c4;
	color:#c4c4c4;
	background-color:#c4c4c4;
}
table.settings,table.innersettings
{
	border:none;
	font-size:15px;
	color:black;
	font-family:'Raleway', sans-serif;
}
span.setheading
{
	font-family: 'Carrois Gothic SC', sans-serif;
	font-size:17px;
}

.g2
{
	font-family: 'Raleway', sans-serif;
    font-size:25px;
}
.bstop
{
	background:#EFEFEF;
}

#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
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

<h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{<?php echo $name;?>}</small></h1>


</div>
<div class="col-xs-12 col-md-2"></div>
<div class="col-xs-12 col-md-5 text-center">
<h1><div class="btn-group btn-group-md " role="group" aria-label="...">
  <a href="../home" class="btn btn-primary button_white"><span class="glyphicon glyphicon-home"></span></a>
  <a href="../messenger" class="btn btn-primary button_white"><span class="glyphicon glyphicon-comment"></span></a>
  <!--<button type="button" class="btn btn-primary settings">Settings <span class="glyphicon glyphicon-cog"></span></button>-->
  <a href="../test/homes.php" class="btn btn-primary button_white">VAcademics </a>
  <a href="../test/learn.php" class="btn btn-primary button_white">VLearn </a>
  <a href="../logout.php" class="btn button_white btn-danger"><span class="glyphicon glyphicon-log-out"></span></a>
</div></h1>
</div>
</div>
</div>

<br>

<form id="search" formaction="" method="post">
<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="custom-search-input">
                <div class="input-group col-md-12">

                    <input type="text" name="name2" id="name2" class="form-control input-lg" placeholder="Search for Names"/>
                    <span class="input-group-btn">
			<input type="submit" class="btn btn-success btn-lg" name="submit">
                    </span>
                </div>
            </div>
        </div>
		<div class="col-md-3"></div>
	</div>
</div>
</form>
<br>
<table class="main" width="100%">
<tr>
<td>
<div class="container">
<div class="row">
<?php
if(isset($_POST['submit']))
{
	$flag2a=1;
}
else
{
	$flag2a=0;
}

if(isset($_POST['submit']) && $_POST['name2']!="")
{
echo "<div class='col-xs-12 text-center'><h3>&nbsp;&nbsp;Search Result</h1></div>";
$name2 = $_POST['name2'];
$as1="SELECT userid,name FROM primaryinfo WHERE name='$name2'";
$as2=mysqli_query($conn,$as1) or die(mysqli_error());
$number_of_rows = mysqli_num_rows($as2);
while ($arow4 = mysqli_fetch_array($as2))
{
$aotheruserid=$arow4['userid'];
$aotherusername=$arow4['name'];
$as6="SELECT link FROM profilepic WHERE userid='$aotheruserid' ORDER BY id DESC LIMIT 1";
$as7=mysqli_query($conn,$as6) or die(mysqli_error($conn));
$arow8=mysqli_fetch_array($as7) or die(mysqli_error($conn));
$aotheruserpplink=$arow8['link'];
?>

<div class="col-md-4 col-xs-6">
      <div class="thumbnail">
        <a href="../user/index.php?target=<?php echo $aotheruserid;?>" target="_blank">
          <img src="<?php echo "../home/".$aotheruserpplink; ?>" alt="Lights" style="width:100%" class="img-responsive">
          <div class="caption">
            <p class="lead text-center" style="color:grey"><?php echo $aotherusername; ?></p>
          </div>
        </a>
      </div>
    </div>

<?php
}
if($number_of_rows==0)
{
echo "<div class='col-xs-12 text-center'>
<h4>No user having username ".$name2."</h4>
</div>	";
}
?>

</div></div>
<?php
if($flag2a==1)
{
echo "<div class='col-xs-12 text-center'>
<hr><br>
<h3>Other users on vsocial</h4>
<br>
</div>	";
}
?>
<!--<tr>
<td width="20%">
<img src="<?php echo $aotheruserpplink; ?>" width="100%">
</td>
<td width="80%">
<a href="../user/index.php?target=<?php echo $aotheruserid;?>"><?php echo $aotherusername?></a>
</td>
</tr>--><?php
//}
//echo "<!--<tr><td colspan='2'><hr class='different'></td></tr>-->";
}
?>
<!--</table>
<table class="g2" width="100%">
<?php
/*$s1="SELECT * FROM usera";
$s2=mysqli_query($conn,$s1) or die(mysqli_error($conn));
$count=0;
while ($row4 = mysqli_fetch_array($s2))
{
$otheruserid=$row4['userid'];
$s3="SELECT name FROM primaryinfo WHERE userid='$otheruserid'";
$s4=mysqli_query($conn,$s3) or die(mysqli_error($conn));
$row5=mysqli_fetch_array($s4) or die(mysqli_error($conn));
$otherusername=$row5['name'];

$qs6="SELECT link FROM profilepic WHERE userid='$otheruserid' ORDER BY id DESC LIMIT 1";
$qs7=mysqli_query($conn,$qs6) or die(mysqli_error($conn));
$qrow8=mysqli_fetch_array($qs7) or die(mysqli_error($conn));
$qotheruserpplink=$qrow8['link'];*/
?>
<tr>
<td width="20%">
<img src="<?php echo "../home/".$qotheruserpplink; ?>" width="100%">
</td>
<td width="80%"><a href="../user/index.php?target=<?php echo $otheruserid; ?>"><?php echo $otherusername; ?></a>
</td>
</tr>
<?php
//}
?>
</table>-->

<div class="container">
  <div class="row text-left">

<?php
$s1="SELECT * FROM usera";
$s2=mysqli_query($conn,$s1) or die(mysqli_error($conn));
$count=0;
while ($row4 = mysqli_fetch_array($s2))
{
$otheruserid=$row4['userid'];
$s3="SELECT name FROM primaryinfo WHERE userid='$otheruserid'";
$s4=mysqli_query($conn,$s3) or die(mysqli_error($conn));
$row5=mysqli_fetch_array($s4) or die(mysqli_error($conn));
$otherusername=$row5['name'];

$qs6="SELECT link FROM profilepic WHERE userid='$otheruserid' ORDER BY id DESC LIMIT 1";
$qs7=mysqli_query($conn,$qs6) or die(mysqli_error($conn));
$qrow8=mysqli_fetch_array($qs7) or die(mysqli_error($conn));
$qotheruserpplink=$qrow8['link'];
?>



	<div class="col-md-4 col-xs-6 text-left">
      <div class="thumbnail">
        <a href="../user/index.php?target=<?php echo $otheruserid;?>" target="_blank">
          <img src="<?php echo "../home/".$qotheruserpplink; ?>" alt="Lights" style="width:100%" class="img-responsive">
          <div class="caption text-center">
            <p class="lead" style="color:grey"><?php echo $otherusername; ?></p>
          </div>
        </a>
      </div>
    </div>



<?php } ?>
</div>
</div>
</body>
</html>
