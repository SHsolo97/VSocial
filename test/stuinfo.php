<?php
$frienduserid=$_POST['uid'];
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
$sql3="SELECT link FROM profilepic WHERE userid='$id' ORDER BY id DESC LIMIT 1";
$result3 = mysqli_query($conn,$sql3) or die("Error: ".mysqli_error($conn));
$row3 = mysqli_fetch_array($result3);
$linkprofilepic=$row3[0];
if ($linkprofilepic =="download.png")
{
	$linkprofilepic="../home/download.png";
}
?>

<!doctype html>
<html lang="en">
<head>
<script src="../../jquery-1.12.4.min.js"></script>
<meta charset="utf-8">
<title>vsocial</title>
<link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fauna+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">


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
span.labelhead
{
	font-family: 'Raleway', sans-serif;
    font-size:22px;
	border: thin solid #A0A0A0;
	background-color:#F4F4F4;
	border-radius:5px;
}
span.labelname
{
	font-family: 'Raleway', sans-serif;
    font-size:25px;
	text-decoration:underline;
}
span.label
{
	font-family: 'Raleway', sans-serif;
    font-size:20px;
	color:#999;
}
span.point
{
	font-family: 'Raleway', sans-serif;
    font-size:20px;
	color:black;
}
td.tdline
{
	border-left:thin solid #E2E2E2;
}
.bstop
{
	background:#EFEFEF;
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
<script type="text/javascript">
$(document).ready(function(){
			var frienduserid=$("p.frienduserid").html();
			$.post("postcall2.php", {frienduserid:frienduserid}, function(result){
    		$("#posts").html(result);
		});
});
</script>
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
		<a href="veiwstudents.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-chevron-left"></span></a>
		<a href="homea.php" class="btn button_white btn-primary">&nbsp;<span class="glyphicon glyphicon-home"></span></a>
		<a href="index.php" class="btn button_white btn-danger">&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
	</div></h1>
	</div>
	</div>
	</div>
	<br><br>
<!--stuff-->
<span class="n firstn">
<?php
if ($_GET['target']!="")
{
	$friendid=$_GET['target'];
	$sql1="SELECT * FROM friend WHERE userid='$id' AND friendid='$friendid'";
$s2=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
$sqw3=mysqli_num_rows($s2);
$sq1="SELECT * FROM friend WHERE userid='$friendid' AND friendid='$id'";
$sq2=mysqli_query($conn,$sq1) or die(mysqli_error($conn));
$sq3=mysqli_num_rows($sq2);
$s3=$sqw3+$sq3;
if ($s3==1)
{

if ($sqw3>0)
{
$s4=mysqli_fetch_array($s2);
}
else
{
$s4=mysqli_fetch_array($sq2);
}
if($_SESSION['t']=="admin"){
	$bval="Delete friend";}
if ($s4['status']==1)
{
//friends, delete request
$bval="Delete friend";
}
else if ($s4['status']==0 && $s4['userid']==$id && $s4['friendid']==$friendid)
{
//request sent, delete request
$bval="Cancel friend request";
}
else if ($s4['status']==0 && $s4['userid']==$friendid && $s4['friendid']==$id)
{
//request recieved, accept request
$bval="Accept friend request";
}
else
{
$bval="Error";
}
}
elseif($s3==0)
{
//send request
$bval="Send a friend request";
}
else
{
$bval="Error";
}

	echo "<table width='100%'><tr><td width='30%'>";
	$otheruserid=$_GET['target'];
	$s5="SELECT * FROM primaryinfo WHERE userid='$otheruserid'";
	$s6=mysqli_query($conn,$s5) or die(mysqli_error($conn));
	$row7=mysqli_fetch_array($s6) or die(mysqli_error($conn));
	$otherusername=$row7['name'];
	$otherusergender=$row7['gender'];
	if ($otherusergender=='M' || $otherusergender=='')
	{
	$call1="his";
	$call2="him";
	$call3="he";
	}
	else
	{
	$call1="her";
	$call2="her";
	$call3="she";
	}
	$s8="SELECT link FROM profilepic WHERE userid='$otheruserid' ORDER BY id DESC LIMIT 1";
	$s9=mysqli_query($conn,$s8) or die(mysqli_error($conn));
	$row10=mysqli_fetch_array($s9) or die(mysqli_error($conn));
	$otheruserpplink=$row10['link'];
	if($otheruserpplink=="download.png")
	{
	$otheruserpplink="../home/download.png";
	}
	echo "<br>";
	echo "<br>";
	echo "<center><img src='".$otheruserpplink."' width='50%'></center>";
	if ($bval=="Send a friend request")
	{
	echo "</td><td width='70%'>To send ".$otherusername." a message or view ".$call1." profile, add ".$call2." <br><a href='addfriend.php?friend=".$otheruserid."'><button class='general' name='add' id='add'>$bval</button></a></td></tr></table> ";
	}
	else if($bval=="Cancel friend request")
	{
		echo "</td><td width='70%'>You have sent ".$otherusername." a friend request.<br><a href='addfriend.php?friend=".$otheruserid."'><button class='general' name='add' id='add'>$bval</button></a></td></tr></table> ";
	}
	else if($bval == "Accept friend request")
	{
	echo "</td><td width='70%'>By accepting ".$otherusername."'s request, you can message each other and view profiles.<br><a href='addfriend.php?friend=".$otheruserid."'><button class='general' name='add' id='add'>$bval</button></a></td></tr></table> ";
	}
	else
	{
	//delete friend
	echo "</td><td width='70%'><a href='addfriend.php?friend=".$otheruserid."'><button class='general' name='add' id='add'>$bval</button></a></td></tr></table> ";
	}
}?>
</span>
<?php
if($_SESSION['t']=="admin"){
	$bval="Delete friend";
	}
if ($bval=="Delete friend")
{
?>
<script type="text/javascript">
$(document).ready(function(){
	$("span.firstn").hide();
});
</script>
<?php

$idz=$_POST['uid'];
$zql="SELECT * FROM primaryinfo WHERE userid='$idz'";
$zqlquery=mysqli_query($conn,$zql) or die(mysqli_error($conn));
$zqf=mysqli_fetch_array($zqlquery) or die(mysqli_error($conn));
$uname=$zqf['name'];
$uemail=$zqf['email'];
$ugender=$zqf['gender'];
$uage=$zqf['age'];
$uphonenumber=$zqf['phonenumber'];
$uaddress=$zqf['address'];
$zzql="SELECT * FROM vitdetails WHERE userid='$idz'";
$zzqlquery=mysqli_query($conn,$zzql) or die(mysqli_error($conn));
$zzqf=mysqli_fetch_array($zzqlquery) or die(mysqli_error($conn));
$yregno=$zzqf['regno'];
$yemail=$zzqf['email'];
$yblock=$zzqf['block'];
$yroomnumber=$zzqf['roomnumber'];
$yclubs=$zzqf['clubs'];
$ycgpa=$zzqf['cgpa'];
$ybranch=$zzqf['branch'];
$classes=$zzqf['classes'];

$zzzql="SELECT link FROM profilepic WHERE userid='$idz' ORDER BY id DESC LIMIT 1";
$zzzqlquery=mysqli_query($conn,$zzzql) or die(mysqli_error($conn));
$zzzqlqueryfetch=mysqli_fetch_array($zzzqlquery);
$otherpic=$zzzqlqueryfetch['link'];
if($otherpic=="download.png")
	{
	$otherpic="../home/download.png";
	}

if ($ugender=="")
{
$ugender="-";
}
if ($uage=="")
{
$uage="-";
}
if ($uemail=="")
{
$uemail="-";
}
if ($uphonenumber=="")
{
$uphonenumber="-";
}
if ($uaddress=="")
{
$uaddress="-";
}


if ($yblock=="")
{
$yblock="-";
}
if ($ybranch=="")
{
$ybranch="-";
}
if ($ycgpa=="")
{
$ycgpa="-";
}
if ($yclubs=="")
{
$yclubs="-";
}
if ($yemail=="")
{
$yemail="-";
}
if ($yregno=="")
{
$yregno="-";
}
if ($yroomnumber=="")
{
$yroomnumber="-";
}
?>
<table class="main2" width="100%">
<tr>
<td>

<table class="pinfo" width="100%">
<tr>
<td width="40%" valign="top">
<center>
<table width="80%">
<tr>
<td>
<center>
<span class="labelname"><?php echo $uname; ?></span><br><br>
<img src="<?php echo $otherpic; ?>" width="100%">
</center>
<br><br>
<center>
<span class="labelhead">&nbsp;Primary Info&nbsp;</span><br><br>
<span class="label">Gender:</span><span class="point"><?php echo $ugender;?></span><br>
<span class="label">Age:</span><span class="point"><?php echo $uage;?></span><br>
<span class="label">Email:</span><span class="point"><?php echo $uemail;?></span><br>
<span class="label">Phone number:</span><span class="point"><?php echo $uphonenumber;?></span><br>
<span class="label">Address:</span><span class="point"><?php echo $uaddress;?></span><br><br>

<span class="labelhead">&nbsp;VIT Details&nbsp;</span><br><br>
<span class="label">Registration Number:</span><span class="point"><?php echo $yregno;?></span><br>
<span class="label">VIT Email:</span><span class="point"><?php echo $yemail;?></span><br>
<span class="label">Branch:</span><span class="point"><?php echo $ybranch;?></span><br>
<span class="label">CGPA:</span><span class="point"><?php echo $ycgpa;?></span><br>
<span class="label">Clubs:</span><span class="point"><?php echo $yclubs;?></span><br>
<span class="label">Hostel Block:</span><span class="point"><?php echo $yblock;?></span><br>
<span class="label">Rooom Number:</span><span class="point"><?php echo $yroomnumber;?></span><br><br>
<p class="frienduserid" hidden><?php echo $frienduserid ?></p>
</center>

</td>
</tr>
</table>
</td>
<td width="60%" valign="top" class="tdline">
<center>
<table width="80%">
<tr>
<td>
<?php
$uid=$_POST['uid'];
$sql = "SELECT * FROM subject,userb,enroll,usera,vitdetails,primaryinfo where enroll.userid='$uid' and usera.userid='$uid' and userb.tid=enroll.tid and enroll.sid=subject.sid and usera.userid=primaryinfo.userid and usera.userid=vitdetails.userid";
$result = mysqli_query($conn,$sql) or die(mysqli_error()); ?>
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
    <th>Teacher Name</th>
	<th>Grade</th>
  </tr>
<?php $count=0;
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
  <tr>
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

<div id="posts"></div>
</td>
</tr>
</table>

</td>
</tr>
</table>
<?php

}
?>
</body>
</html>
