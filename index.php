<?php
//SELECT * FROM `question` INNER JOIN `user` on question.u_id = user.id 

session_start();
include_once "creds.php";
$tbl_name="question";
$tbl_name2="user";

error_reporting(0);
if($_GET['action'] && $_GET['action'] == "logout"){
	unset($_SESSION['loggedIn']);
	unset($_SESSION['username']);
	unset($_SESSION['id']);
}
if (!$_SESSION['loggedIn']){


	header("location: login.php");
	die();
}


 $uname = $_SESSION['username'];
$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());






$sql="SELECT * FROM  `$tbl_name` ORDER BY value DESC LIMIT 5";



$sql1="SELECT id FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

$result=$db->query($sql);

$results=$db->query($sql1);

$row=mysqli_fetch_array($results);


?>

<!DOCTYPE html>
<html>
<head>
	<title> Ask 4Gamers: an Ask site for gamers</title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


	<h1> Ask 4Gamers: an Ask site for gamers</h1>
	<td> <strong>Welcome, </strong>
	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> !  
<?php

	$sqlpic ="SELECT picture FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] == "" ){
		echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='50' height='50' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
	}
?>  

	(<a href="index.php?action=logout">log out</a>)</td>
	

<table width="90%" border="0" align="center" cellpadding="3" cellspacing"1" bgcolor="#CCCCCC">
	<tr>
		<td width-"13%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
		<td width="50%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
		<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
		<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Vote</strong></td>
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
			<td align="center" bgcolor="#FFFFFF"><?php echo $rows['value']; ?> </td>
		</tr>
		<?php
	}
?>
<form>
<tr>
<td><input name="username" type="hidden" value="<?php echo $username; ?>"></td>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create.php"><strong>Create New Topic</strong> </a></td>
</tr>
</form
</table>

</body>




</html>

