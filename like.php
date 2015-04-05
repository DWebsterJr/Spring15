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

$vote = $_GET['like'];
$q =$_GET['id'];

$likes = 1;

$z = 0;

//echo "Question id: $q";
//echo", ";
//echo "Answer ID:$vote";

$sreset = "UPDATE `$tbl_name3` SET `like` = $z WHERE `question_id` = $q";

//echo $sreset;

$reset =$db->query($sreset);




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
