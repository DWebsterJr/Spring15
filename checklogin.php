<?php


$host="localhost";
$user="admin";
$pw="5pR1nG20lS";
$db_name="stack";
$tbl_name="user";

$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//mysql_senew lect_db("$db_name") or die (mysql_error());

$username=$_POST['username'];
$password=$_POST['password'];
/*
$username = stripslashes($username);
$password = stripslashes($password);
$username= mysql_real_escape_string($username);
$password= mysql_real_escape_string($password);
*/

$sql = "SELECT * FROM ".$tbl_name." WHERE `username` = '".$username."' AND `password` = '".$password."'";
//$sql = "SELECT * FROM $tbl_name WHERE `username`=". $username ." and `password` = ".$password;
echo $sql;

$result= $db->query($sql);

if(!$result){

	echo "Problem";
}


#$row = $result->fetch_array();
$count = $db->affected_rows;

if($count == 1){
	//$_COOKIE["username"]= $username;
	//$_COOKIE["password"] = $password;
	//setcookie($username, $password);
	header("location:success.php");
}
else{
	echo "Wrong Username or Password";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
</head>

</html>