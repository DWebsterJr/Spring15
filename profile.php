<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$id=$_GET['id'];
$sql="SELECT * FROM `$tbl_name` WHERE `u_id` = $id";
$result=$db->query($sql) ;

$sqlname = "SELECT * FROM `$tbl_name2` WHERE `id` = $id";
$rname=$db->query($sqlname);
$roname=mysqli_fetch_array($rname);




$login = $_SESSION['username'];

if(isset($_POST['submit'])){
	move_uploaded_file(($_FILES['file']['tmp_name']), "Pictures/".$_FILES['file']['name']);
	$nq = "UPDATE `$tbl_name2` SET picture = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'";

	$ress=$db->query($nq);
        }


?>

<!DOCTYPE html>
<head>
<title> Ask 4Gamers: an Ask site for gamers</title>
</head>
<html>
<h1> A4G: Profile </h1><a href=index.php>Main page</a>
<BR>

<?php
	$uname = $_SESSION['username'];

	$sql1="SELECT id FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

	$result=$db->query($sql);

	$results=$db->query($sql1);

	$row=mysqli_fetch_array($results);

	$sqlpic ="SELECT picture FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	//echo $sqlpic;

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] == "" ){
		echo "<img width='20' height = '20' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='20' height='20' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
	}
?>  
<td> <strong>Welcome, </strong> <a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> ! 




(<a href="index.php?action=logout">log out</a>)</td>
<td> <h2><?php echo $roname['username']; ?> </h2>
<?php
$q = "SELECT * FROM `$tbl_name2` where `id` = $id ";

$res = $db->query($q);
while($r = mysqli_fetch_array($res)){
	if($r['picture'] == "" ){
		echo "<img width='100' height = '100' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='100' height='100' src='Pictures/".$r['picture']."' alt=Profile Pic'>";
	}
}
echo "<br>";
?>
<?php

if( $roname['username'] == $_SESSION['username']){
?>

<form action = "" method="post" enctype="multipart/form-data">
	<input type = "file" name="file">
	<input type="submit" name="submit">
	<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create.php"><strong>Create New Topic</strong> </a></td>
</form>

<?php

}
?>






	

<?php



?>



<h3>Questions</h3>


<table width="90%" border="0" align="center" cellpadding="3" cellspacing"1" bgcolor="#CCCCCC">
	<tr>
		<td width-"13%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="50%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
	</tr>
	<?php
	while($rows=mysqli_fetch_array($result)){
		?>

		<tr>
			<td bgcolor="#FFFFFF"><?php echo $rows['q_id']; ?></td>
			<td bgcolor="#FFFFFF"><a href="view.php?id=<?php echo $rows['q_id']; ?> "><?php echo $rows['topic']; ?></a><BR></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
		</tr>
		<?php
	}
?>







</html>