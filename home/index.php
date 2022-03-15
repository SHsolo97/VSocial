<?php
include '../connection.php';
session_start();
$username = $_SESSION['username'];

if (isset($_SESSION['state'])) {
    $state = $_SESSION['state'];
}


$sql = "SELECT userid FROM usera WHERE username='$username'";
$result = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
$row  = mysqli_fetch_array($result);
$id   = $row[0];
$_SESSION['uid']=$id;
$sqlsettings2 = "SELECT * FROM vitdetails WHERE userid='$id'";
$sqlsettings2query = mysqli_query($conn, $sqlsettings2) or die("Error: " . mysqli_error());
$sqlsf2        = mysqli_fetch_array($sqlsettings2query);
$_SESSION['regno']=$sqlsf2['regno'];
$sql2 = "SELECT name FROM primaryinfo WHERE userid='$id'";
$result2 = mysqli_query($conn, $sql2) or die("Error: " . mysqli_error($conn));
$row2 = mysqli_fetch_array($result2);
$name = $row2[0];
$sql3 = "SELECT link FROM profilepic WHERE userid='$id' ORDER BY id DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3) or die("Error: " . mysqli_error($conn));
$row3           = mysqli_fetch_array($result3);
$linkprofilepic = $row3[0];
if ($linkprofilepic == "") {
    $linkprofilepic = "download.png";
}


$friendsql = "SELECT * FROM friend WHERE (userid='$id' OR friendid='$id') AND status=1";
$friendsqlresult = mysqli_query($conn, $friendsql) or die(mysqli_error($conn));
$list      = "";
$countlist = 0;
while ($friendsqlrow = mysqli_fetch_array($friendsqlresult)) {
    $countlist++;
    $zid1 = $friendsqlrow['userid'];
    $zid2 = $friendsqlrow['friendid'];
    if ($zid1 == $id) {
        $list = $list . "," . $zid2;
    } else {
        $list = $list . "," . $zid1;
    }
}
$list = substr($list, 1);

