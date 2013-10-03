<html>

 <head>
 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 
	<style type="text/css">
	<!--
	body {
	
		text-align: left;
		vertical-align: top;
	
		height: 100%;
				
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		margin-bottom: 0px;
						
		font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #333333; line-height: 18px;	
						
	}
	
	.text_main { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #333333; line-height: 18px; }
	
	.text_welcome {  font-size: 14px; font-weight: bold;}
	
	.i { font-style: italic; }
	
	td.textarea { text-align: left; vertical-align: top; }
	-->
	</style>

 </head>
 <body>
 
 
	<table width="100%" border="0" cellspacing="5" cellpadding="5">
	  <tr>
		<td class="textarea"><span class="text_main">
		
			<p>
			Offer a deal form has been submitted.
			</p>
			
			<p>
			<strong>Business name:</strong> <?php echo $od_business; ?><br />
			<strong>Contact name:</strong> <?php echo $od_contact; ?><br />
			<strong>Contact number:</strong> <?php echo $od_contactnumber; ?><br />
			<strong>Contact email:</strong> <?php echo $od_email; ?>
			</p>
			
			<p>
			<strong>Offer</strong><br />
			<?php echo $od_product; ?>
			</p>
			
		
		</span></td>
	  </tr>
	</table>

					
  </body>
 
</html>