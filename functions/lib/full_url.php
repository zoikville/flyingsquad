<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> full_url.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


/*
I WOULD LIKE TO GIVE CREDIT
These 2 functions where taken from Johan Känngård website, located at http://dev.kanngard.net/Permalinks/ID_20050507183447.html
*/



// Get the full URL address //
function full_url($clean_url=false){

	$s = empty($_SERVER["HTTPS"]) ? ''
		: ($_SERVER["HTTPS"] == "on") ? "s"
		: "";
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
		: (":".$_SERVER["SERVER_PORT"]);
		
	$full_url = $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	
	// clean URL = true means ignoring everything after the first ? (question mark) //
	if($clean_url == true){
		$full_url_cleaned = substr($full_url, 0, strpos($full_url, "?"));
		if($full_url_cleaned == ""){ $full_url_cleaned = $full_url; }
		return $full_url_cleaned;
	} else {
		return $full_url;
	}
	
}

function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}

?>