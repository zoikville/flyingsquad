<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> first_chars.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// select only X amount of characters to display //
function first_chars($str, $count, $trail=true){

	if($trail == true){ $trailing_dots = " ..."; } else { unset($trailing_dots); }

	return strlen($str) > $count ? substr($str, 0, $count) .$trailing_dots : $str;
	
}


// select only X amount of words to display //
function first_words($str, $count, $trail=true){

	if($trail == true){ $trailing_dots = " ..."; } else { unset($trailing_dots); }

	if(strlen($str) > 2){
	
		$words = str_word_count($str, 2);
		$firstwords = array_slice($words, 0, $count);
		return  implode(' ', $firstwords) .$trailing_dots;
	
	} else {
	
		return $str;
	
	}
	
}

?>