<?php


session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";
$tbl_name4="voting";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];


if(isset($_POST['postid']) AND isset($_POST['action'])){
	$postId = $_POST['postid'];
	//echo $postId;

	#check if already voted, if found voted then return
	$userid = $_POST['user'];


	$next = "SELECT * FROM `$tbl_name4` WHERE `user` = $userid";
	


	$nx = $db->query($next);

	if(isset($_SESSION['vote'][$postId]) ) return;
	if($nx[$postId] == 1) return;

$vsql="SELECT vote FROM `$tbl_name3` WHERE `a_id` = $postId ";

echo $vsql;
$vresult=$db->query($vsql);

$vrow = mysqli_fetch_array($vresult);

$vote = $vrow['vote'];

	if($_POST['action'] === 'up'){
		$vote = $vote+1;

	}
	else if ($_POST['action'] === 'down'){
		$vote = $vote-1;
	}


$sqlupdate = "UPDATE `$tbl_name3` SET `vote` = $vote WHERE `a_id` = $postId ";
	//echo $sqlupdate;

	$updateres = $db->query($sqlupdate);

	$_SESSION['vote'][$postId] = true;

	$u = $_POST['user'];

$sqlv ="UPDATE `$tbl_name4` SET `$postId` = 1 WHERE `user` = $u";
echo $sqlv;

$vot = $db->query($sqlv);




}

	?>