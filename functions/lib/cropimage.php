<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> cropimage.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// crop an image so it only displays a section //
function cropimage($nw, $nh, $source, $dest, $zoom) {
	
	$size = getimagesize($source);
	$w = $size[0];
	$h = $size[1];

	$simg = imagecreatefromjpeg($source); 
	$dimg = imagecreatetruecolor($nw, $nh);
	
	$color = imagecolorallocate($dimg, 255, 255, 255);
	imagefill($dimg, 0, 0, $color);	
	
	$ch = $h/2;
	$cw = $w/2;
	
	$zoom = round($zoom/100,2);
	
	$zw = $w * $zoom;
	$zh = $h * $zoom;
	
	// if zoom size is smaller than crop image, increase size //
	while($zw<$nw){
		$zw = $zw * 1.05;
		$zh = $zh * 1.05;
	}	
	while($zh<$nh){
		$zw = $zw * 1.05;
		$zh = $zh * 1.05;
	}
	
	
	if($zw < $nw || $zh < $nh){
		
		$w_dif = $nw - $zw;
		$h_dif = $nh - $zh;
		
		$w_ratio = $zw / $zh;
		$h_ratio = $zh / $zw;
		
		if($zw < $nw){		
			$zw = $zw + $w_dif;
			$zh = $zw * $h_ratio;		
		} elseif($zh < $nh){		
			$zh = $zh + $h_dif;
			$zw = $zh * $w_ratio;
		}
		
	}
	
	
	$zw_x = ($zw - $nw) / 2;
	$zh_y = ($zh - $nh) / 2;


	if($w > $h){
		
		$x_start = ($zw - $nw) / 2;
		imagecopyresampled($dimg, $simg, -$x_start, -$zh_y, 0, 0, $zw, $zh, $w, $h);
		
	} elseif(($w < $h) || ($w == $h)) {
		
		$y_start = ($zh - $nh) / 2;		
		imagecopyresampled($dimg, $simg, -$zw_x, -$y_start, 0, 0, $zw, $zh, $w, $h);
		
	} else {
		imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $zw, $zh, $w, $h);
	}
	
	imagejpeg($dimg, $dest, 100);
	
}

?>