<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];
$answer=$_POST['answer'];

$answer=addslashes($answer);
echo $answer;


$num = $_POST['num'];
echo $num;

if($_POST['submit'] == 'Submit')
{
	echo "Submit";
	$updatea=" UPDATE `$tbl_name3` SET `a_answer` = '$answer' WHERE `a_id` = $num ";

	echo $updatea;

	$asql=$db->query($updatea);

}

else if($_POST['submit'] == 'Delete'){

	echo "Delete";
	$deletea="DELETE FROM `$tbl_name3` WHERE `a_id` = $num";
	echo $deletea;
	$dasql=$db->query($deletea);

}


header("location:index.php");

?>