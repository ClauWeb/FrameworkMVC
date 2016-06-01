<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	error_reporting(E_ALL);
	$db = array(
		'HOST' => 'localhost',
		'USERNAME' => 'root',
		'PASSWORD' => '',
		'DATABASE' => '',
		'FORMAT' => 'mysqli'
	);
	
	$config = array(
		'folder_application' => 'application',
		'base_controller' => 'HelloWorld',
		'base_url' => '',
	);
?>