<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";




$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];


$topic = $_POST['topic'];
$topic = addslashes($topic);
$detail = $_POST['detail'];
$detail = addslashes($detail);

$id= $_POST['number'];

echo "$topic \n$detail \n$id";

$updateq=" UPDATE `$tbl_name` SET `topic` = '$topic', `detail` = '$detail' WHERE `q_id` = $id ";

echo $updateq;

$qsql=$db->query($updateq);

header("location:index.php");



//$slike= "UPDATE `$tbl_name3` SET `like` = $likes WHERE `a_id` = $vote ";
?>
