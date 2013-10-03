<?php

// GET EVERYTHING WORKING //
include_once("includes/all.php");







function display_crew($amount){

	$query = mysql_query("SELECT * FROM fa_members WHERE m_flying_crewtype = '$amount' AND m_payment_confirmed = '1'");
	
	if(@mysql_num_rows($query) > 0){
	
		while($row = mysql_fetch_assoc($query)){
		
			$m_id			= sql_pull($row['m_id']);
			$m_flying_name	= sql_pull($row['m_flying_name']);
			$m_fb_id		= sql_pull($row['m_fb_id']);
			
			if($m_fb_id != 0){
				$img = "<img src=\"http://graph.facebook.com/$facebook_id/picture?type=square\" width=\"40\" />";
			} else {
				$img = "<img src=\"img/no-image.jpg\" width=\"40\" />";
			}
			
			$display .= "$img $m_flying_name<br />";
		
		}
		@mysql_free_result($query);
	
	} else {
		$display = "<p>n/a</p>";
	}
	
	return $display;

}







include_once("includes/header.php");

?>		
			
		<div class="wrapper-noimage">
			<div class="content">

			



				<h2 class="a_t_title" style="margin: 100px 0px 30px 0px;">2014 Flying Squad Members</h2>

						
				<table width="100%" border="0" cellpadding="10" class="squadmembers">
				  <tr>
					<td valign="top" width="20%">
					
						<h4>Ground Crew</h4><br />	
						<?php echo display_crew(25); ?>
					
					</td>
					<td valign="top" width="20%">
					
						<h4>Flight Crew</h4><br />
						<?php echo display_crew(50); ?>
					
					</td>
					<td valign="top" width="20%">
					
						<h4>Co-Pilot</h4><br />
						<?php echo display_crew(150); ?>
					
					</td>
					<td valign="top" width="20%">
					
						<h4>Pilot</h4><br />
						<?php echo display_crew(200); ?>
					
					</td>
					<td valign="top" width="20%">	
					
						<h4>Flight Captain</h4><br />
						<?php echo display_crew(500); ?>
					
					</td>
				  </tr>
				</table>



        
        
       
		
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