<?php 
	
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header('P3P: CP="CAO PSA OUR"');
	header('content-type: text/plain');
	header('content-type: application/x-www-form-urlencoded');

	require 'connect.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM etudiants WHERE id = $id LIMIT 1";

	if (mysqli_query($con, $sql)) {
		http_response_code(204);
	} else {
		return http_response_code(422);
	}


?>