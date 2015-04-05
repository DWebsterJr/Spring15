<?php
session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";
$tbl_name4="voting";
$tbl_name5="tags";
$tbl_name6="questag";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$id = $_GET['id'];
echo $id;

$sql_delete_question= " DELETE  FROM `$tbl_name` WHERE `q_id` = $id";
echo $sql_delete_question;
$result_qd=$db->query($sql_delete_question);

$sql_delete_answer="DELETE FROM `$tbl_name3` WHERE `question_id` = $id";
echo $sql_delete_answer;
$result_da=$db->query($sql_delete_answer);

$sql_delete_questag = "DELETE FROM `$tbl_name6` WHERE `question` = $id";
echo $sql_delete_questag;
$result_dqt=$db->query($sql_delete_questag);

header("location:index.php");

?>