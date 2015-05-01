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

	$sqlpic ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	//echo $sqlpic;

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] != ""){
			//echo $rpic['picture'];

			echo"<img width='50' height='50' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
		}
		else if($rpic['picture'] == "" && $rpic['gitpic'] != "")
		{
			//echo $rpic['gitpic'];
			?>

			 <img width='50' height='50' src="<?php echo $rpic['gitpic']; ?>" alt="Avatar">
			<?php
		}

		else{
			//echo "default";
			echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
		}

			?>
?>  
<div class = "user">
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
	<a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> Score:<?php echo $scr; ?>

	(<a href="index.php?action=logout">log out</a>)

</div>


<a href="index.php"><strong>Back to Main Page</strong> </a>



		

<div class="table">
	<form id="form1" name="form1" method="post" action="add.php">
		
			<div class="table">
				
				
					<strong>Topic</strog>
					:
					<input name="topic" type="text" id="topic" size="50" />
				
					<strong>Detail</strong>
					:
					<textarea name="detail" cols="50" rows="3" id="detail"></textarea>
				
				&nbsp;
				&nbsp;
			
					<strong>Tags</strong>
					:
				<input name="tags" type="text" maxlength="50" id="tag" />

				
				<input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" />

</div>
</form>
</div>



</html>