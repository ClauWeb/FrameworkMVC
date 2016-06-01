<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	
	function dbin($s) {
		return addslashes(htmlentities($s, ENT_QUOTES, 'UTF-8'));
	}
	function dbout($s) {
		return stripslashes(html_entity_decode($s, ENT_QUOTES, 'UTF-8'));
	}
?>