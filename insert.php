<?php
/*
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header('P3P: CP="CAO PSA OUR"');
	header('content-type: text/plain');
	header('content-type: application/x-www-form-urlencoded');*/
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


	require 'connect.php';

	$postdata = file_get_contents("php://input");
	

	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata, true);  // ajoute true sur json_decode pour le convertir en tableau associative
		
		// Sanitize
		// chaque variable est  recupere avec cle dans le tableau
		$prenom = mysqli_real_escape_string($con, trim($request["prenom"])); 
		$nom = mysqli_real_escape_string($con, trim($request["nom"])); 
		$email  = mysqli_real_escape_string($con, trim($request["email"]));

		/* 
		  Il faut aussi formatter la requette avec de quotes sur les champs prenom , nom et email qui sont declarés avec varchar dans la base.
		*/

		// Insert
		$sql = "INSERT INTO etudiants (prenom,nom,email) VALUES ('".$prenom."','".$nom."','". $email."')";

	    /*
	       Sur la response c'est ca que je te propose retourne toujours un object json angular est different de php
	       il sera plus simple de manupuler le json avec des champs que tu connait ca facilite le test coté angular une fois que tu as la response.
	       
	    */


	    
		if (mysqli_query($con, $sql)) {

			$status_code = http_response_code(201);
			$message ="Contact successfully added";
			$response ="OK";

		} else {

			$status_code = http_response_code(422);
			$message ="contact not successfully added";
			$response ="OK";
		}

		$response = array(
			"status"=>$status_code, 
			"msg"=>$message,
			"response"=>$response
		);

		echo json_encode($response);
	}
?>