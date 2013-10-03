<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	Date			-> 29 July 2013

/*	File			-> functions.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


//* oooooooooooooooooooooooooooooooooooooooooooooooooooo GLOBAL VARIABLES oooooooooooooooooooooooooooooooooooooooooooooooooooo *//

// restrictions in "ALLOW" //
$gua_admin		= 1;

// Display the time mod //
$gua_timedisp	= "jS \o\\f F, Y";

// image uploads //
$gua_qual		= 90;
$gua_width		= 800;
$gua_height		= 800; //floor($gua_width*0.75);
$gua_cropzoom	= 15; // 15% downsize to crop

// pagination //
$gua_plimit		= 10;
$gua_maxlinks	= 7;

// URLs //
$gua_name		= "Flying Arts"; // business name
$gua_email		= "info@flyingarts.org.au"; // main email
$gua_noreply	= "info@flyingarts.org.au"; // no reply email (from email)
$gua_http		= "http://flyingsquad.org.au/"; // home url
$gua_https		= "http://flyingsquad.org.au/"; // ssl home url
$gua_htta		= "http://flyingsquad.org.au/admin/"; // admin url
$gua_httas		= "http://flyingsquad.org.au/admin/"; // secure socket url

// extras //
$gua_timeout	= 60 * 20; // 20 minutes - not really in use //
$gua_cd			= 30; // days for cookie cooldown
$gua_cookieurl	= ".flyingsquad.org.au"; // domain for cookie
$gua_es			= "flyart13"; // salt
$gua_abb		= "flyart"; // admin session name
$gua_sesn		= "flyartsession"; // normal session name

// allow //
$gua_unrego		= 0;
$gua_rego		= 1;
$gua_locked		= 2;

// other //
$gua_paypal		= ""; // paypal username //



// extras //
ini_set("memory_limit","64M");






// connect to the database //
function connect(){
	$connection = mysql_connect('localhost', 'fly19090_fauser', '88TKus4vQT');			
	$db = mysql_select_db('fly19090_flyingarts', $connection) or die(mysql_error());	
	return $db;				
}

$this_page_path = $_SERVER['SCRIPT_NAME'];
$this_page = basename($this_page_path);

$root_dir = $_SERVER['DOCUMENT_ROOT'];



// display functions //
include_once("$root_dir/functions/display.php");






//* oooooooooooooooooooooooooooooooooooooooooooooooooooo INCLUDE ALL LIB FILES oooooooooooooooooooooooooooooooooooooooooooooooooooo *//
$loc = "$root_dir/functions/lib/";

if($handle = opendir($loc)) {

    while(false !== ($file = readdir($handle))){
	
		$ext = substr(strrchr($file, '.'), 1);
		
		if($ext != ""){
		
			include_once($loc.$file);
			
		}
        
    }

    closedir($handle);

}







//* oooooooooooooooooooooooooooooooooooooooooooooooooooo SHOPPING FUNCTIONS oooooooooooooooooooooooooooooooooooooooooooooooooooo *//

//include_once("$root_dir/functions/cart_functions.php");

//include_once("$root_dir/functions/cart_display.php");

//include_once("$root_dir/functions/cart_forms.php");





//* oooooooooooooooooooooooooooooooooooooooooooooooooooo EXTRA FUNCTIONS oooooooooooooooooooooooooooooooooooooooooooooooooooo *//

// If they entered data that should be going into an sql database, then make it more secure //
function sql_form($v){

	// if magic quotes are on, turn them off to use GOOD backslashes //
	if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){ $v = stripslashes($v); }
	
	// if the value has been set and it isn't a number, then escape the quotes //
	if($v != "" && !is_numeric($v)){ 
		$v = mysql_real_escape_string($v);
	}
	
	// remove the fatal query characters //
	//$v = str_replace(";", "", $v);
	
	// anything extra //
	$v = trim($v);
	
	return $v;

}

// Use this function to display information pulled  from the database //
function sql_pull($v){

	// remove any HTML and backslashes //
	$v = stripslashes($v);
	
	// if the value is NULL then display nothing //
	if($v == "NULL"){ $v = ""; }

	return $v;

}


// password salting //
function password($salt, $password){

	$es 			= sha1($salt.$password);
	$new_password 	= sha1($es.$password);
	
	return $new_password;

}


// error box //
function errorbox($errors){

	$errorbox = "
		<div class=\"error_box\">
		<div class=\"error_eb_t\"><div class=\"error_eb_b\"><div class=\"error_eb_l\"><div class=\"error_eb_r\"><div class=\"error_tl\"><div class=\"error_tr\"><div class=\"error_bl\"><div class=\"error_br\"><div class=\"text_pad\">
			$errors
		</div></div></div></div></div></div></div></div></div>
		</div>
				";
				
	return $errorbox;

}

?>