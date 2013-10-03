<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> timerich.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// convert a time stamp to a backwards date stamp //
function timeto($time) {
	
	$date = date('d/m/Y', $time);
	
	list($d, $m, $y) = explode("/", $date);
	
	return "$y$m$d";
	
}


// convert a user entered date (dd/mm/yyyy) to a backwards date stamp //
function timetouser($time) {
	
	$time = str_replace("/", "", $time);
	
	$d = substr($time, 0, 2);
	$m = substr($time, -6, 2);
	$y = substr($time, -4, 4);	
		
	return "$y$m$d";
	
}


// convert the backwards date to normal d/m/Y //
function timefrom($date) {

	$day_fix	= substr($date, -2, 2);
	$month_fix	= substr($date, -4, 2);
	$year_fix	= substr($date, 0, 4);
	
	return "$day_fix/$month_fix/$year_fix";
	
}


// convert backwards date to a standard timestamp //
function richtimetotimestamp($richtime){

	list($d, $m, $y) = explode("/", timefrom($richtime));
	$val = strtotime("$y-$m-$d"); // strtotime needs to be backwards to convert to timestamp
	
	return $val;

}

?>