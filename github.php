<?php

$clientId="725e08a43209c83e9833";
$clientSecrect ="70da2c35ff3a63ee2c04bc10a90083003ed9a7ea";

	if($_GET && isset($_GET['code'])){

		$ch = curl_init();
		curl_setopt($ch, CURLPT_URL, "https://github.com/login/oauth/access_token");

		curl_setopt($ch, CURLPT_POST, 1);
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


		print_r($json);

	}



?>
