<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> strpos_array.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

// check if string contains a string from an array //
function strpos_array($h, $n=array(), $begin=0){

	$temp_array = array();
	
	foreach($n as $var){
		$result = @strpos($h, $var, $begin);
		if($result !== false){ $temp_array[$var] = $result; }
	}
	
	if(empty($temp_array)){ return false; }
	
	return min($temp_array);

}