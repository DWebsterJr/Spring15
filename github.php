<?php

include_once "creds.php";


$tbl_name="question";
$tbl_name2="user";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

session_start();
$clientId="725e08a43209c83e9833";
$clientSecrect ="70da2c35ff3a63ee2c04bc10a90083003ed9a7ea";


	if(isset($_GET['code'])){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://github.com/login/oauth/access_token");

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
											'code' => $_GET['code'],
											'client_id' =>$clientId,
											'client_secret' => $clientSecrect




			))
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		curl_close($ch);

		$json = json_decode($server_output, true);
	


			$access = $json['access_token'];
			$scope = $json['scope'];




	
	curl_close($ch);



$token = "SELECT access FROM `$tbl_name2` WHERE `access` = '".$access. "'";

			echo $token;

			$res = $db->query($token);

			//echo $res;

			if($res == 0 ){

				echo " not Found";
			}
		//print_r($json);
	//echo $access;
	//echo $scope;

	//$name = $_COOKIE['dotcom_user'];

	//echo $name;


		//print_r($json);

		//echo curl_error($ch);



	
		$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL, "https://api.github.com/user?access_token=".$access);
			/*curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
													'access_token' => $access
			

				))

			);
			*/

//echo "https://api.github.com/user?access_token=".$access;

			curl_setopt($ch2, CURLOPT_HTTPHEADER, array("Accept: application/json", "User-Agent: DWebsterJr"));
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			$serverpt = curl_exec($ch2);
//echo $serverpt;
			$njson = json_decode($serverpt, true);

		//echo $njson;
		//echo "done echoing";

		//print_r($njson);


		$id = $njson['id'];
		$user = $njson['login'];

		$_SESSION['username'] = $user;

		$avatar = $njson['avatar_url'];

		$email = $njson['email'];
/*
		echo $user;

		echo $avatar;


		echo $email;
		$

	
		
*/
		$valid = 1;
			$sql="INSERT INTO `$tbl_name2` (`username`, `email`,`validate`, `access`, `gitpic`) VALUES ('$user', '$email', '$valid', '$access', '$avatar')";

echo $valid;

echo $sql;
			$result=$db->query($sql);

echo $result;



			//$sql1="INSERT INTO `$tbl_name2` (`username`,`password`, `email`)VALUES('$newname', '$newpassword', '$email')";

			echo curl_error($ch2);
			
			curl_close($ch2);

	$sqlid1 = "SELECT * FROM `$tbl_name2` WHERE `access` =  '".$access. "'";

		$idres1=$db->query($sqlid1);

		$idrow1 = mysqli_fetch_array($idres1);

		$_SESSION['id'] = $idrow1['id'];

		$_SESSION['loggedIn'] = True;

		


			//echo "done";
	
		
	
	$sqlpic="SELECT * FROM `$tbl_name2` WHERE `access` =  '".$access. "'";

	echo $sqlpic;

	$respic = $db->query($sqlpic);

	$row = mysqli_fetch_array($respic){

		if($row['gitpic'] == ""){
			echo "empty";
		}

		else{
			echo $row['gitpic'];
		}
	}


	}




	//var_dump(parse_url($avatar));
	//var_dump(parse_url($avatar, PHP_URL_PATH));


	//$path = var_dump(parse_url($avatar, PHP_URL_PATH)));

	//$path = $path + ".png";


	//echo $path;


	





/*
	$cookie_name = "user"
	$cookie_value = $access;
	setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");

	*/


//curl_close($ch);




?>

<!DOCTYPE html>
<html>
<head>
<title> Ask 4Gamers: an Ask site for gamers</title>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1> A4G </h1>
<div class = "user">

	<strong>Welcome, </strong>

	<?php echo $user; 

	$num = 0;


	if($avatar == ""){
		echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";

	}

	else{
		?>

		<img width='50' height='50' src="<?php echo $avatar; ?>" alt="Avatar">

<?php
	}


	
	?>



</div>

<div class = "search">
	<form  role="form" method="post" >
		<input type="text" class="form-control" id="keyword" placeholder="Enter a username">
	</form>
	<ul id="content"></ul>
</div>
<a href="index.php"><strong>Back to Main Page</strong> </a>
<a href="create.php"><strong>Create New Topic</strong> </a>

</body>


</html>
