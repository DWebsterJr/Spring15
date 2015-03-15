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


$login = $_SESSION['username'];

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

<h1> A4G </h1>

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
<td> <strong>Welcome, </strong> <a href="profile.php?id=<?php echo $row['id']; ?>" ><?=$_SESSION['username']?> </a> !  (<a href="index.php?action=logout">log out</a>)</td>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>

</tr>

<tr>

<td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>

</tr>
<tr>
<?php
$name = "Anon";
$number = $rows['u_id'];

$sqli="SELECT username FROM `$tbl_name2` WHERE `id`= $number";
//echo $sqli;

$res=$db->query($sqli);

$row=mysqli_fetch_array($res);


if (isset($row)){
	$name=$row['username'];
}

if($number == 0)
{
	$name="Anon";
}


//echo $name;


?>
<td bgcolor="#F8F7F1"><strong>By :</strong> <a href="profile.php?id=<?php echo $rows['u_id']; ?>" ><?php echo $name; ?></a>

<?php
	
	$sqlpicture = "SELECT picture FROM `$tbl_name2` WHERE `id` =$number";

	//echo $sqlpicture; 

	$picres=$db->query($sqlpicture);
	$picrow=mysqli_fetch_array($picres);

	if($picrow['picture'] == "" ){
		echo "<img width='20' height = '20' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='20' height='20' src='Pictures/".$picrow['picture']."' alt=Profile Pic'>";
	}
?>  



</td>

</tr>

<tr>

<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>

</tr>



</table></td>

</tr>

</table>

<BR>
	<?php

$sql2="SELECT * FROM `$tbl_name3` WHERE `question_id` = $id  ORDER BY `like` DESC "; 

//echo $sql2; 
$result2=$db->query($sql2);
while($rows=mysqli_fetch_array($result2)){

	?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<?php

$num = $rows['user_id'];
$sqli2="SELECT * FROM `$tbl_name2` WHERE `id`= $num";
//echo $sqli;

$ress=$db->query($sqli2);

$roww=mysqli_fetch_array($ress);

if (isset($ress)){
$a_name=$roww['username'];
}

if($num == 0)
{
	$a_name="Anon";
}



?>


<td bgcolor="#F8F7F1"><strong>Name</strong></td>

<td bgcolor="#F8F7F1">:</td>


<td bgcolor="#F8F7F1"><a href="profile.php?id=<?php echo $roww['id']; ?>"> <?php echo $a_name; ?> </a>

<?php
	
	$sqlpicture = "SELECT picture FROM `$tbl_name2` WHERE `id` =$num";

	//echo $sqlpicture; 

	$picres=$db->query($sqlpicture);
	$picrow=mysqli_fetch_array($picres);

	if($picrow['picture'] == "" ){
		echo "<img width='20' height = '20' src='Pictures/default.png' alt='Default Profile Pic'>";

	}
	else{
		echo"<img width='20' height='20' src='Pictures/".$picrow['picture']."' alt=Profile Pic'>";
	}
?>  










</td>

</tr>
<form method="post"id="like_form" action="like.php">
<tr>

<td bgcolor="#F8F7F1"><strong>Answer</strong></td>

<td bgcolor="#F8F7F1">:</td>

<td bgcolor="#F8F7F1"><?php echo $rows['a_answer']; ?></td>

</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
<div class="item" data-postid="<?php echo $rows['a_id']; ?>" data-score="<?php echo $rows['vote']; ?>">
<div class = "vote-span">
	<div class="vote" data-action="up" title="Vote up">
		<i class = "icon-chevron-up"></i>
	</div><!--vote up -->
	<div class="vote-score"><?php echo $rows['vote']; ?></div>
	<div class="vote" data-action="down" title="Vote down">
		<i class="icon-chevron-down"></i>
	</div><!-- vote down -->
</div><!-- voting -->
</div><!-- item -->




<?php
$like = $rows['a_id'];
if($_SESSION['username'] == $name && $rows['like'] == 0){ ?>

<tr>

<td><input name="like" form="like_form" type="hidden" value="<?php echo $like; ?>"></td>
<input name="id" form="like_form" type="hidden" value="<?php echo $id; ?>"></td>
<input type="submit" form="like_form" value="Like this Answer?">

</tr>

<?php	
}
if($rows['like'] == 1){ ?>

<tr>
<td bgcolor="#33fa57"><?php echo $name; ?> liked this answer</td>


</tr>

<?php

}

?>


</table></td>
</tr>
</table><br></form>
<?php
}



$sql3="SELECT view FROM `$tbl_name` WHERE `q_id`= $id";

$result3=$db->query($sql3);



$rows=mysqli_fetch_array($result3);

$view=$rows['view'];


if(empty($view)){

$view=1;

$sql4="INSERT INTO `$tbl_name`(`view`) VALUES('$view') WHERE `q_id` =$id";

$result4=$db->query($sql4);

}
$addview=$view+1;

$sql5="UPDATE `$tbl_name` SET `view`= $addview WHERE `q_id`= $id";

$result5=$db->query($sql5);


$votesql = "SELECT vote FROM `$tbl_name3` WHERE `question_id` = $id";

$resv=$db->query($votesql);
$v=0;
while($rowv=mysqli_fetch_array($resv)){
	$v +=$rowv['vote'];
}

$sql6="UPDATE `$tbl_name` SET `value` = $v WHERE `q_id` = $id";

$result6=$db->query($sql6);


?>


<BR>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="index.php"><strong>Back to Main Page</strong> </a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</body>


</html>






