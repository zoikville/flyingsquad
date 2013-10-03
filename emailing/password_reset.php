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
		
			<span class="text_welcome">Hello</span><br /><br />
			
			Your password has been successful reset to <strong><?php echo $newpass; ?></strong>. Please login straight away and update your password.<br /><br />
			
			Please do not share this password or your new password with anyone and keep it in a safe place.<br /><br />
	
			<span class="i">If you did not request this password reset (Submitted by IP: <?php echo getip(); ?>), please notify us immediately at 
			<a href="<?php echo $gua_http; ?>contact" target="_blank"><?php echo $gua_http; ?>contact</a></span><br /><br /><br />	
	
	
			Kind regards,<br />	
			<?php echo $gua_name; ?>
		
		</span></td>
	  </tr>
	</table>

					
  </body>
 
</html>