<?php
session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);

//echo $_POST['like'];
//echo $_POST['id'];
/// like = a_id

$vote = $_POST['like'];
$q =$_POST['id'];

$likes = 1;

$slike= "UPDATE `$tbl_name3` SET `like` = $likes WHERE `a_id` = $vote ";
$results=$db->query($slike);


if($results)
{
	header("location:index.php");
}

else
{
	echo "ERROR";
	echo " ";
	echo $slike;
}

?>
