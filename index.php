<?php
//SELECT * FROM `question` INNER JOIN `user` on question.u_id = user.id 

session_start();
include_once "creds.php";
$tbl_name="question";
$tbl_name2="user";
$tbl_name5="tags";
$tbl_name6="questag";


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




//$sql="SELECT * FROM  `$tbl_name` ORDER BY value ";


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

	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> !  <div class = "score"><td>Score:<?php echo $scr; ?></td> </div>
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
	<div class=  "cell" ><td><strong>Status</strong></td></div>
	<div class = "cell" ><td><strong>#</strong></td></div>
	<div class = "cell" ><td><strong>Topic</strong></td></div>
	<div class = "cell" ><td><strong>Views</strong></td></div>
	<div class = "cell" ><td><strong>Replies</strong></td></div>
	<div class = "cell" ><td><strong>Date/Time</strong></td></div>
	<div class = "cell" ><td><strong>Vote</strong></td></div>

<?php

	if($_SESSION['admin'] == 1){
		?>
		<div class="cell"><td><strong>Lock/Unlock</strong></td></div>
		<div class="cell"><td><strong>Edit</strong></td></div>
		<div class="cell"><td><strong>Delete</strong></td></div>
		<?php

	}
?>
	</tr>
</div>

	<?php
	while($rows=mysqli_fetch_array($result)){

		$question = $rows['q_id'];
		?>
		<tr>
		<div class = "rows">
			<?php

			if($rows['freeze'] == 1){
				?>
				<div = "cell"><img width='50' height = '50' src='Pictures/lock.png' alt='Locked Pic'></div>
<?php

			}

			elseif ($rows['freeze'] == 0) {
				?>
					<div = "cell"><img width='50' height = '50' src='Pictures/unlock.png' alt='unlock Pic'></div>

					<?php

							}
			?>
		
			<div class = "cell" ><td><?php echo $rows['q_id']; ?></td></div>
			<div class = "cell" ><td><a href="view.php?id=<?php echo $rows['q_id']; ?> "><?php echo $rows['topic']; ?></a><BR></td>

					<?php
					$quest = $rows['q_id'];
					$tag_num = array();
					$sqltag="SELECT tag FROM `$tbl_name6` WHERE `question` = $quest";
					//echo $sqltag;

					$resultt=$db->query($sqltag);


					while($tagg=mysqli_fetch_array($resultt))
					{
						$tag_num[] = $tagg['tag'];

					}


					//print_r($tag_num);

					foreach ($tag_num as $key => $value) {

						$tagname="SELECT tag FROM `$tbl_name5` WHERE `t_id` = $value";

						$nameres = $db->query($tagname);

						$tagging = mysqli_fetch_array($nameres);

						$tname = $tagging['tag'];
						# code...
						?>

						<div class="tagcell"><td><a href="tag.php?id=<?php echo $value; ?>"><?php echo $tname; ?></a></td></div>
						

						<?php

					}
					
						
					


					//unset($tag_num);
					
					?>

					


			</div>

			<div class = "cell" ><td><?php echo $rows['view']; ?></td></div>
			<div class = "cell" ><td><?php echo $rows['reply']; ?></td></div>
			<div class = "cell" ><td><?php echo $rows['datetime']; ?></td></div>
			<div class = "cell" ><td><?php echo $rows['value']; ?> </td></div>
			<?php
			if($_SESSION['admin'] == 1 AND $rows['freeze'] == 0)
				{  
?>
				<div class="cell">
					<a href="freeze.php?question=<?php echo $rows['q_id'];?> ">Lock?</a>
				</div>
<?php
				}
				elseif ($_SESSION['admin'] == 1 AND $rows['freeze'] == 1) {
					?>
					<div class="cell">
					<a href="unfreeze.php?question=<?php echo $rows['q_id'];?> ">Unlock?</a>
				</div>

				<?php
				}

			?>

				<div class="cell"><td><a href="edit.php?id=<?php echo $rows['q_id']; ?> ">Edit</a><BR></td></div>

				<div class="cell">
					<td><a href="delete.php?id=<?php echo $rows['q_id']; ?> ">Delete</a><BR></td>
				</div>


										

		</div>
</tr>


	<?php
}
?>
	


</body>




</html>

