<?php
session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);

$id = $_GET['question'];
echo $id;

$frez="UPDATE `$tbl_name` SET `freeze` = 1 WHERE `q_id` = $id ";

$fr=$db->query($frez);

header("location:index.php");


?>