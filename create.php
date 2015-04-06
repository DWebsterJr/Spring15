<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$uname = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ask 4Gamers: an Ask site for gamers</title>
<meta charset="UTF-8">
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>A4G: Create a Topic </h1>
	<?php
	$uname = $_SESSION['username'];

	$sql1="SELECT id FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";


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
	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> <td>Score:<?php echo $scr; ?></td>

	(<a href="index.php?action=logout">log out</a>)</td>

</div>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="index.php"><strong>Back to Main Page</strong> </a></td>
</tr>


		

<div class="table">
	<form id="form1" name="form1" method="post" action="add.php">
		<td>
			<div class="table">
				
				<tr>
					<td width="14%"><strong>Topic</strog></td>
					<td width="2%">:</td>
					<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
				</tr>
				<tr>
					<td valign="top"><strong>Detail</strong></td>
					<td valign="top">:</td>
					<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<tr>
					<td valign="top"><strong>Tags</strong></td>
					<td valign="top">:</td>
				<td><input name="tags" type="text" maxlength="50" id="tag" /></td>

				</tr>
				<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
</tr>
</div>
</td>
</form>
</tr>
</div>



</html>