<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> Richard Grainger
					-> Work for: ZOIK

/*	Date			-> 29 July 2013

/*	File			-> header.php

/*	Contact			-> mail@richardgrainger.com.au
				
/* 	Copyright (c)	-> Richard Grainger

/* oooooooooooooooooooooooooooooooooooooooooooooooo */



	// page titles //
	$ptd = "Flight Squad";
	
	$page_array = array(
		"index.php" =>					array("Home | $ptd", "welcome, home", "home page"),
						);
	
	// put the array data into variables //
	if(isset($page_array[$this_page])){	
		$headerinfo = $page_array[$this_page][0];
		$hi_kw = $page_array[$this_page][1];
		$hi_d = $page_array[$this_page][2];	
	}

	
	
	
	
	
	
	// so it joins the keyword and description nicley //
	if($headerinfo != ""){ $headerinfo .= " "; }
	if($hi_kw != ""){ $hi_kw .= ", "; }
	if($hi_d != ""){ $hi_d .= ". "; }
	
	// if the header info is still equal to nothing, then give it the basics //
	if($headerinfo == ""){ $headerinfo = $ptd; }
	
	// facebook missing //
	if($fb_type == ""){ $fb_type = "website"; }
	if($fb_title == ""){ $fb_title = $ptd; }
	if($fb_url == ""){ $fb_url = "$gua_http"; }
	if($fb_desc == ""){ $fb_desc = "Flying arts Facebook description goes here"; }
	if($fb_img == ""){ $fb_img = "$gua_http/"."img/fb_img.jpg"; }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $headerinfo; ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="style.css" />
	<meta name="viewport" content="width=device-width"/>
	<script type='text/javascript' src='js/jquery.js'></script>
	<script type='text/javascript' src='js/fs.js'></script>
	
	<meta property="og:site_name" content="Camper Coupons" />
	<meta property="og:type" content="<?php echo $fb_type; ?>" />
	<meta property="og:title" content="<?php echo $fb_title; ?>" />
	<meta property="og:url" content="<?php echo $fb_url; ?>" />
	<meta property="og:description" content="<?php echo $fb_desc; ?>" />
	<meta property="og:image" content="<?php echo $fb_img; ?>" />
	<meta property="fb:admins" content="580255286,737739503" />
	<meta property="fb:app_id" content="187017014808046" />
	
</head>
<body>
	<div id="main" class="main">
		<div id="header">
			<h1 class="site_title"><a href="/">Come Fly with Flying Arts Alliance in 2014</a></h1>
			<div class="navi">
				<ul>
					<li><a href="#Help">donate<br />now</a></li>
					<li><a href="#Destination">our<br />destination</a></li>
					<li><a href="#Squad">squad<br />members</a></li>
					<li><a href="http://www.flyingarts.org.au">FAA<br />website</a></li>
				</ul>
			</div>
		</div>