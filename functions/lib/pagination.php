<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> www.mezmamedia.com
					-> Richie Grainger

/*	File			-> pagination.php

/*	Contact			-> www.mezmamedia.com
					-> richie@mezmamedia.com
				
/* 	Copyright (c)	-> Mezma Media

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// create pagination //
// mainly for database querys, but can also cater for an array which is stored in $query_text //
function pagination($gua_plimit, $gua_maxlinks, $query_text, $total_rows, $pagenumber, $this_page){

	if($total_rows > $gua_plimit){

		// set the limit required //
		$limit = $gua_plimit;
		
		$extra_class = " class=\"page\""; // style for links and strong //
		
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
		if($total_pages >= $gua_maxlinks){
			
			// create the middle links //
			$min = $page - floor(($gua_maxlinks-3)/2);
			$max = $page + ceil(($gua_maxlinks-3)/2);
			
			// if the minimum page is less than 1 //
			if($min <= 1){
				$min = 1;
				$max = $gua_maxlinks-1;
			}
			
			// if max range is further than the last page //
			if($max >= $total_pages){
				$min = $total_pages-($gua_maxlinks-2);
				$max = $total_pages;
			}
			
			if($min > 1){ $page_numbers .= "<a href=\"$plinks"."1\"$extra_class>1</a> "; }
			if($min > 2){ $page_numbers .= "... "; }
			
			for($x=$min; $x<=$max; $x++){
				if($x == $page){
					$current_page = "$x";
					$page_numbers .= "<strong$extra_class>$x</strong> ";
				} else {
					$page_numbers .= "<a href=\"$plinks$x\"$extra_class>$x</a> ";
				}
			}
			
			if($max < $total_pages-1){ $page_numbers .= "... "; }
			if($max < $total_pages){ $page_numbers .= "<a href=\"$plinks$total_pages\"$extra_class>$total_pages</a> "; }
		
		} else {
		
			for($x=1; $x<=$total_pages; $x++){
				if($x == $page){
					$current_page = "$x";
					$page_numbers .= "<strong$extra_class>$x</strong> ";
				} else {
					$page_numbers .= "<a href=\"$plinks$x\"$extra_class>$x</a> ";
				}
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
			$pagination =	"<a href=\"$prev_link\"$extra_class>&laquo;</a> &nbsp; $page_numbers&nbsp; <a href=\"$next_link\"$extra_class>&raquo;</a>";
		}

	}
	
	return array($pagination, $query);

}

?>