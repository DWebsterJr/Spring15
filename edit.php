<?php


session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$id=$_GET['id'];
$sql="SELECT * FROM `$tbl_name` WHERE `q_id` = $id";
$result=$db->query($sql) ;
$rows=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="script.js"></script>

<title>Ask 4Gamers: an Ask site for gamers</title>

</head>

<h1> A4G- Edit: <?php echo $rows['topic'] ?> </h1>

<body>

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
		echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='50' height='50' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
	}
?>  
<div class = "user">
	<td> <strong>Welcome, </strong>
		<?php

$sqladmin= "SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

$adres=$db->query($sqladmin);
$adrow=mysqli_fetch_array($adres);

if($adrow['admin'] == 1){
	
	?>
<div class="admin"><td>Admin</td></div>
	<?php
					}

		$scr=$adrow['score'];
	?>
	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> !  <div class = "score"><td>Score:<?php echo $scr; ?></td> </div>

	(<a href="index.php?action=logout">log out</a>)</td>

</div>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="index.php"><strong>Back to Main Page</strong> </a></td>
</tr>

<div class="table">

	<form name="editquestion" method="post" action="editq.php" accept-charset="UTF-8">
	<tr>
		<td>Topic:</td>
		<td><input size="50" name="topic" type="text" id="topic" value="<?php echo $rows['topic']; ?>" /></td>
	</tr>
	<br>
	<tr>
		<td>Detail:</td>
		<td><textarea name="detail" cols="50" rows="3" id="detail" ><?php echo $rows['detail']; ?></textarea></td>
	</tr>
	<tr>
		<td>#:</td>
		<td><input name="number" type="text" id="number" value="<?php echo $rows['q_id']; ?>" /></td>
	</tr>
	<br>

	<td><input type="submit" name="Submit" value="Submit"></td>
	</form>
</div>

<?php 
$ans="SELECT * FROM `$tbl_name3` WHERE `question_id` = $id";
$aresult=$db->query($ans);

while ($rowa=mysqli_fetch_array($aresult)) {
	# code...
	?>
	<div class="table">
		<form name="editanswer" method="post" action="edita.php" accept-charset="UTF-8">
		<tr>
		<td>Answer</td>
		<td><textarea name="answer" cols="50" rows="3" id="answer"><?php echo $rowa['a_answer']; ?></textarea></td>
		</tr>
		<tr>	
			<td>#:</td>
			<td><input name="num" type="text" id="num" value=" <?php echo $rowa['a_id']; ?>" /></td>
		</tr>
		<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
		<td><input type="submit" name="submit" id="submit" value="Delete" /></td>
		
	</form>
	</div>
	<?php
}

?>

</body>

</html>

