<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header('P3P: CP="CAO PSA OUR"');
header('content-type: text/plain');
header('content-type: application/x-www-form-urlencoded');


require 'connect.php';

error_reporting(E_ERROR);

$etudiants = [];
$sql = "SELECT * FROM etudiants";


if ($result = mysqli_query($con, $sql)) {
	$countr = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		$etudiants[$countr]['id']	 = $row['id'];
		$etudiants[$countr]['prenom'] = $row['prenom'];
		$etudiants[$countr]['nom']	 = $row['nom'];
		$etudiants[$countr]['email']  = $row['email'];
		$countr++;
	}

	//print_r($etudiants);
	echo json_encode($etudiants);

} else {
	http_response_code(404);
}

?>