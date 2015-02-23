<?php
session_start();


include_once "creds.php";
$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());

$id=$_POST['id'];

$sql="SELECT reply FROM `$tbl_name` WHERE `q_id`=$id";
$result= $db->query($sql);
$rows=mysqli_fetch_array($result);

$reply=$rows['reply'];
//echo $reply;
/*
$sql1="SELECT * FROM `$tbl_name3` WHERE `question_id` =$id";
$result1=$db->query($sql1);
$rows=mysqli_fetch_array($result1);
*/




$a_answer=$_POST['a_answer'];

$a_answer=addslashes($a_answer);



$datetime=date("d/m/y H:i:s"); // create date and time 



$u_id = $_SESSION['id'];

//echo $uid;


$sql2="INSERT INTO `$tbl_name3`(`user_id`,`question_id`, `a_answer`, `a_datetime`)VALUES('$u_id', '$id', '$a_answer', '$datetime')";

//echo $sql2;

$result2=$db->query($sql2);

//echo $result2;



if($result2){

echo "Successful<BR>";

echo "<a href='view.php?id=".$id."'>View your answer</a>";





$reply = $reply +1;

$sql3="UPDATE `$tbl_name` SET `reply`= $reply WHERE `q_id`= $id";

$result3=$db->query($sql3);



}

else {

echo "ERROR";

}
?>