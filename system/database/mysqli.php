<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSW, DB_DATABASE) or die("Impossibile collegarsi al server MYSQL: ".mysqli_error($conn));
	function db_query($s){
		global $conn;
		return mysqli_query($conn, $s);
	}
	function db_assoc($s){
		return mysqli_fetch_assoc($s);
	}
	function db_num_rows($s){
		return mysqli_num_rows($s);
	}
	function db_id_insert(){
		global $conn;
		return mysqli_insert_id($conn);
	}
	function db_error(){
		global $conn;
		return mysqli_error($conn);
	}
?>