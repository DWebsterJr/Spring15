<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";

$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];


$id = $_GET['id'];
$valid = 1;

$sql="UPDATE`$tbl_name2` SET `validate` = $valid WHERE `id` = $id";

$results=$db->query($sql);

if($results){
	echo "Successful, you verify your account";
	echo "<a href=index.php>return to main page</a>";
}


?>