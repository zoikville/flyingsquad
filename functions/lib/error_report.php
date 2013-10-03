<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> error_report.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// remove http from string //
function error_report($error, $gua_email, $gua_noreply, $gua_name, $root_dir){
	
	// email to tell someone this has been done //
	ob_start();
	require_once("$root_dir/emailing/error_report.php");
	$web_email = ob_get_clean();
	
	// Enable HTML //
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: $gua_noreply <$gua_noreply>\r\n";	
	$headers .= "X-Mailer: php\r\n";
	
	$subject = "$gua_name Error Report\r\n";
	$replymail = "$web_email\r\n";
	
	$mailed = mail($gua_email, $subject, $replymail, $headers);
	
	return $mailed;
	
}

?>