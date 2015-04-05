
<?php
//SELECT * FROM `question` INNER JOIN `user` on question.u_id = user.id 

session_start();
include_once "creds.php";
$tbl_name="question";
$tbl_name2="user";
$tbl_name5="tags";
$tbl_name6="questag";
$uname = $_SESSION['username'];
$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());

$sql = "SELECT * FROM `$tbl_name2` ORDER BY id";
$result=$db->query($sql);
?>



<!DOCTYPE html>
<html>
<head>
	<title> Ask 4Gamers: an Ask site for gamers</title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta content="utf-8" http-equiv="encoding">
<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>


	<h1> Ask 4Gamers: an Ask site for gamers</h1>

	<div class = "search">
	<form  role="form" method="post" >
		<input type="text" class="form-control" id="keyword" placeholder="Enter a username"/>
	</form>
	<ul id="content"></ul>

	</div>
<div class = "user">
	<td> <strong>Welcome, </strong>
<?php

$sqladmin= "SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

$adres=$db->query($sqladmin);
$adrow=mysqli_fetch_array($adres);

if($adrow['admin'] == 1){
	$_SESSION['admin'] = $adrow['admin'];
	?>
<div class="admin"><td>Admin</td></div>
	<?php
					}
	else if($adrow['admin'] == 0){
		$_SESSION['admin'] = 0;
	}
$scr= $adrow['score'];
	?>

	<a href="profile.php?id=<?php echo $adrow['id']; ?>" ><?=$_SESSION['username']?> </a> ! 
	<div class = "score"><td>Score:<?php echo $scr; ?></td> </div>
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

</div>
	
<div class = "table">
<div class = "create">
<form>
<tr>
<td><input name="username" type="hidden" value="<?php echo $username; ?>"></td>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create.php"><strong>Create New Topic</strong> </a></td>
</tr>
</form>
<?php 
if($_SESSION['admin']==1){
	?>

<td><a href="user.php"><strong>List of users</strong></a></td>

<?php
}
?>
</div>
<div class = "heading">
	<tr>
	<div class=  "usercell" ><td><strong>User</strong></td></div>
	<div class = "usercell" ><td><strong># of Questions</strong></td></div>
	<div class = "usercell" ><td><strong>Score</strong></td></div>
	</tr>
</div>

<?php 
	while ($rows=mysqli_fetch_array($result)) {


		# code...

		?>
		<tr>
			<div class="userrows">
				<div class="usercell"><td><a href="profile.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['username']; ?></a></td></div>
				<div class="usercell"><td><?php echo $rows['q']; ?></td></div>
				<div class="usercell"><td><?php echo $rows['score']; ?></td></div>
			</div>
		</tr>
		<?php
	}

?>


</body>

</html>