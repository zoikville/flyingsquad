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





	$select		= sql_pull($_GET['select']);
	$name		= sql_pull($_GET['name']);
	$new		= sql_pull($_GET['new']);
	
	
	if(!is_numeric($new) || !is_numeric($select)){ Header("Location: $gua_http"); exit; }
	
	
	// extract data from database to send to paypal
	$query = mysql_query("SELECT * FROM fa_members WHERE m_id = '$new' LIMIT 1");
	$count = @mysql_num_rows($query);
	
	if($count > 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$m_fname			= sql_pull($row['m_fname']);
			$m_lname			= sql_pull($row['m_lname']);
			$m_address_1		= sql_pull($row['m_address_1']);
			$m_address_2		= sql_pull($row['m_address_2']);
			$m_city				= sql_pull($row['m_city']);
			$m_state			= sql_pull($row['m_state']);
			$m_postcode			= sql_pull($row['m_postcode']);
			$m_number			= sql_pull($row['m_number']);
			$m_email			= sql_pull($row['m_email']);
			
		}
		@mysql_free_result($query);
	
	} else {
		Header("Location: $gua_http"); exit;
	}
	
	
	
	
	// Prepare GET data
    $query = array();
	
    $query['cmd']			= "_cart";
    $query['currency_code']	= "AUD";
    $query['upload']		= "1";
	
    $query['business']		= "info@flyingarts.org.au";
    $query['return']		= $gua_http ."thankyou/$new/$select/$name";
    $query['cancel_return']	= $gua_http;
	
    $query['first_name']	= $m_fname;
    $query['last_name']		= $m_lname;
    $query['email']			= $m_email;
    $query['night_phone_b']	= $m_number; // weird name for mobile
    $query['address1']		= $m_address_1;
    $query['address2']		= $m_address_2;
    $query['city']			= $m_city;
    $query['state']			= $m_state;
    $query['zip']			= $m_postcode;
	$query['country']		= "AU";
	
    $query['item_name_1']	= "Flying Arts Donation";
    $query['quantity_1']	= 1;
    $query['amount_1']		= $select .".00";

    // Prepare query string
    $query_string = http_build_query($query);

	header("Location: https://www.paypal.com/cgi-bin/webscr?" . $query_string);

?>