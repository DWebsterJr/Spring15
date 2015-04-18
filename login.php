<?php

$clientId="725e08a43209c83e9833";
$clientSecrect ="";


?>

<!DOCTYPE html>
<html>
<head>
<title> Ask 4Gamers: an Ask site for gamers</title>
<meta charset="UTF-8">
<script>
document.getElementById('gitAuthButton').addEventListener("click",signinWIthGithub );
	function signinWIthGithub(){
		window.location.href = "https://github.com/login/oauth/authorize?client_id=<?=$clientId ?>&scope=user";
	}


</script>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<h1>Welcome to Ask 4Gamers: an Ask site for gamers </h1>
<body>
<div class="login">
<div class="olduser">


<form name="form1" method="post" action="checklogin.php" accept-charset="UTF-8">


	<header> Are you already a user? Login here</header>


<strong>Username</strong>
:
<input name="username" type="text" id="username">


<strong>Password</strong>
:
<input name="password" type="password" id="password">

&nbsp; &nbsp;
<input type="submit" name="Submit" value="Login">
</form>
</tr>

</div>

<div class="newuser">

<form name="form1" method="post" action="signup.php" accept-charset="UTF-8">


<header> Are you new here? Register here</header>


<strong>Username</strong>
:
<input name="newuser" type="text" id="newuser">

<strong>E-mail</strong>
:
<input name="email" type="text" id="email">

<strong>Password</strong>
:
<input name="newpass" type="password" id="newpass">


<strong> Confirm Password</strong>
:
<input name="confirm" type="password" id="confirm">
&nbsp;
&nbsp;
<input type="submit" name="Submit" value="Submit">

</form>
</div>

<div class="olduser">

	<button id="gitAuthButton">Sign in with Github</button>

	</div>



</div>



</body>



	
	</html>


	