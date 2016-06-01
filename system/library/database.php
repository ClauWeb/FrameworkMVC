<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	if(defined('DB_FORMAT')){
		if(strtolower(DB_FORMAT) == "mysqli"){
			require_once(SYSPATH.DS."database".DS."mysqli.php");
		}elseif(strtolower(DB_FORMAT) == "pdo"){
			require_once(SYSPATH.DS."database".DS."pdo.php");
		}else{
			die("Il formato del database non esiste");
		}
	}else{
		require_once(SYSPATH.DS."database".DS."mysqli.php");
	}
?>