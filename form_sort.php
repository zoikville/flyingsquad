<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> Richard Grainger
					-> Work for: ZOIK

/*	Date			-> 13 August 2013

/*	File			-> header.php

/*	Contact			-> mail@richardgrainger.com.au
				
/* 	Copyright (c)	-> Richard Grainger

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// GET EVERYTHING WORKING //
include_once("includes/all.php");





	$fc_select		= sql_pull($_POST['fc_select']);
	$fc_name		= sql_pull($_POST['fc_name']);
	
	
	if($_POST['submit'] == "donate with your Facebook account"){
	
		$fb_params = array(
		  "scope" => "email, read_stream, friends_likes",
		  "redirect_uri" => "$gua_http"."form.php?select=$fc_select&name=$fc_name&fb=1"
		);
		
		Header("Location: " .$facebook->getLoginUrl($fb_params) ); exit;
		
	} else if ($_POST['submit'] == "Join"){
		Header("Location: form.php?select=$fc_select&name=$fc_name"); exit;
	} else {
		Header("Location: index.php"); exit;
	}


	
	

?>		