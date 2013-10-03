<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> image_fit.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// set the image to fit in a box //
function image_fit($pimage_src, $title, $max_height, $max_width, $class, $begindir=false, $lazyload=NULL, $extras=NULL){

	$image_loc = $pimage_src;

	if($class != ""){ $class = " class=\"$class\""; } else { unset($class); }
	
	// Gather the height and width //
	list($width, $height) = getimagesize($image_loc);
	
	$div_width = $width / $max_width;
	$div_height = $height / $max_height;
	
	if($begindir == true){ $image_loc = "/".$pimage_src; }
	if($lazyload != ""){ $img_extra = " data-original=\"$image_loc\""; $image_loc = $lazyload; } // for lazy load //
	
	if($div_width > $div_height){
		$image = "<img src=\"$image_loc\"$img_extra width=\"$max_width\" border=\"0\"$class alt=\"$title\"$extras />";
	} else {
		$image = "<img src=\"$image_loc\"$img_extra height=\"$max_height\" border=\"0\"$class alt=\"$title\"$extras />";
	}	
	
	// what if its just simply to small //
	if(($height < $max_height) && ($width < $max_width)){
		$image = "<img src=\"$image_loc\"$img_extra height=\"$height\" width=\"$width\" border=\"0\"$class alt=\"$title\"$extras />";
	}
	
	return $image;

}

?>