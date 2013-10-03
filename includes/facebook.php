<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> Richard Grainger
					-> Work for: ZOIK

/*	Date			-> 14 August 2013

/*	File			-> facebook.php

/*	Contact			-> mail@richardgrainger.com.au
				
/* 	Copyright (c)	-> Richard Grainger

/* oooooooooooooooooooooooooooooooooooooooooooooooo */



	require_once("$root_dir/facebook-sdk/src/facebook.php");

	$config = array();
	$config['appId'] = '202998203212244';
	$config['secret'] = '1f4c1f67474c74f42cf4cfb102eb3d81';

	$facebook = new Facebook($config);

	$fb_params = array(
	  'scope' => 'email, publish_stream, status_update, read_stream, friends_likes',
	  'redirect_uri' => 'http://zoik.com.au/-clients-/flyingsquad/?fb=1'
	);

?>