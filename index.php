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
<div class = "user"><strong>Welcome, </strong>
	<?php $sqladmin= "SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

		$adres=$db->query($sqladmin);
		$adrow=mysqli_fetch_array($adres);

		if($adrow['admin'] == 1){
			$_SESSION['admin'] = $adrow['admin'];
	?>
		<div class="admin">Admin</div>
	<?php
					}
			else if($adrow['admin'] == 0){
				$_SESSION['admin'] = 0;
				}
		$scr= $adrow['score'];
	?> 
		<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?>  </a> Score:<?php echo $scr; ?>
	<?php

		$sqlpic ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

		$respic = $db->query($sqlpic);
		$rpic = mysqli_fetch_array($respic);

			if($rpic['picture'] == "" && $rpic['gitpic'] == " " ){
				echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
				}
	}
				else if($rpic['access'] == ""){
					echo"<img width='50' height='50' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
					}
		  
				else{
		?>
		 <img width='50' height='50' src="<?php echo $rpic['gitpic']; ?>" alt="Avatar">
		 
		(<a href="index.php?action=logout">log out</a>)</td>
</div>
		
<div class = "table"> 
	<div class = "create">
		<form>
			
				<input name="username" type="hidden" value="<?php echo $username; ?>"></td>
				<a href="create.php"><strong>Create New Topic</strong> </a>
		
		</form>
	</div>
<?php 
if($_SESSION['admin']==1){
	?>

<a href="user.php"><strong>List of users</strong></a>

<?php
}
?>
	<div class="heading">
		
		<div class=  "cell" ><strong>Status</strong></div>
		<div class = "cell" ><strong>#</strong></div>
		<div class = "cell" ><strong>Topic</strong></div>
		<div class = "cell" ><strong>Views</strong></div>
		<div class = "cell" ><strong>Replies</strong></div>
		<div class = "cell" ><strong>Date/Time</strong></div>
		<div class = "cell" ><strong>Vote</strong></div>
		<?php

			if($_SESSION['admin'] == 1){
		?>
			<div class="cell"><strong>Lock/Unlock</strong></div>
			<div class="cell"><strong>Edit</strong></div>
			<div class="cell"><strong>Delete</strong></div>
		<?php

	}
		?>

		


	</div>
		<?php
			while($rows=mysqli_fetch_array($result)){

				$question = $rows['q_id'];
				?>
				
		<div class="rows">
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
		
			<div class = "cell" ><?php echo $rows['q_id']; ?></div>
			<div class = "cell" ><a href="view.php?id=<?php echo $rows['q_id']; ?> "><?php echo $rows['topic']; ?></a><BR>

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

						<div class="tagcell"><a href="tag.php?id=<?php echo $value; ?>"><?php echo $tname; ?></a></div>
						

						<?php

					}
					
						
					


					//unset($tag_num);
					
					?>

					


			</div>

			<div class = "cell" ><?php echo $rows['view']; ?></div>
			<div class = "cell" ><?php echo $rows['reply']; ?></div>
			<div class = "cell" ><?php echo $rows['datetime']; ?></div>
			<div class = "cell" ><?php echo $rows['value']; ?> </div>
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
			<?php
			if($_SESSION['admin'] == 1)
				{  
?>

<div class="cell"><a href="edit.php?id=<?php echo $rows['q_id']; ?> ">Edit</a><BR></div>

				<div class="cell">
					<a href="delete.php?id=<?php echo $rows['q_id']; ?> ">Delete</a><BR>
				</div>

				<?php

			}
			?>


					


				</div>




			
			<?php
				}
			?>
</div>

</body>

</html>

