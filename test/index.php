<!doctype html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>VADMIN</title>
<style type="text/css">
.true,.false
{
font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
font-size:18px;
}
.true
{
color:green;
}
.false
{
color:red;
}
body
{
    background-color:rgb(1,102,102);
}
span.logo
{
    font-size:100px;
    font-family:'Montserrat Alternates', sans-serif;
}
span.tagline
{
    font-family: 'Raleway', sans-serif;
    font-size:25px;
}
table.header
{
    width:100%;
    border-spacing:0px;
    border-collapse:collapse;
text-align:center;
}

input
{
font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
font-size:18px;
border: thin solid rgb(1,102,102);
text-align:center;
}
.tableEdge,.formEdge
{
  width: 100%;
  text-align: center;
}
.formEdge
{
  background-color:#f5f5f5;
}
</style>

</head>
<body>
<script>

function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
function checklogin(){
	var name=/^[a-zA-Z\s]+$/;
	var mes="";
	var r=document.getElementById("reg_no1").value;
	if(!name.test(r))
		{
		mes = "Invalid Username";
		document.getElementById("err").innerHTML=mes;
		}
		}
		</script> 
<table class="tableEdge">
<tr><td width="15%"></td>
  <td width="70%">

    <table class="header">
    <tr>
    <td><span class="logo">Vsocial Admin</span></td>
    </tr>
    <tr>
    <td><span class="tagline">SIGNUP AND LOGIN</span></td>
    </tr>
    </table>

<br><br>

<table class="formEdge">
  <tr>   

<td>

      <h3>Teacher Registration</h3>
      <form name="registerteacher" action="signupteacher.php" method="post">
      <input type="text" placeholder="Userame" id="uname1" name="uname1"><br>
      <input type="text" placeholder="Full Name" id="tname" name="tname"><br>
      <input type="password" placeholder="Password" id="password" name="password"><br>	
      <input type="submit">
      <span id="result"></span>
      </form>

    </td>

<td>	  <h3>Teacher Login</h3>
      <form name="signinteacher" action="signinteacher.php" method="post">
      <input type="text" placeholder="Username" id="uname" name="uname"><br>
      <input type="password" placeholder="Password" id="password1" name="password1"><br>
      <input type="submit" value="login">
      <span id="result"></span>
      </form>

    </td>
        
<td>

      <h3>Admin Login</h3>
      <form name="signinstudent" action="signinadmin.php" method="post">
      <input type="text" placeholder="Username" id="reg_no1" onkeyup="checklogin(this.value)" name="reg_no1"><br>
	  <input type="password" placeholder="Password" id="password3" onkeyup="passwordStrength(this.value)" name="password3"><br>
      <input type="submit" value="login">
</p>
      <span id="result"></span>
      </form>
	<span id="err" style="display:none">Enter a valid Name</span>
	<label for="passwordStrength">Password strength</label>
	<div id="passwordDescription"></div>
    </td>
  </tr>
</table>

  </td>
  <td width="15%"></td>
</tr>
</table>



</body>
</html>
