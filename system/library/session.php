<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	session_start();
	
	function set_flashdata($name, $cont){
		$_SESSION['flashdata'][$name] = $cont;
	}
	function data_flashdata($name){
		if(isset($_SESSION['flashdata'][$name])){
			$d = $_SESSION['flashdata'][$name];
			unset($_SESSION['flashdata'][$name]);
			return $d;
		}else{
			return NULL;
		}
	}
	function set_session($name, $cont){
		$_SESSION['sessionprivate'][$name] = $cont;
	}
	function data_session($name){
		if(isset($_SESSION['sessionprivate'][$name])){
			return $_SESSION['sessionprivate'][$name];
		}else{
			return FALSE;
		}
	}
?>