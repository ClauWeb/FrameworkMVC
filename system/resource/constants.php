<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	define('DB_HOST', $db['HOST']);
	define('DB_USER', $db['USERNAME']);
	define('DB_PASSW', $db['PASSWORD']);
	define('DB_DATABASE', $db['DATABASE']);
	define('DB_FORMAT', $db['FORMAT']);

	define('BASEPATH', $config['folder_application']);
	define('BASE_CONTROLLER', $config['base_controller']);
	define('BASE_URL', $config['base_url']);
?>