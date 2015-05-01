<?php

session_start();
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";
$tbl_name5="tags";
$tbl_name6="questag";


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

	if(empty($_FILES['file']['tmp_name'])){
		//echo "no file";
		$empty = '';

		//echo $empty;
		$dq = "UPDATE `$tbl_name2` SET picture = '$empty' WHERE username = '".$_SESSION['username']."'";
		//echo $dq;
		$defres=$db->query($dq);
		//echo $defres;

	}
	else{
	move_uploaded_file(($_FILES['file']['tmp_name']), "Pictures/" .$_FILES['file']['name']);
	$nq = "UPDATE `$tbl_name2` SET picture = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'";

	$ress=$db->query($nq);
        }
    }



	

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



<h1> A4G: Profile </h1>


<a href="index.php"><strong>Back to Main Page</strong> </a>


<body>
	<div class = "search">
	<form  role="form" method="post" >
		<input type="text" class="form-control" id="keyword" placeholder="Enter a username"/>
	</form>
	<ul id="content"></ul>

<BR>

<div class = "user">

<?php
	$uname = $_SESSION['username'];

	$sql1="SELECT id FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

	$result=$db->query($sql);

	$results=$db->query($sql1);

	$row=mysqli_fetch_array($results);

	$sqlpic ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	//echo $sqlpic;

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] == "" ){
		echo "<img width='30' height = '30' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else if($rpic['gitpic'] != ""){
		?>
		 <img width='50' height='50' src="<?php echo $rpic['gitpic']; ?>" alt="Avatar">
		 <?php
	}
	else{
		echo"<img width='30' height='30' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
	}
?>

	
	<strong>Welcome, </strong>
<?php

$sqladmin= "SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

$adres=$db->query($sqladmin);
$adrow=mysqli_fetch_array($adres);

if($adrow['admin'] == 1){
	?>
<div class="admin">Admin</div>
	<?php
					}
	$scr=$adrow['score'];

	?>
		
	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a>  Score:<?php echo $scr; ?>
</div>


<td> <h2><?php echo $roname['username']; ?> </h2>
<?php
$q = "SELECT * FROM `$tbl_name2` where `id` = $id ";

$res = $db->query($q);
while($r = mysqli_fetch_array($res)){
	if($r['picture'] != ""){
			//echo $rpic['picture'];
			echo"<img width='50' height='50' src='Pictures/".$r['picture']."' alt=Profile Pic'>";
			
		}
		else if($r['picture'] == "" && $r['gitpic'] != "")
		{
			//echo $rpic['gitpic'];
			?>

			 <img width='50' height='50' src="<?php echo $r['gitpic']; ?>" alt="Avatar">
			<?php
		}

		else{
			//echo "default";
			echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
		}

			
}
echo "<br>";
?>
<?php

if( $roname['username'] == $_SESSION['username']){
?>
<div class="table">
<form action = "" method="post" enctype="multipart/form-data">
	<input type = "file" name="file">
	<input type="submit" id="submit" name="submit" value="Upload">
	

</form>
<?php

$mail ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	$rese = $db->query($mail);
	$email = mysqli_fetch_array($rese);

	if($email['email'] != ""){

		$em = $email['email'];

		echo md5( strtolower(trim($em)));

		$Hash = md5( strtolower(trim($em)));

		$newavatar = " http://www.gravatar.com/avatar/" ;

		$newavatar .= $Hash;

		?>
		<form action="" method="post" name="new_image" >
			<input type = "file" name="file" value="<?php echo $newavatar ?>">
			<input type="submit" name="new" value="New image">
		<img width='50' height='50' src="<?php echo $newavatar; ?>" alt="GrAvatar">
	
		<?php

	}

	else{
			echo "<img width='50' height = '50' src='http://www.gravatar.com/avatar/00000000000000000000000000000000' alt='Default Profile Pic'>";
	}
?>  


	<a href="create.php"><strong>Create New Topic</strong> </a>

</div>

<?php



}
?>






	

<?php



?>


<div class = "table">
<h3>Questions</h3>
<div class = "heading">
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


	</tr>
</div>

	<?php
	$num_q=0;
	while($rows=mysqli_fetch_array($result)){
		$num_q++;
		?>
		
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

<?php
$v =0;
$score = "SELECT value FROM `$tbl_name` WHERE u_id = $id";
$scr=$db->query($score);
while ($srow = mysqli_fetch_array($scr)) {
	# code...
	$v +=($srow['value']);
}
$uscr = "UPDATE `$tbl_name2` SET `score` =$v WHERE `id` = $id";
$resp=$db->query($uscr);


$numq="UPDATE `$tbl_name2` SET `q` = $num_q WHERE `id` = $id";
$qres=$db->query($numq);
?>