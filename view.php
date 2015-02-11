<?php
$host="localhost";
$user="admin";
$pw="5pR1nG20lS";
$db_name="stack";
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
<head></head>
<html>

<td> <strong>Welcome, </strong> <?php echo $username ?></td>
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

<td bgcolor="#F8F7F1"><strong>By :</strong> <?php echo $rows['u_id']; ?></td>

</tr>

<tr>

<td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>

</tr>

</table></td>

</tr>

</table>

<BR>
	<?php

$sql2="SELECT * FROM `$tbl_name3` WHERE `question_id` = $id";

$result2=$db->query($sql2);
while($rows=mysqli_fetch_array($result2)){

	?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#F8F7F1"><strong>Name</strong></td>

<td bgcolor="#F8F7F1">:</td>

<td bgcolor="#F8F7F1"><?php 
 
	echo $rows['user_id']; ?></td>

</tr>
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
<tr>
<td bgcolor="#F8F7F1"><strong>Likes</strong></td>
<td bgcolor="#F8F7F1"><?php echo $rows['likes']; ?></td>


</tr>
</table></td>
</tr>
</table><br>
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


</html>