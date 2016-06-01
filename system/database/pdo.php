<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	$col = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
	try{
	  $conn = new PDO($col , DB_USER, DB_PASSW);	
	}catch(PDOException $e){
	  echo 'Attenzione: '.$e->getMessage();
	}
	$conn->beginTransaction();

	
	function db_query($s){
		global $conn;
		$d = $conn->prepare($s);
		$d->execute();
		return $d;
	}
	function db_assoc($s){
		$d = $s->fetch(PDO::FETCH_BOTH);
		return $d;
	}
	function db_num_rows($s){
		return $s->rowCount();
	}
	function db_id_insert(){
		global $conn;
		return $conn->lastInsertId();
	}
?>