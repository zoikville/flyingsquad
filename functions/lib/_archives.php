<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> _archives.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

// months //
function months($month){

	$months = array(
		"01" => "January", 
		"02" => "February", 
		"03" => "March", 
		"04" => "April", 
		"05" => "May", 
		"06" => "June", 
		"07" => "July", 
		"08" => "August", 
		"09" => "September", 
		"10" => "October", 
		"11" => "November", 
		"12" => "December"
	);
	
	return $months[$month];

}


// find the years and months that blog articles have been posted //
function archives($db, $col){
	
	$query = mysql_query("SELECT $col FROM $db ORDER BY $col ASC");
	$count = @mysql_num_rows($query);
	
	if($count > 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$time = sql_pull($row[$col]);
			
			list($day, $month, $year) = explode("/", timefrom($time));
			
			if(is_numeric($year) && $year != ""){ $years[$year] = $year; }
		
		}
		@mysql_free_result($query);
		
		$years = array_reverse($years); // make it so the  latest years are at the top

		foreach($years as $val){
		
			$query = mysql_query("SELECT $col FROM $db WHERE $col LIKE '$val%' ORDER BY $col ASC");
			$count = @mysql_num_rows($query);
			
			if($count > 0){
	
				while($row = mysql_fetch_assoc($query)){
				
					$time = sql_pull($row[$col]);
					
					list($day, $month, $year) = explode("/", timefrom($time));
					
					if(strpos($archived_string, $month) === false){
						$archived_string .= "$month,";
					}
				
				}
				@mysql_free_result($query);
				
			}
			
			$archived[$val] = substr("$val|$archived_string", 0, -1);
			
			unset($archived_string);
		
		}
		
		return $archived;
		
	
	} else {
		return "Nothing in Archives.";
	}

}

?>