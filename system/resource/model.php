<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	function startmodel($name){
		$view = "..".DS.BASEPATH.DS.'models'.DS.implode('/', explode('.', $name)).'.php';
		require_once($view);
	}
	function model($name, $data = []){
		return call_user_func_array($name, $data);
	}
?>