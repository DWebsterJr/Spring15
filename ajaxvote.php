<?php


session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];


if(isset($_POST['postid']) AND isset($_POST['action'])){
	$postId = $_POST['postid'];
	//echo $postId;

	#check if already voted, if found voted then return
	if(isset($_SESSION['vote'][$postId])) return;

$vsql="SELECT vote FROM `$tbl_name3` WHERE `a_id` = $postId ";

echo $vsql;
$vresult=$db->query($vsql);

$vrow = mysql_fetch_array($vresult);

$vote = $vrow['vote'];

	if($_POST['action'] == 'up'){
		$vote = $vote +1;

	}


$sqlupdate = "UPDATE `$tbl_name3` SET `vote` = $vote WHERE `a_id` = $postId ";
	//echo $sqlupdate;

	$updateres = $db->query($sqlupdate);

	$_SESSION['vote'][$postId] = true;
	

	






?>