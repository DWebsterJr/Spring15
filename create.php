<?php

session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ask 4Gamers: an Ask site for gamers</title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
</head>
<body>
	<h1>A4G: Create a Topic </h1>
	<td> <strong>Welcome, </strong> <?= $_SESSION['username']?> !(<a href="index.php?action=logout">log out</a>)</td>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<form id="form1" name="form1" method="post" action="add.php">
		<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
				<tr>
					<td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong></td>
				</tr>
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
				<td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table>



</html>