//notificationschecked
$cql1 = "SELECT * FROM notification_checked_on WHERE userid='$id' AND type='f' ORDER BY id DESC LIMIT 1";
$cql2 = mysqli_query($conn, $cql1) or die(mysqli_error($conn));
$cql3 = mysqli_fetch_array($cql2) or die(mysqli_error($conn));
$timecheckedf = $cql3['timestamp'];
$dql1         = "SELECT * FROM notification_checked_on WHERE userid='$id' AND type='m' ORDER BY id DESC LIMIT 1";
$dql2 = mysqli_query($conn, $dql1) or die(mysqli_error($conn));
$dql3 = mysqli_fetch_array($dql2) or die(mysqli_error($conn));
$timecheckedm = $dql3['timestamp'];

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../jquery-1.12.4.min.js"></script>
<script src="jquery.textareaAutoResize.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(window).load(function() {
     $('.overlay').hide();
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('textarea#postcontenthandler').autoResize();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("div#2").hide();
    $("button.x").hide();
    $("div#1").click(function(){
        $("div#1").hide();
        $("div#2").fadeIn();
        $("button.x").show();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#logout").click(function(){
      window.location.href = '../logout.php';
    });
    $("button.x").click(function(){
        $("table.message").fadeOut();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("button.x2").click(function(){
        $("#status2").html("");
        $("#postimage").fadeOut();
        $("#posts").load("postcall.php");
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("table.changepp").hide();
    $("button.changepp").click(function(){
        $("#posts").fadeOut();
        $("table.changepp").fadeIn();
    });
    $("button.x3").click(function(){
        $("#status2").html("");
        $("table.changepp").fadeOut();
        $("#posts").fadeIn();
        $(".poster").fadeIn();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#picbar").hide();
    $("input#up11").click(function(){
        $("#picbar").fadeIn();
    });
    $("button.x2,button.x3").click(function(){
        $("#picbar").fadeOut();
    });
});
</script>
<!-- script for friend request button click-->
<script type="text/javascript">
$(document).ready(function(){
    $("table.friendrequests").hide();
    $("button.fr").click(function(){

        $("table.poster,table.posts").fadeOut();
        $("table.friendrequests").fadeIn();

            $.post("notifcheck.php", {type:'f'}, function(result){
            $("button.fr").html(result);

        });
    });
    $("button.frclose").click(function(){
        $("table.friendrequests").hide();
        $("table.poster,table.posts").fadeIn();
    });
});
</script>
<!-- script for friend racceptance button click-->
<script type="text/javascript">
$(document).ready(function(){
    $("table.friendacceptance").hide();
    $("button.fa").click(function(){

        $("table.poster,table.posts").fadeOut();
        $("table.friendacceptance").fadeIn();

            $.post("notifchecka.php", {type:'a'}, function(result){
            $("button.fa").html(result);

        });
    });
    $("button.x4").click(function(){
        $("table.friendacceptance").hide();
        $("table.poster,table.posts").fadeIn();
    });

});
</script>
<!-- script for posting-->
<script type="text/javascript">
$(document).ready(function(){

    $("#postresult").hide();
    $("#posts").load("postcall.php");
    $("button.postbutton").click(function(){
        var content=$("textarea#postcontenthandler").val();
        if (content!="")
        {
            $("button.postbutton").html("Posting...");
            $.post("postcheck.php", {content:content}, function(result){
            $("#postresult").html(result);
            $('#postresult').fadeIn('fast').delay(1300).fadeOut('fast');
            $("button.postbutton").html("Post");
            $("textarea#postcontenthandler").val("");
            $("#posts").load("postcall.php");

        });
        }
    });
});
</script>
<!-- script for image posting-->
<script type="text/javascript">
$(document).ready(function(){
    $('#postimage').hide();
    $("button.postimage").click(function(){
        $('#postimage').fadeIn('fast');
    });
});
</script>
<!--script for settings-->
<script type="text/javascript">
$(document).ready(function(){
    $("#settings").hide();
    var settingstoggle=0;
    $("#settings_button").click(function(){
        if(settingstoggle==0)
        {
            $("#notheader").hide();
            $("#settings").fadeIn();
            $("#settings_button").html("<span class='glyphicon glyphicon-home'></span>");
            settingstoggle=1;
        }
        else
        {
            $("#settings").hide();
            $("#notheader").fadeIn();
            $("#settings_button").html("<span class='glyphicon glyphicon-cog'></span>");
            settingstoggle=0;
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("button#generalupdate").click(function(){
        var name=$("#setname").val();
        var generalemail=$("#setgeneralemail").val();
        var gender=$("#gender").val();
        var age=$("#setage").val();
        var phoneno=$("#setphoneno").val();
        var address=$("#setaddress").val();
        $.post("updatesettings.php",{part:"general",name:name,generalemail:generalemail,gender:gender,age:age,phoneno:phoneno,address:address},function(result){
        $("#settingsresult").html(result);
        $('#settingsresult').fadeIn('fast').delay(1300).fadeOut('fast');
        });

    });
    $("button#vitupdate").click(function(){
        var regno=$("#setregno").val();
        var vitemail=$("#setvitemail").val();
        var cgpa=$("#setcgpa").val();
        var clubs=$("#setclubschapters").val();
        var branch=$("#setbranch").val();
        var classes=$("#setclasses").val();
        $.post("updatesettings.php",{part:"vit",regno:regno,vitemail:vitemail,cgpa:cgpa,clubs:clubs,branch:branch,classes:classes},function(result){
            $("#settingsresult").html(result);
            $('#settingsresult').fadeIn('fast').delay(1300).fadeOut('fast');
        });
    });
});
</script>
<script>
function _(el){
    return document.getElementById(el);
}
function uploadFile(){
    var file = _("file1").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "file_upload_parser.php");
    ajax.send(formdata);
}
function progressHandler(event){
    _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
    function load_home() {
     document.getElementById("posts").innerHTML='<object type="text/html" data="postcall.php" ></object>';
}
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
}
</script>
<!--script for ajax profile pic with progress-->
<script>
function _(el){
    return document.getElementById(el);
}
function uploadFile2(){
    var file = _("file2").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file2", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "file_upload_parser2.php");
    ajax.send(formdata);
}
function progressHandler(event){
    _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar2").value = Math.round(percent);
    _("status2").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
    _("status2").innerHTML = event.target.responseText;
    _("progressBar2").value = 0;
}
function errorHandler(event){
    _("status2").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status2").innerHTML = "Upload Aborted";
}
</script>
<!--friends list script-->
<script>
$(document).ready(function(){
  $("#friends_list").hide();
  $("#friends_list_opener").click(function(){
    $("#posts").hide();
    $(".poster").hide();
    $("#friends_list_inner").load("friends_list.php");
    $("#friends_list").fadeIn();

  });
  $("#friends_list_closer").click(function(){
    $("#posts").fadeIn();
    $("#friends_list").hide();
    $(".poster").fadeIn();
  });

});
</script>

<script>
$(document).ready(function(){
  $("#friends_list_recom").hide();
  $("#friends_list_recom_opener").click(function(){
    $("#posts").hide();
    $(".poster").hide();
    $("#friends_list_recom_inner").load("friends_list_recom.php");
    $("#friends_list_recom").fadeIn();

  });
  $("#friends_list_recom_closer").click(function(){
    $("#posts").fadeIn();
    $("#friends_list_recom").hide();
    $(".poster").fadeIn();
  });

});
</script>

<title>vsocial</title>
<link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fauna+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Work+Sans" rel="stylesheet">
<style type="text/css">
span.n
    {
        font-family: 'Raleway', sans-serif;
        font-size:25px;
    }
span.z1
{
	font-family: 'Raleway', sans-serif;
    font-size:20px;
}
span.z2
{
	font-family: 'Raleway', sans-serif;
    font-size:15px;
}
table.message {
  background-color: #f5f5f5;
  border:thin solid  #c4c4c4;
  color:grey;
  padding: 3px;
  font-family: 'Raleway', sans-serif;
  font-size:18.5px;
  width:100%;
}


.overlay{
    opacity:1;
    background-color:#E0E0E0;
    position:fixed;
    width:100%;
    height:100%;
    top:0px;
    left:0px;
    z-index:1000;
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
table.post,table.main
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
#status2,#picbar
{
    font-size:14px;
    color:green;
    font-family:'Raleway', sans-serif;
    text-align:center;
}
span.postname,span.posttime
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
.bstop
{
    background:#EFEFEF;
}
button.x:hover,button.u:hover,button.postbutton:hover,button.postimage:hover,.general:hover
{
    cursor:pointer;
    border:thin solid black;
    color:black;
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

<h1 class="text-center d-inline">&nbsp;&nbsp;vsocial <small class="top_name">{<?php
echo $name;
?>}</small></h1>


</div>
<div class="col-xs-12 col-md-2"></div>
<div class="col-xs-12 col-md-5 text-center">
<h1><div class="btn-group btn-group-md " role="group" aria-label="...">
  <a href="../search" class="btn btn-primary button_white"><span class="glyphicon glyphicon-search"></span></a>
  <a href="../messenger" class="btn btn-primary button_white"><span class="glyphicon glyphicon-comment"></span></a>
  <a href="../test/homes.php" class="btn btn-primary button_white">VAcademics </a>
  <a href="../test/learn.php" class="btn btn-primary button_white">VLearn </a>
  <!--<button type="button" class="btn btn-primary settings">Settings <span class="glyphicon glyphicon-cog"></span></button>-->
  <button class="btn btn-success settings button_white" id="settings_button"><span class="glyphicon glyphicon-cog"></span></button>
  <button class="btn btn-danger button_white" id="logout"><span class="glyphicon glyphicon-log-out"></span></button>
</div></h1>
</div>
</div>
</div>

<center>
<div id="settings">
<table class="settings" width="70%">
<tr>
<td>
<?php
$sqlsettings = "SELECT * FROM primaryinfo WHERE userid='$id'";
$sqlsettingsquery = mysqli_query($conn, $sqlsettings) or die("Error: " . mysqli_error());
$sqlsf        = mysqli_fetch_array($sqlsettingsquery);
$name         = $sqlsf['name'];
$generalemail = $sqlsf['email'];
$gender       = $sqlsf['gender'];
$age          = $sqlsf['age'];
$phoneno      = $sqlsf['phonenumber'];
$address      = $sqlsf['address'];
$facebook      = $sqlsf['Facebook'];



$sqlsettings2 = "SELECT * FROM vitdetails WHERE userid='$id'";
$sqlsettings2query = mysqli_query($conn, $sqlsettings2) or die("Error: " . mysqli_error());
$sqlsf2        = mysqli_fetch_array($sqlsettings2query);
$regno         = $sqlsf2['regno'];
$vitemail      = $sqlsf2['email'];
$cgpa          = $sqlsf2['cgpa'];
$clubschapters = $sqlsf2['clubs'];
$branch        = $sqlsf2['branch'];
$classes       = $sqlsf2['classes'];
$_SESSION['regno']=$regno;
?>
<br>
<center>
<table class="innersettings">
<tr>
<td colspan="2" class="settingsresult"><div id="settingsresult"></div>
</td>
</tr>
<tr>
<td colspan="2"><h3>Personal Info</h3><hr class="different"></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" id="setname" value="<?php
echo $name;
?>"></td>
</tr>
<tr>
<td>Personal email</td>
<td><input type="text" id="setgeneralemail" value="<?php
echo $generalemail;
?>"></td>
</tr>
<tr>
<td>Gender</td>
<td>
<?php
if ($gender == "M") {
    echo "<input type='radio' name='gender' value='M' checked='yes' id='gender'> Male<input type='radio' name='gender' value='F' id='gender'> Female";
} elseif ($gender == "F") {
    echo "<input type='radio' name='gender' value='M' id='gender'> Male<input type='radio' name='gender' value='F' checked='yes' id='gender'> Female";
} else {
    echo "<input type='radio' name='gender' value='M' id='gender'> Male<input type='radio' name='gender' value='F' id='gender'> Female";
}
?>
</td>
</tr>
<tr>
<td>Age</td>
<td><input type="text" id="setage" value="<?php
echo $age;
?>" maxlength="3"></td>
</tr>
<tr>
<td>Phone number</td>
<td><input type="text" id="setphoneno" value="<?php
echo $phoneno;
?>"></td>
</tr>
<tr>
<td>Facebook id</td>
<td><input type="text" id="setaddress" value="<?php
echo $address;
?>"></td>
</tr>
<tr>
<td>Linkedin id</td>
<td><input type="text" id="setaddress" value="<?php
echo $facebook;
?>"></td>
</tr>
<tr>
<td colspan="2"><br><center><button class="u" id="generalupdate">Update</button></center></td>
</tr>
</table>
<br>

<table class="innersettings">
<tr>
<td colspan="2"><h3>VIT Details</h3><hr class="different"></td>
</tr>
<tr>
<td>Registration Number</td>
<td><input type="text" id="setregno" value="<?php
echo $regno;
?>"></td>
</tr>
<tr>
<td>VIT email</td>
<td><input type="text" id="setvitemail" value="<?php
echo $vitemail;
?>"></td>
</tr>
<tr>
<td>CGPA</td>
<td><input type="text" id="setcgpa" value="<?php
echo $cgpa;
?>" maxlength="5"></td>
</tr>
<tr>
<td>Clubs/Chapters</td>
<td><input type="text" id="setclubschapters" value="<?php
echo $clubschapters;
?>"></td>
</tr>
<tr>
<td>Branch</td>
<td><input type="text" id="setbranch" value="<?php
echo $branch;
?>"></td>
</tr>
<tr>
<td>Classes</td>
<td><input type="text" id="setclasses" value="<?php
echo $classes;
?>"></td>
</tr>
<tr>
<td colspan="2"><br><center><button class="u" id="vitupdate">Update</button></center></td>
</tr>
</table>

</center>

</td>
</tr>
</table>
</div>
</center>

<div id="notheader">
<table class="message">
<tr valign="middle">
<td valign="middle">
<center><div class="pointer"><div class="welcome" id="1"><br>&#9993;<span style="color:red;"><sup>1</sup></span></div></div></center>
<br>
<div class="container">
<div class="welcome well" id="2" style='background:white;'>Hey <?php
echo $name;
?>, thanks for signing up! First of all, welcome to vsocial, a VIT based social network that helps you get ahead in every way possible. What you're about to see and experience for a while is vsocial in its initial stages; we have a lot more features to bring forth. Just to give you a heads up, you can edit your profile and post content, for now. Happy vsocializing!<br>
     <center><br><b><></b> with &#10084; by Suhail Haroon<br><br></center><center><button class="x">close</button></center>
</div>
</div>
</td>
</tr>
</table>
<br>
<br>


<div class="container">
<div class="row">
<div class="col-xs-12 col-md-3">

<table width="100%">
<tr>
<td><center><img src="<?php
echo $linkprofilepic;
?>" class="img-responsive img-rounded" width="50%"><br>

<div class="btn-group-vertical">
  <button type="button" class="btn btn-default changepp">Change Profile Picture</button>
  <button type="button" class="btn btn-default" id="friends_list_opener">Friends <span class="badge"><?php
echo $countlist;
?></span></button>
</div>
</center>
</td>
</tr>
</table>

</div>
<div class="col-xs-12 col-md-6">
<td width="50%" style="border-right:thin solid #EFEFEF;">
<center><div id="picbar">
<progress id="progressBar2" value="0" max="100" style="width:300px;"></progress>
<div id="status2"></div>
</div></center>
<table class="post">
<tr>
<td>
<div class="overlay"><br><br><br><br><center><h3>vsocial</h3><br><br><img src="giphy.gif" width="1%"></center></div>
<center>
<table class="poster">
<tr>
<td>
<br>
<textarea id="postcontenthandler" placeholder="Anything new today?" rows="5" cols="50"></textarea>
</td>
</tr>
<tr>
<td style="text-align:right">
<button class="postimage">Image</button>
<button class="postbutton">Post</button>
</td>
</tr>
<tr>
<td class="postresult">
<div id="postresult"></div>
</td>
</tr>
<tr>
<td class="postimage">
<div id="postimage"><form id="upload_form" enctype="multipart/form-data" method="post">
  <input class="general" type="file" name="file1" id="file1"><br>
  <input class="general" type="button" id="up11" value="Upload File" onclick="uploadFile()">
  <p id="loaded_n_total" hidden></p>
</form><br>
<center><button class="x2 general">close</button></center></div>
</td>
</tr>
</table>
<br>
<table class="posts" width="100%">
<tr>
<td>
<div id="posts"></div>
</td>
</tr>
</table>
</center>
</td></tr></table>
<table class="changepp" width="100%">
<tr>
<td class="postresult">

<div id="postpp"><form id="upload_form" enctype="multipart/form-data" method="post">
  <input class="general" type="file" name="file2" id="file2"><br>
  <input class="general" type="button" id="up11" value="Upload File" onclick="uploadFile2()">
  <p id="loaded_n_total" hidden></p>
</form><br>
<center><button class="x3 general">close</button></center></div>

</td>
</tr>
</table>

<table class="friendrequests">
<tr>
<td>
<span class="z2">
<?php
$zzql1 = "SELECT * FROM friend WHERE friendid='$id' AND status=0 ORDER BY id DESC";
$zzql2 = mysqli_query($conn, $zzql1) or die(mysqli_error($conn));
echo "<table class='newfr'><tr><td><span class='z1'>Friend Requests</span></td></tr><tr><td>";
$count3 = 0;
while ($zzql3 = mysqli_fetch_array($zzql2)) {
    $count3++;
    $ztimesent          = $zzql3['timestamp'];
    $zotheruseridsender = $zzql3['userid'];

    $zzql4 = "SELECT * FROM primaryinfo WHERE userid='$zotheruseridsender'";
    $zzql5 = mysqli_query($conn, $zzql4) or die(mysqli_error($conn));
    $zzql6 = mysqli_fetch_array($zzql5) or die(mysqli_error($conn));
    $zotherusernamesender = $zzql6['name'];

    echo "</td></tr>";
    if ($ztimesent > $timecheckedf) {
        echo "<tr><td><a href='../user?target=" . $zotheruseridsender . "'><span style='color:#b20000'>" . $zotherusernamesender . "</span></a></td></tr>";
    } else {
        echo "<tr><td><a href='../user?target=" . $zotheruseridsender . "'>" . $zotherusernamesender . "</a></td></tr>";
    }
}

if ($count3 == 0) {
    echo "<tr><td>You have no new friend requests.</td></tr>";
}
echo "</table>";
echo "<br><button class='general frclose'>Close</button>";
?>
</span>
</td>
</tr>
</table>
<br>

<span class="z2">
<table class="friendacceptance">
<tr>
<td><span class="z1">Friend Acceptances</span>
</td>
</tr>
<?php
$bsql = "SELECT * FROM notification_checked_on WHERE userid='$id' AND type='a' ORDER BY id DESC LIMIT 1";
$bsqlquery = mysqli_query($conn, $bsql) or die(mysqli_error($conn));
$bsqlfetch = mysqli_fetch_array($bsqlquery) or die(mysqli_error($conn));
$timecheckeda = $bsqlfetch['timestamp'];

$xsql = "SELECT * FROM friend WHERE userid='$id' AND status=1 ORDER BY id DESC";
$xsqlquery = mysqli_query($conn, $xsql) or die(mysqli_error($conn));
$countz  = 0;
$countz1 = 0;
while ($xsqlfetch = mysqli_fetch_array($xsqlquery)) {
    $timea        = $xsqlfetch['timestamp'];
    $acceptuserid = $xsqlfetch['friendid'];
    $vsql         = "SELECT name FROM primaryinfo WHERE userid='$acceptuserid'";
    $vsqlquery = mysqli_query($conn, $vsql) or die(mysqli_error($conn));
    $vsqlfetch      = mysqli_fetch_array($vsqlquery);
    $acceptusername = $vsqlfetch['name'];
    if ($timecheckeda < $timea) {
        $countz++;
        echo "<tr><td><a href='../user?target=" . $acceptuserid . "'><span style='color:#b20000'>" . $acceptusername . "</span></a></td></tr>";
    } else {
        $countz1++;
        echo "<tr><td><a href='../user?target=" . $acceptuserid . "'>" . $acceptusername . "</a></td></tr>";
    }
}
if ($countz1 + $countz == 0) {
    echo "<tr><td>Add more friends.</td></tr>";
}
?>
<tr>
<td>
<button class="general x4">Close</button>
</td>
</tr>
</table>

</td>
<div id="friends_list">Friends List (output from friends_list.php)<br><span id="friends_list_inner"></span><br> <button class="general" id="friends_list_closer">Close</button></div>

<div id="friends_list_recom">Recommended Friends<br><span id="friends_list_recom_inner"></span><br> <button class="general" id="friends_list_recom_closer">Close</button></div>
</div>

<div class="col-xs-12 col-md-3 text-center">

<div class="btn-group-vertical">
  <button type="button" class="btn btn-default fr">Friend Requests</button>
<button type="button" class="btn btn-default fa">
<?php
if($countz>0)
{
echo "Friend Acceptances <span class='badge' style='background:darkred'>".$countz;
}
else
{
echo "Friend Acceptances <span class='badge' style='background:grey'>".$countz1;
}
?></span></button>
<button type="button" class="btn btn-default" id="friends_list_recom_opener">Recommended Friends</button>
</div>


<td width="25%" valign="top">


<script type="text/javascript">
$(document).ready(function(){
    $.post("notifcheck.php", {type:'z'}, function(result){
            $("button.fr").html(result);
        });
});
</script>

</td>
</div>

</div>
</div>

</div>
</body>
</html>
