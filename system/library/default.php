<?php
defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

function generate($car){
	$string = '';
	$caratteri = array('a','b','c','d','e','f','g','h','i','l','m','n','o','p','q','r','s','t','u','v','z','w','y','j','k','A','B','C','D','E','F','G','H','I','L','M','N','O','P','Q','R','S','T','U','V','Z','W','Y','J','K','0','1','2','3','4','5','6','7','8','9');
	
	do{
		$string .= $caratteri[rand(0, 59)];
	}while(strlen($string) <= $car);
	
	return $string;
}
function config($array){
	global ${$array};
	return ${$array};
}
function uri_data($s){
	$path = explode('/', $_SERVER['REQUEST_URI']);
	$path = array_filter($path, "strlen");
	$path = ripristina_array($path);
	$d = (!empty($path[$s])) ? $path[$s] : NULL ;
	return $d;
}
function ripristina_array($array){
	$i = 0;
	$r = [];
	foreach($array as $ar){
		$r[$i] = $ar;
		$i++;
	}
	return $r;
}
?>