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










	// get fb userid //
	$facebook_id = $facebook->getUser();
	
	
	// BECOME A MEMBER VIA FACEBOOK - FB HAS APPROVED AND GIVEN US THEIR USER ID //
	if($facebook_id != "" && $facebook_id != 0 && !is_numeric($_SESSION[$gua_sesn]['allow'])){
	
		$facebook_account = true;
		
		$fb_profile = $facebook->api('/me', 'GET');
		
		$m_fname		= $fb_profile['first_name'];
		$m_lname		= $fb_profile['last_name'];
		$m_email		= $fb_profile['email'];
		$m_fb_id		= $facebook_id;
		
		/*
		$fb_profile_img	= "<img src=\"http://graph.facebook.com/$facebook_id/picture?type=square\" />";
		*/
		
	} else {
	
		$facebook_account = false;
	
	}
	
	




		
	
		
		

include_once("includes/header.php");

?>		
			
		<div class="wrapper">
			<div class="content">

				<div id="area_t" class="area_t">
					<h2 class="a_t_title">Flying Arts needs your help to stay in the air</h2>
					<p>Join the <a href="#">Flying Arts Alliance Flying Squad</a> and help us to continue to deliver our arts services to artists, schools and communities around Queensland.</p>
					<p>Choose a crew position to make your donation. Not sure? Read more about our <a href="">Giving Program</a></p>
					<div class="plane"><span class="atjs plane_bg"></span><span class="plane_hover"></span></div>
					<div class="cloud_gc"><span class="atjs cloud_gc_bg"></span><span class="cloud_gc_hover"><a href="#">Donate $25</a></span></div>
					<div class="cloud_fc"><span class="atjs cloud_fc_bg"></span><span class="cloud_fc_hover"><a href="#">Donate $50</a></span></div>
					<div class="cloud_cp"><span class="atjs cloud_cp_bg"></span><span class="cloud_cp_hover"><a href="#">Donate $150</a></span></div>
					<div class="cloud_p"><span class="atjs cloud_p_bg"></span><span class="cloud_p_hover"><a href="#">Donate $200</a></span></div>
					<div class="cloud_fcn"><span class="atjs cloud_fcn_bg"></span><span class="cloud_fcn_hover"><a href="#">Donate $500</a></span></div>
				</div>

				<div id="area_m" class="area_m">
					<a id="Destination"></a><h2 class="a_m_title">Our Destination</h2>
					<p>You can help us to continue to make a real difference in Queensland by joining the Flying Squad. All donations go directly to support the chosen destination for each year.</p>
					<p>
						<strong>Our Destination for 2014 is: $10,000 for the <a href="">Education & Young People Program</a></strong>
					</p>
					<span id="photo1"></span>
					<span id="photo2"></span>
				</div>

				<div class="area_b">
					<div class="a_b_l">
						<p>Flying Arts is a not for profit arts and cultural development organisation. It receives some support from the Queensland Government through Arts Queensland augmented by corporate partners and sponsors, philanthropic benefactors and donors and supporters. </p>
					</div>
					<div class="a_b_r">
						<p>Flying Arts delivers a wide range of services to artists, teachers, students, young people and community groups including workshops, residencies, exhibitions, events and projects. 
Find out more about the <a href="#">Flying Arts annual program here</a>.</p>
					</div>
					<div class="clear"></div>
				</div>

				<span class="airport-flag"></span>
			</div>
		</div>

		
		<div class="footer_wrap">
			<div id="footer">
				<div class="join">
					<div class="join_l">
						<a id="Squad"></a><h2 class="join_l_title">Join the Flying Squad.<br />Sign up here. </h2>
						<p>Your gift will support our Artist in Schools program and enable us to deliver cost effective arts services to primary.  Did we also mention your donation is 100% tax deductible?</p>
						<p>Flying Arts Alliance Inc. is listed in the Registration of Cultural Organisations and has Deductible Gift Recipient
and Tax Charity Concession status. Donations to Flying Arts Alliance Inc and the Art4Life Fund can be tax deductible.</p>
					</div>
					
					<script type="text/javascript">
					function checkform(f){
						if (f.elements['fc_name'].value == "" || f.elements['fc_name'].value == "create your flying name:"){
							alert("Please choose a flying name.");
							return false;
						} else {
							f.submit();
							return false;
						}
					}
					</script>
					
					<form name="join" action="form_sort.php" method="post" onSubmit="return checkform(this); return false;">
					<div class="join_r">
						<div class="fc_select">
							<select id="fc_select" name="fc_select">
								<option value="1">Ground Crew: $25</option>
								<option value="50">Flight Crew: $50</option>
								<option value="150">Co-Pilot: $150</option>
								<option value="200">Pilot: $200</option>
								<option value="500">Flight Captain: $500</option>
							</select>
							<span class="fc_select_jt"></span>
						</div>
						<p class="flying_name"><input type="text" value="create your flying name:" name="fc_name" id="fc_name" onfocus="this.value = this.value == this.defaultValue ? '' : this.value" onblur="this.value = this.value == '' ? this.defaultValue : this.value" /></p>
						<p class="jrbz1">Type in your real name or a pseudonym to appear on our flight wall.</p>
						<p class="donate_button"><input type="submit" name="submit"  class="facebut" value="donate with your Facebook account" /><!--<a href="">donate with your Facebook account</a>--></p>
						<p class="jrbz2">- or  signup with your email address</p>
						<p class="join_button"><input type="submit" name="submit" class="joinme" value="Join" /><!--<a href="#">Join</a>--></p>
					</div>
					</form>
					
					<div class="clear"></div>
				</div>

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