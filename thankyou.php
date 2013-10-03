<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> Richard Grainger
					-> Work for: ZOIK

/*	Date			-> 13 August 2013

/*	File			-> header.php

/*	Contact			-> mail@richardgrainger.com.au
				
/* 	Copyright (c)	-> Richard Grainger

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


// GET EVERYTHING WORKING //
include_once("includes/all.php");






	$select		= sql_pull($_GET['select']);
	$name		= sql_pull($_GET['name']);
	$new		= sql_pull($_GET['new']);
	
	
	if(!is_numeric($new) || !is_numeric($select)){ Header("Location: $gua_http"); exit; }
	
	
	
	$query = mysql_query("
		UPDATE fa_members
		SET m_payment_confirmed = '1' 
		WHERE m_id = '$new' AND m_flying_name = '$name' AND m_flying_crewtype = '$select'
		LIMIT 1
	");
	
	if(@mysql_affected_rows() > 0){
		$display = "
			<h1>Thank you $name!</h1>
			<p>Your donation is much appreciated.</p>
					";
	} else {
		$display = "
			<h1>Ahhh! Sorry $name!</h1>
			<p>Your donation confirmation wasn't updated in our databas.</p>
					";
	}




		
		

include_once("includes/header.php");

?>		
			
		<div class="wrapper">
			<div class="content">

				<?php echo $display; ?>
				
			</div>
		</div>

		
		<div class="footer_wrap">
			<div id="footer">

				<div class="copyright">
					<a href="#">Read about previous flights</a> |
					<a href="#">In Flight News</a> |
					<a href="#">2014 Flying Squad Members</a>
				</div>
				
			</div>
		</div>
	

<?php

include_once("includes/footer.php");

?>