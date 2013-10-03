<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> upload_zip.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// upload and extract a zip file //
function upload_zip($zip_file, $dir){

	if(isset($zip_file)){
	
		$file = $zip_file['name'];
		$file = str_replace(" ", "_", $file);
		$file = preg_replace("/[^a-zA-Z0-9._-]/", "", $file);
		
		
		// remove directory and all its files //
		@include_once("remove_dir.php");
		if(is_dir($dir)){ remove_dir($dir); @rmdir($dir); }
		
		if(!is_dir($dir)){ $mkdir_result = mkdir($dir, 0755); }
		
		if($mkdir_result){
		
			$destination = "$dir/$file";
			$upload_result = move_uploaded_file($zip_file['tmp_name'], $destination);
			
			if(file_exists($destination)){
			
				$uploaded = "<br />ZIP uploaded successfully.";
				
				$zip = zip_open($destination);
				if(is_resource($zip)){
				
					while($zip_entry = zip_read($zip)){
					
						if(zip_entry_name($zip_entry)){
						
							$filename = zip_entry_name($zip_entry);							
							$ext = substr(strrchr($filename, '.'), 1);
							
							if($ext == ""){
								mkdir("$dir/"."$filename");
							} else {

								$fp = fopen("$dir/".$filename, "w");
								if(zip_entry_open($zip, $zip_entry, "r")){
									$writethis = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));								
									fwrite($fp,"$writethis");
									zip_entry_close($zip_entry);
									fclose($fp);
								}

							}

						}
					
					}

				}

			} else {
				$uploaded = "<br />ZIP could not upload.";
			}
		
		} else {
			$uploaded = "<br />Could not create directory and could not upload ZIP.";
		}
	
	}
	
	return $uploaded;
				
}

?>