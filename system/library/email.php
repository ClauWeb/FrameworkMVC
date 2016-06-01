<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	
	function sendmail($from, $to, $subj, $message, $files = null) {
		ini_set('sendmail_from', $from);
		$headers =      "From: $from\n" .
				"Return-Path: <$from>\r\n" .
				"MIME-Version: 1.0\n";
		if(!(is_array($files) || count($files))) {
			$headers .=     "Content-Type: text/html; charset=\"UTF-8\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n";
		}
		else {
			$semi_rand = md5(time());
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			$headers .=     "Content-Type: multipart/mixed; boundary=\"{$mime_boundary}\"\n";
			$message =      "--{$mime_boundary}\n" .
					"Content-Type: text/plain; charset=\"UTF-8\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n" .
					$message . "\n\n";
			foreach($files as $fn) {
				$f = basename($fn);
				if(!is_file($fn))
					continue;
				$data = chunk_split(base64_encode(file_get_contents($fn)));
				$message .=     "--{$mime_boundary}\n" .
						"Content-Type: application/octet-stream; name=\"$f\"\n" .
						"Content-Description: $f\n" .
						"Content-Disposition: attachment; filename=\"$f\"; size=".filesize($fn).";\n" .
						"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
			}
			$message .= "--{$mime_boundary}--";
		}
		return @mail($to, $subj, $message, $headers);
	}
?>