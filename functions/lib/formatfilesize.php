<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> formatfilesize.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


function formatfilesize($file){

	$size = filesize($file);
	
	$calc_kb = $size * .0009765625;
	$calc_mb = ($size * .0009765625) * .0009765625;
	$calc_gb = (($size * .0009765625) * .0009765625) * .0009765625;
	
	if($calc_kb <= 1024 && empty($type)){ $type = "KB"; }
	if($calc_mb <= 1024 && empty($type)){ $type = "MB"; }
	if($calc_gb <= 1024 && empty($type)){ $type = "GB"; }
	
    switch($type){   
        case "KB" : $filesize = $calc_kb; break;   
        case "MB" : $filesize = $calc_mb; break;   
        case "GB" : $filesize = $calc_gb; break;   
    }
	
    if(!is_numeric($filesize) || $filesize == 0){
        return 0;
	} else {
		return round($filesize, 2)." $type";
	}

}

?>