<?php 
	// db
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'angularPHPCrud');

	// Connexion avec DB
	function connect() {
		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno($connect)) {
			die("Erreur de connexion: ".mysqli_connect_errno());
		}

		mysqli_set_charset($connect, "utf8");

		return $connect;
	}

	$con = connect();

?>