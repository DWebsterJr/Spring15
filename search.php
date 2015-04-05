<?php
session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";

$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$arr = array();
if(!empty($_POST['keywords'])) {

	$keywords=$_POST['keywords'];

	$sql="SELECT id, username FROM `$tbl_name2` WHERE `username` LIKE '%".$keywords. "%'";
	$result=$db->query($sql);
	$count = $db->affected_rows;
	if($count > 0){
		while($row= mysqli_fetch_array($result) ){
			$arr[] = array('id' =>$row['id'], 'title' =>$row['username']);
		}
	}
}
echo json_encode($arr);
?>