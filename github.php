<?php

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

		print_r($json);
	//echo $access;
	//echo $scope;

	$name = $_COOKIE['dotcom_user'];

	echo $name;


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

		print_r($njson);


		$user = $njson['login'];

		$avatar = $njson['avatar_url'];

		$email = $njson['email'];

		echo $user;

		echo $avatar;


		echo $email;





			echo curl_error($ch2);
			
			curl_close($ch2);

			//echo "done";



			$ch3 = curl_init();
			curl_setopt($ch3, CURLOPT_URL, "https://api.github.com/gist?access_token=".$access);
			
			curl_setopt($ch3, CURLOPT_HTTPHEADER, array("Accept: application/json", "User-Agent: DWebsterJr"));
			curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
			$serveropt = curl_exec($ch3);
//echo $serverpt;
			$newjson = json_decode($serveropt, true);

		//echo $njson;
		//echo "done echoing";

		print_r($newjson);

		curl_close($ch3);



		
	}




	





	$cookie_name = "user"
	$cookie_value = $access;
	setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");

	


//curl_close($ch);


?>