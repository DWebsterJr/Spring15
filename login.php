<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<link rel="stylesheet" type="text/css" href="style.css">
<title> Ask 4Gamers: an Ask site for gamers</title>
</head>
<h1>Welcome to Ask 4Gamers: an Ask site for gamers </h1>
<body>
<div class="login">
<div class="olduser">

<tr>
<form name="form1" method="post" action="checklogin.php" accept-charset="UTF-8">
<td>
<tr>
	<header> Are you already a user? Login here</header>

</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</td>
</form>
</tr>

</div>

<div class="newuser">
<tr>
<form name="form1" method="post" action="signup.php" accept-charset="UTF-8">
<td>
<tr>
<header> Are you new here? Register here</header>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="newuser" type="text" id="newuser"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="newpass" type="password" id="newpass"></td>
</tr>
<tr>
<td> Confirm Password</td>
<td>:</td>
<td><input name="confirm" type="password" id="confirm"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</td>
</form>
</tr>




</div>

</div>



</body>



	
	</html>


	