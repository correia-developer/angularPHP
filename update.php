<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include connection
require 'connect.php';


// Get the posted data
$postdata = file_get_contents("php://input");
	

if (isset($postdata) && !empty($postdata)) {
	$request = json_decode($postdata, true);  // ajoute true sur json_decode pour le convertir en tableau associative
		
	// Validate
	/*
	 if ((int)$request->id < 1 || trim($request->number) == '' || (float)$request->amount < 0) {
	    return http_response_code(400);
	 }
	 */


	// Sanitize
	// chaque variable est  recupere avec cle dans le tableau
  	$id = mysqli_real_escape_string($con, (int)$_GET['id']);
	$prenom = mysqli_real_escape_string($con, trim($request["prenom"])); 
	$nom = mysqli_real_escape_string($con, trim($request["nom"])); 
	$email  = mysqli_real_escape_string($con, trim($request["email"]));

	// Update
	$sql = "UPDATE `etudiants` SET `prenom`= '$prenom', `nom`='$nom', `email`='$email' WHERE id = $id";

	if (mysqli_query($con, $sql)) {

		http_response_code(204);

	} else {

		return http_response_code(422);

	}


}

?>