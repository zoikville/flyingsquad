<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> sort_by.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

// use this when wanting to change the order by clicking a link //
function sort_by($original, $sortby, $asc, $gua_sesn, $this_page){

	$sortby			= sql_form($sortby);
	$asc			= sql_form($asc);						
	
	if($sortby != ""){ $_SESSION[$gua_sesn][$this_page]['sortby'] = $sortby; }
	if($asc != ""){ $_SESSION[$gua_sesn][$this_page]['asc'] = $asc; }						
	
	$sesn_sortby	= $_SESSION[$gua_sesn][$this_page]['sortby'];
	$sesn_asc		= $_SESSION[$gua_sesn][$this_page]['asc'];						
	
	switch($sesn_asc){
		case ""		: $asc_other = "ASC"; break;
		case "ASC"	: $asc_other = "DESC"; break;
		case "DESC"	: $asc_other = "ASC"; break;
	}
	
	if($sesn_sortby != "" || $sesn_asc != ""){								
		$sql_sort = "ORDER BY $sesn_sortby $sesn_asc";							
	} else {								
		$sql_sort = "ORDER BY $original";								
	}
	
	return array($sql_sort, $asc_other);

}

?>