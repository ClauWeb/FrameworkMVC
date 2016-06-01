<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	require(dirname(__FILE__).DS."config".DS."config.php");
	require(dirname(__FILE__).DS."resource".DS."constants.php");
		
	require(dirname(__FILE__).DS."config".DS."library.php");
	require_once(dirname(__FILE__).DS."library".DS."default.php");

	foreach($library_default as $lib_def){
		require_once(dirname(__FILE__).DS."library".DS.$lib_def.".php");
	}
	foreach($library_custom as $lib_cus){
		require_once(BASEPATH.DS."library".DS.$lib_cus.".php");
	}
	require(dirname(__FILE__).DS."resource".DS."model.php");
	require(dirname(__FILE__).DS."resource".DS."view.php");
	require(dirname(__FILE__).DS."resource".DS."controller.php");
	if(empty($nomefile[0])){
		$nomefile[0] = BASE_CONTROLLER;
	}
	require_once(BASEPATH.DS."controllers".DS.basename($nomefile[0]).".php");
?>