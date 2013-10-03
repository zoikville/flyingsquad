<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> files_from_folder.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// pull all the files from the folder except index.php //
function files_from_folder($this_page, $loc, $type = 0){
	
	/*
	0 - everything
	1 - files only
	2 - folders only
	*/

	if(!is_dir($loc)){ return "<p>Folder does not exist.</p>"; exit; }
	
	if($handle = opendir($loc)) {
	
		while(false !== ($file = readdir($handle))){
			
			$ext = substr(strrchr($file, '.'), 1);
			
			if($file != "." && $file != ".."){
			
				if($type == 0){
					$image_files[] = $file;
				} else if($type == 1 && $ext != ""){
					$image_files[] = $file;
				} else if($type == 2 && $ext == ""){
					$image_files[] = $file;
				}
			
			}
			
		}

		closedir($handle);

	}

	@natsort($image_files);
	
	return $image_files;

}

?>