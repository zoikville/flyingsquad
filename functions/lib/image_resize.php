<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> image_resize.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// resize the image that was uploaded //
function image_resize($filelol, $source, $destination, $gua_width, $gua_height, $gua_qual){

	// Gather the height and width //
	list($width, $height) = getimagesize($filelol);
	
	$div_width = $width / $gua_width;
	$div_height = $height / $gua_height;
	
	// Now, if it is to large and needs to be resized, then do it //
	if($width > $gua_width || $height > $gua_height){
	
		if($div_width > $div_height){
		
			$new_width 	= $gua_width;
			$new_height	= ($height/$width) * $new_width;
			
		} else {
		
			$new_height = $gua_height;
			$new_width	= ($width/$height) * $new_height;
		
		}
		
		$temp_file	= imagecreatetruecolor($new_width, $new_height);
		
		// Now, we actaully recreate the image in its new size :) //
		imagecopyresampled($temp_file, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		// upload the file //
		imagejpeg($temp_file, $destination, $gua_qual);
	
	} else {
	
		// Dont worry about the resize, just upload it //
		move_uploaded_file($filelol, $destination);
	
	}
	
	// remove the leftover files //
	@imagedestroy($source); @imagedestroy($temp_file);

}
?>