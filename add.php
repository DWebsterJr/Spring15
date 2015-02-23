<?php
session_start();


include_once "creds.php";

$tbl_name="question";
$tbl_name2="user";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());


//$id=$_GET['id'];


$topic=$_POST['topic'];
$topic = addslashes($topic);

$detail=$_POST['detail'];
$detail = addslashes($detail);



$datetime=date("d/m/y h:i:s");

//$sql = "SELECT * FROM ".$tbl_name." WHERE `username` = '".$username."' AND `password` = '".$password."'";

$sql1="SELECT id FROM tbl_name2 WHERE `username` = '".$username."";

$result1=$db->query($sql1);


$userid=$_SESSION['id'];




$sql="INSERT INTO `$tbl_name` (`u_id`,`topic`,`detail`, `datetime`)VALUES('$userid', '$topic', '$detail', '$datetime')";
$result=$db->query($sql);

if($result){
	echo"Successful<BR>";
	echo "<a href=index.php>View your topic</a>";
}
else{
	echo "ERROR";
}

?>