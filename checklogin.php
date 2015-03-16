<?php


include_once "creds.php";

$tbl_name2="user";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//mysql_senew lect_db("$db_name") or die (mysql_error());

$username=$_POST['username'];
$password=$_POST['password'];


$username = addslashes($username);
$password = addslashes($password);
/*
$username = stripslashes($username);
$password = stripslashes($password);
$username= mysql_real_escape_string($username);
$password= mysql_real_escape_string($password);
*/

$sql = "SELECT * FROM `$tbl_name2` WHERE `username` = '".$username."' AND `password` = '".$password."'";
//$sql = "SELECT * FROM $tbl_name WHERE `username`=". $username ." and `password` = ".$password;
//echo $sql;

$result= $db->query($sql);

if(!$result){

	echo "Problem";
}


#$row = $result->fetch_array();
$count = $db->affected_rows;

if($count == 1){ 

	session_start();

	$_SESSION['username'] = $username;
	$sql1="SELECT id FROM `$tbl_name` WHERE `username` = '".$username. "'";

	//echo $sql1;
	$result2=$db->query($sql1);
	$row=mysqli_fetch_array($result2);
	$id = $row['id'];
	//echo $id;
	$_SESSION['id'] = $id;
	$_SESSION['loggedIn'] = True;

	header("location:index.php");
	die();



/* //$_COOKIE["username"]= $username;
	//$_COOKIE["password"] = $password;
	//setcookie($username, $password);
	header("location:success.php");*/?>
	
<!DOCTYPE html>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
</head>

<body>
<tr>
<td>&nbsp;</td>
<form name="form1" method="post" action="index.php" accept-charset="UTF-8">
<td><input name="username" type="hidden" value="<?php echo $username; ?>"></td>
<td><input type="submit" name="Submit" value="Back to the main page"></td>
</form></tr>

</body>
</html>
<?php
}
else{
	echo "Wrong Username or Password";

	header("location:login.php");

}

die();

?>



