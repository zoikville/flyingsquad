<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> pagination.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*
THE ONLY DIFFERENCE IN PAGINATION ADMIN IS THAT THE STYLE/LOOKS IS DIFFERENT FOR ZOIKS VIP PLUS WEBSITE
*/


// create pagination //
// mainly for database querys, but can also cater for an array which is stored in $query_text //
function pagination_admin($gua_plimit, $gua_maxlinks, $query_text, $total_rows, $pagenumber, $this_page){

	if($total_rows > $gua_plimit){

		// set the limit required //
		$limit = $gua_plimit;
		
		$min_page = 1;
		
		$page = $pagenumber; //$pagenumber is only for this function
		//$page = sql_form($_GET['page']);
		
		if(empty($page) || (is_numeric($page) == FALSE) || ($page < $min_page) || ($page > $total_rows)){
			$page = $min_page; // DEFAULT PAGE! //
		}
		
		// Use the above variables to make the new query //
		$total_pages = ceil($total_rows / $limit);
		// make sure that they dont even a number larger then the total possible pages //
		if($page > $total_pages){ $page = $total_pages; }
		// find the rows that need to be extracted //
		$begin_row = $page * $limit - ($limit);

		if(is_array($query_text)){
			$query = array_slice($query_text, $begin_row, $limit);		
		} else {
			$query = mysql_query("
				$query_text
				LIMIT $begin_row, $limit
								");	
		}
		
		// Items to figure out prev and next buttons //
		$prev_page = $page - 1;
		$next_page = $page + 1;
		
		// leave the end page blank becuase it gets sorted below //
		$plinks = "$this_page";//."?page=";
		
		
		// Decide how the prev link will work //
		if($prev_page >= 1){
			$prev_link = "$plinks$prev_page";
		} else {
			$prev_link = "$plinks$min_page";
		}
		
		// Go over the numbers in the middle //
		$page_numbers = "";
		
		for($x=1; $x<=$total_pages; $x++){
			if($x == $page){
				$page_numbers .= "<li class=\"active\"><a href=\"$plinks$x\">$x</a></li>";
			} else {
				$page_numbers .= "<li><a href=\"$plinks$x\">$x</a></li>";
			}
		}
		
		$x=$x-1;
		
		// Decide how the next link will work //
		if($next_page <= $total_pages){
			$next_link = "$plinks$next_page";
		} else {
			$next_link = "$plinks$x";
		}
		
		// the final product of pagination //
		if($total_pages > 1){
			$pagination =	"
				<div class=\"pagination\">
				  <ul class=\"pagination\">
				    <li><a href=\"$prev_link\">&laquo;</a></li>
					$page_numbers
					<li><a href=\"$next_link\">&raquo;</a></li>
				  </ul>
				</div>";
		}

	}
	
	return array($pagination, $query);

}

?>