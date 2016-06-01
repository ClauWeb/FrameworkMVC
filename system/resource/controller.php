<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	
	function controller($uri, $func){
		$path = explode('/', $_SERVER['REQUEST_URI']);
		$path = array_filter($path, "strlen");
		$path = ripristina_array($path);	
		$pathfix = $path;
		unset($pathfix[0]);
		unset($pathfix[1]);
		$pathfix = ripristina_array($pathfix);	
		if(empty($path[1])){
			$path[1] = "index";
		}		
		if(strcasecmp($uri, $path[1]) == 0){
			call_user_func_array($func, $pathfix);
		}
	}
	$nomefile = explode('/', $_SERVER['REQUEST_URI']);
	$nomefile = array_filter($nomefile, "strlen");
	$nomefile = ripristina_array($nomefile);
?>