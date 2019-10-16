<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header('P3P: CP="CAO PSA OUR"');
header('content-type: text/plain');
header('content-type: application/x-www-form-urlencoded');


// Include connection
require 'connect.php';

// Get Id
$id = $_GET['id'];

// Selectionner l'id correspondant
$sql = "SELECT * FROM etudiants WHERE id = $id LIMIT 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);

exit;






