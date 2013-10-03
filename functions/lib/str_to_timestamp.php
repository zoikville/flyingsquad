<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> str_to_timestamp.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// convert a date to a timestamp //
function str_to_timestamp($date){

	// must be dd/mm/yyyy

	$date = explode("/", $date);	
	list($day, $month, $year) = $date;
	
	return mktime(0, 0, 0, $month, $day, $year);

}

?>