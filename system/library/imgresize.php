<?php
	defined('CHECKPAGE') or die("Non &egrave; consentito l'accesso diretto ai file");
	function imgresize($src, $saveas, $whxy = '64x64-0,0', $opts = null) {
		$in = null;
		$out = null;
		$transparency = false;
		$ext = strtolower((string)@pathinfo($src)['extension']);
		switch($ext) {
			case 'jpg':
			case 'jpeg':
				$in = 'imagecreatefromjpeg';
				$out = 'imagejpeg';
				break;
			case 'gif':
				$in = 'imagecreatefromgif';
				$out = 'imagegif';
				/* imagegif() doesn't take a third param */
				if($opts !== null)
					$opts = null;
				break;
			case 'bmp':
				$in = 'imagecreatefromwbmp';
				$out = 'imagewbmp';
				break;
			case 'png':
				$in = 'imagecreatefrompng';
				$out = 'imagepng';
				$transparency = true;
				break;
			default: /* unsupported image */ return -1;
		}
		if(!($oi = $in($src)))
			return 2;
		$t = explode('-', $whxy);
		$wh = $t[0];
		$wh = explode('x', $wh);
		$xy = isset($t[1]) ? $t[1] : '0,0';
		$xy = explode(',', $xy);
		$w = (int)@$wh[0];
		$h = isset($wh[1]) ? $wh[1] : $w;
		$x = (int)@$xy[0];
		$y = (int)@$xy[1];
		list($iw, $ih) = getimagesize($src);
		$ratio = [$iw / $ih, $w / $h];
		if($x != 0 || $y != 0) {
			$crop = imagecreatetruecolor($w, $h);
			$cropW = $w;
			$cropH = $h;
			imagecopy($crop, $oi, 0, 0, (int)$x, (int)$y, $w, $h);
			if($transparency) {
				imagealphablending($crop, false);
				imagesavealpha($crop, true);  
			}
		}
		else if($ratio[0] != $ratio[1]) {
			$scale = min((float)($iw / $w), (float)($ih / $h));
			$cropX = (float)($iw - ($scale * $w));
			$cropY = (float)($ih - ($scale * $h));
			$cropW = (float)($iw - $cropX);
			$cropH = (float)($ih - $cropY);
			$crop = imagecreatetruecolor($cropW, $cropH);
			if($transparency) {
				imagealphablending($crop, false);
				imagesavealpha($crop, true);  
			}
			imagecopy($crop, $oi, 0, 0, (int)($cropX / 2), (int)($cropY / 2), $cropW, $cropH);
		}
		$ni = imagecreatetruecolor($w, $h);
		if($transparency) {
			imagealphablending($ni, false);
			imagesavealpha($ni, true);  
		}
		if(isset($crop)) {
			imagecopyresampled($ni, $crop, 0, 0, 0, 0, $w, $h, $cropW, $cropH);
			imagedestroy($crop);
		}
		else {
			imagecopyresampled($ni, $oi, 0, 0, 0, 0, $w, $h, $iw, $ih);
		}
		imagedestroy($oi);
		if($opts !== null)
			$r = $out($ni, $saveas, $opts);
		else
			$r = $out($ni, $saveas);
		imagedestroy($ni);
		if($r === false)
			return 1;
		return 0;
	}
?>