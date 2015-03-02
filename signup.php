<?php
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);

$newname = $_POST['newuser'];
$newpassword= $_POST['newpass'];
$confirmpassword=$_POST['confirm'];




$sql = "SELECT * FROM `$tbl_name2` WHERE `username` = '".$newname."'";

//echo $sql;
$result= $db->query($sql);

$count = $db->affected_rows;
if($count == 1){

	echo " This username has already been used";
	echo "<a href=login.php>return to login page</a>";
}

else if($newpassword != $confirmpassword)
{
	echo "Make sure the password you input is correct in both places.";
	echo "<a href=login.php>return to login page</a>";
}

else
{
	$sql1="INSERT INTO `$tbl_name2` (`username`,`password`)VALUES('$newname', '$newpassword')";
$result1=$db->query($sql1);

if($result1){
	echo "Successful";
	session_start();

	$_SESSION['username'] = $newname;
	$sql2="SELECT id FROM `$tbl_name` WHERE `username` = '".$newname. "'";

	//echo $sql1;
	$result2=$db->query($sql2);
	$row=mysqli_fetch_array($result2);
	$id = $row['id'];
	//echo $id;
	$_SESSION['id'] = $id;
	$_SESSION['loggedIn'] = True;

	header("location:index.php");
}


}


?>