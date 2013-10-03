<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> money.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

// this is used when users are able to enter a money amount - make sure it is only numbers and full stop //
function fix_money($var){

	$var = preg_replace("/[^0-9.]/","", $var); 
	if($var == ""){ $var = number_format("000", 2, '.', ''); } else { $var = number_format($var, 2, '.', ''); }
	
	return $var;
		
}

// display numbers and a fullstop only - this is used when calculating //
function work_money($var){ return number_format($var, 2, '.', ''); }

// display money using a comma etc - cant be used when using this variable to calculate //
function disp_money($var){ return number_format($var, 2, '.', ','); }

?>