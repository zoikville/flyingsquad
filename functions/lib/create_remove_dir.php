<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> create_remove_dir.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

// create directory //
function create_dir($dir, $chmod=0755){
	
	if(substr($dir, -1) == "/"){ $dir = substr($dir, 0, -1); }
	
	if(mkdir($dir, $chmod)){
		$output = "<br />Directory ($dir) has been created.";
	} else {
		$output = "<br />Could not create directory ($dir).";
	}
	
	return $output;
	
}

// remove dirs and its files //
function remove_dir($dir, $empty=false){

	if(substr($dir, -1) == "/"){ $dir = substr($dir, 0, -1); }
	// don't need $directory?? // if(substr($dir, -1) == "/"){ $directory = substr($dir, 0, -1); }
	
	if(is_dir($dir) || file_exists($dir)){
	
		if($handle = opendir($dir)){
			while(false !== ($filename = readdir($handle))){	
				if($filename != "." && $filename != ".."){
					$new = $dir."/".$filename;
					if(is_dir($new)){
						remove_dir($new);
					} else {
						unlink($new);
					}
				}
			}
			closedir($handle);
		}
		
		if($empty == false){
			rmdir($dir);
			$output = "<br />Directory and files removed.";
		}
	
	}
	
	return $output;

}

?>