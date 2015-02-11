<?php

$host="localhost";
$user="admin";
$pw="5pR1nG20lS";
$db_name="stack";
$tbl_name="question";
$tbl_name2="user";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());


//$id=$_GET['id'];

$username = $_POST['username'];
$topic=$_POST['topic'];
$detail=$_POST['detail'];

$datetime=date("d/m/y h:i:s");

//$sql = "SELECT * FROM ".$tbl_name." WHERE `username` = '".$username."' AND `password` = '".$password."'";

$sql1="SELECT id FROM tbl_name2 WHERE `username` = '".$username."";

$result1=$db->query($sql1);





$sql="INSERT INTO `$tbl_name` (`topic`,`detail`, `datetime`)VALUES('$topic', '$detail', '$datetime')";
$result=$db->query($sql);

if($result){
	echo"Successful<BR>";
	echo "<a href=index.php>View your topic</a>";
}
else{
	echo "ERROR";
}

?>