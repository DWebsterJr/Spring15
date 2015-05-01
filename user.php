
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
<meta charset="UTF-8">
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

	<a href="profile.php?id=<?php echo $adrow['id']; ?>" ><?=$_SESSION['username']?> </a> 
	Score:<?php echo $scr; ?>
<?php

	$sqlpic ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] == "" ){
		echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";

	}

	else if($rpic['gitpic'] != ""){
		?>
		 <img width='50' height='50' src="<?php echo $rpic['gitpic']; ?>" alt="Avatar">
		 <?php
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
<input name="username" type="hidden" value="<?php echo $username; ?>">
<a href="create.php"><strong>Create New Topic</strong> </a>

</form>
<?php 
if($_SESSION['admin']==1){
	?>
<a href="user.php"><strong>List of users</strong></a>

<?php
}
?>
</div>
<div class = "heading">

	<div class=  "usercell" ><strong>User</strong></div>
	<div class = "usercell" ><strong># of Questions</strong></div>
	<div class = "usercell" ><strong>Score</strong></div>

</div>

<?php 
	while ($rows=mysqli_fetch_array($result)) {


		# code...

		?>
	
			<div class="userrows">
				<div class="usercell"><a href="profile.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['username']; ?></a></div>
				<div class="usercell"><?php echo $rows['q']; ?></div>
				<div class="usercell"><?php echo $rows['score']; ?></div>
			</div>
	
		<?php
	}

?>


</body>

</html>