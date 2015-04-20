<?php
include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);

$newname = $_POST['newuser'];
$email =$_POST['email'];
$email = addslashes($email);
$newpassword= $_POST['newpass'];
$confirmpassword=$_POST['confirm'];





$sql = "SELECT * FROM `$tbl_name2` WHERE `username` = '".$newname."'";
//echo $sql;
$result= $db->query($sql);
$count = $db->affected_rows;
$sqlp = "SELECT * FROM `$tbl_name2` WHERE `password` = '".$newpassword."'";
$resultp=$db->query($sqlp);
$countp = $db->affected_rows;
$sqle="SELECT * FROM `$tbl_name2` WHERE `email` = '".$email."'";
$counte=$db->query($sqle);
$counte=$db->affected_rows;

if($count == 1){

	echo " This username has already been used";
	echo "<a href=login.php>return to login page</a>";
}

else if($countp == 1){
	echo "This password has already been used";
	echo "<a href=login.php>return to login page</a>";
}

else if($counte == 1){
	echo "This password has already been used";
	echo "<a href=login.php>return to login page</a>";
}


else if($email == ""){
	echo "Make sure you enter an email";
	echo "<a href=login.php>return to login page</a>";
}



else if($newpassword != $confirmpassword)
{
	echo "Make sure the password you input is correct in both places.";
	echo "<a href=login.php>return to login page</a>";
}

else
{
	$sql1="INSERT INTO `$tbl_name2` (`username`,`password`, `email`)VALUES('$newname', '$newpassword', '$email')";
$result1=$db->query($sql1);

if($result1){

	echo "Successful";
	session_start();

	$_SESSION['username'] = $newname;
	$sql2="SELECT id FROM `$tbl_name` WHERE `username` = '".$newname. "'";

	//echo $sql1;
	$result2=$db->query($sql2);
	$row=mysqli_fetch_array($result2);

	

	$id = $row['id'];
	//echo $id;
	$_SESSION['id'] = $id;
	$_SESSION['loggedIn'] = True;

	
	

	
	$to = $email;
	$subject ="Email verification";

	$body=" Hi <br/> <br/> We need to make sure you are human. Please verify your email and get started using your account. <br/> <br/> <a href=validate.php?id=<?php echo $id; ?>http://wsdl-docker.cs.odu:60228/validate.php?id=<?php echo $id; ?></a>" ;

	$postQueryParameters = 
		http_build_query(array(

				"from" => 'Mailgun Sandbox <postmaster@sandbox84d0b092e19e41b6857a10c58e584173.mailgun.org>',
				"to" => "$email",
				"subject" => "CS418 - Milestone 4 Email Verification",
				"text" => "Hi <br/> <br/> We need to make sure you are human. Please verify your email and get started using your account. <br/> <br/> <a href=http://wsdl-docker.cs.odu:60228/validate.php?id=<?php echo $id; ?>>http://wsdl-docker.cs.odu:60228/validate.php?id=<?php echo $id; ?></a>"

			));
		$username = "api";

		$password ="key-67feadc4d360ce2d2b7df92e453d9d29";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.mailgun.net/v3/sandbox84d0b092e19e41b6857a10c58e584173.mailgun.org/messages");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_USERPWD, $username. ":" .$password);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postQueryParameters);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec($ch);

		echo curl_error($ch);

	if($output != false){
		echo $output;
		echo "done";
		echo "You registered to this website, make sure to check your email to valiadate your account.";
		echo "<a href=login.php>return to login page</a>";
	}else{
		echo "There was an error";
		echo $output;
		echo curl_error($ch);
	}
	
	curl_close($ch);


	


	//header("location:index.php");
}


}


?>

