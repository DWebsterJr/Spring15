<?php
session_start();


include_once "creds.php";

$tbl_name="question";
$tbl_name2="user";
$tbl_name5="tags";
$tbl_name6="questag";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());


//$id=$_GET['id'];


$topic=$_POST['topic'];
$topic = addslashes($topic);

$detail=$_POST['detail'];
$detail = addslashes($detail);


$tags=str_word_count($_POST['tags'], 1);
/*
foreach ($tags as $key => $value) {
	echo "Key: $key; Value: $value<br />\n";
}
*/


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

$id = "SELECT q_id FROM `$tbl_name` WHERE `topic` = '".$topic."'";

//echo $id;

$resi =$db->query($id);
$rowi = mysqli_fetch_array($resi);
//echo $rowi['q_id'];

$ques = $rowi['q_id'];



foreach ($tags as $key => $value) {
	$sqlsearch="SELECT * FROM `$tbl_name5` WHERE `tag` = '".$value."' ";
	//echo $sqlsearch;
	$search = $db->query($sqlsearch);
	$count = $db->affected_rows;

	if($count == 1)
	{
		$taggings="SELECT t_id FROM `$tbl_name5` WHERE `tag` = '".$value."' ";
		$tagrs= $db->query($taggings);
		$rowts=mysqli_fetch_array($tagrs);
		$tids=$rowts['t_id'];

		$sqts="INSERT INTO `$tbl_name6` (`question`, `tag`)VALUES('$ques', '$tids')";
		$qts=$db->query($sqts);

	}

	else{
		echo "Not in the table";
		$sqlt="INSERT INTO `$tbl_name5` (`tag`)VALUES('$value')";
		//echo $sqlt;
		$tagres=$db->query($sqlt);

		$tagging="SELECT t_id FROM `$tbl_name5` WHERE `tag` = '".$value."' ";
		$tagr= $db->query($tagging);
		$rowt=mysqli_fetch_array($tagr);
		$tid=$rowt['t_id'];

		$sqt="INSERT INTO `$tbl_name6` (`question`, `tag`)VALUES('$ques', '$tid')";
		echo $sqt;
		$qt=$db->query($sqt);
	}
}


header("location:index.php");

/*
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

*/
?>

