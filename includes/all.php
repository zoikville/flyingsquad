<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	Date			-> 29 April 2010

/*	File			-> all.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */



// GET ALL THE FUNCTINOS WORKING FIRST OF ALL //
include_once($_SERVER['DOCUMENT_ROOT']."/functions/functions.php"); connect();
include_once($_SERVER['DOCUMENT_ROOT']."/includes/facebook.php"); // must go above sessions.php because it is used in session.php
include_once($_SERVER['DOCUMENT_ROOT']."/includes/sessions.php");



// if they have started shopping //
if($_SESSION[$gua_sesn]['cart'] && array_count_values($_SESSION[$gua_sesn]['cart'])){
	$shopping_set = 1;
} else {
	// GIVE EVERYONE CART //
	$_SESSION[$gua_sesn]['cart']	= array();
	$_SESSION[$gua_sesn]['items']	= 0;
	$_SESSION[$gua_sesn]['price']	= 0.00;
}




// record references from affiliated links //
/*
$ref_from = sql_form($_GET['ref_from']);	
$rf = sql_form($_GET['rf']);	
if($ref_from != "" || $rf != ""){
	if($rf != ""){ $ref_from = $rf; }
	@mysql_query("
		INSERT INTO rgp_references
		(ref_id, ref_from, ref_date)
		VALUES
		('', '$ref_from', '" .timeto(time()) ."')
	");	
}
*/
?>