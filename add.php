<?php
session_start();


include_once "creds.php";

$tbl_name="question";
$tbl_name2="user";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());


//$id=$_GET['id'];


$topic=$_POST['topic'];
$topic = addslashes($topic);

$detail=$_POST['detail'];
$detail = addslashes($detail);



$datetime=date("d/m/y h:i:s");

$username = $_SESSION['username'];
//$sql = "SELECT * FROM ".$tbl_name." WHERE `username` = '".$username."' AND `password` = '".$password."'";

$sql1="SELECT id FROM `$tbl_name2` WHERE `username` = '".$username."'";

//echo $sql1;

$result1=$db->query($sql1);

$row = mysqli_fetch_array($result1);

$userid= $row['id'];

$_SESSION['id'] = $userid;





$sql="INSERT INTO `$tbl_name` (`u_id`,`topic`,`detail`, `datetime`)VALUES('$userid', '$topic', '$detail', '$datetime')";
$result=$db->query($sql);

if($result){
	echo"Successful<BR>";

	$sql2="SELECT * FROM `$tbl_name` WHERE `u_id` = $userid ";
	$res=$db->query($sql2);
	$rows=mysqli_fetch_array($res);

	header("location:index.php");
	

 

}
else{
	echo "ERROR";
}

?>

