<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");

	function view($name, $data = []){
		foreach($data as $k => $v)
			${$k} = $v;
		$view = "..".DS.BASEPATH.DS.'views'.DS.implode('/', explode('.', $name)).'.php';
		ob_start();
		require($view);
		$d = ob_get_contents();
		return $d;
		ob_end_clean();
	}

?>