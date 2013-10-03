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
	
	
	
	
	
	
	
	// allowed amounts //
	$amounts_allowed = array(1, 25, 50, 150, 200, 500);
	
	// if an amount not in the array is selected, auto put them on the lowest amount
	if(!in_array($select, $amounts_allowed)){
		$select = $amounts_allowed[0];
	}
	
	
	
	
	
	
	
	
	// get fb userid //
	$facebook_id = $facebook->getUser();
	
	
	// BECOME A MEMBER VIA FACEBOOK - FB HAS APPROVED AND GIVEN US THEIR USER ID //
	if($facebook_id != "" && $facebook_id != 0){
	
		$facebook_account = true;
		
		$fb_profile = $facebook->api('/me', 'GET');

		$first_name		= $fb_profile['first_name'];
		$last_name		= $fb_profile['last_name'];
		$email			= $fb_profile['email'];
		$m_fb_id		= $facebook_id;
		
		$fb_profile_img	= "<img src=\"http://graph.facebook.com/$facebook_id/picture?type=square\" />";
		
	} else {
	
		$facebook_account = false;
	
	}
	
	
	
	
	
	
	
	
	
	if($_POST['submit']){
	
		$your_title			= sql_form($_POST['your_title']);
		$first_name			= sql_form($_POST['first_name']);
		$last_name			= sql_form($_POST['last_name']);
		$address_1			= sql_form($_POST['address_1']);
		$address_2			= sql_form($_POST['address_2']);
		$city				= sql_form($_POST['city']);
		$region				= sql_form($_POST['region']);
		$state				= sql_form($_POST['state']);
		$postcode			= sql_form($_POST['postcode']);
		$number				= sql_form($_POST['number']);
		$email				= sql_form($_POST['email']);
		$email_confirm		= sql_form($_POST['email_confirm']);
		$love				= sql_form($_POST['love']);
		
		
		
		
		$selected = "selected=\"selected\" ";
		
		switch($your_title){
			case	""		:	$your_title_disp[0] = $selected; break;
			case	"Mr"	:	$your_title_disp["Mr"] = $selected; break;
			case	"Mrs"	:	$your_title_disp["Mrs"] = $selected; break;
			case	"Ms"	:	$your_title_disp["Ms"] = $selected; break;
		}
		
		switch($region){
			case	""								:	$region_disp[0] = $selected; break;
			case	"Cairns and Far North"			:	$region_disp[1] = $selected; break;
			case	"Townsville"					:	$region_disp[2] = $selected; break;
			case	"Mackay Whitsundays"			:	$region_disp[3] = $selected; break;
			case	"Central West"					:	$region_disp[4] = $selected; break;
			case	"Mount Isa and North West"		:	$region_disp[5] = $selected; break;
			case	"Wide Bay Burnett"				:	$region_disp[6] = $selected; break;
			case	"South East Queensland"			:	$region_disp[7] = $selected; break;
			case	"South West and Darling Downs"	:	$region_disp[8] = $selected; break;
			case	"Brisbane Metro"				:	$region_disp[9] = $selected; break;
			case	"New South Wales"				:	$region_disp[10] = $selected; break;
			case	"Canberra"						:	$region_disp[11] = $selected; break;
			case	"Tasmania"						:	$region_disp[12] = $selected; break;
			case	"Victoria"						:	$region_disp[13] = $selected; break;
			case	"South Australia"				:	$region_disp[14] = $selected; break;
			case	"Northern Territory"			:	$region_disp[15] = $selected; break;
			case	"Western Australia"				:	$region_disp[16] = $selected; break;
		}
		
		switch($state){
			case	""		:	$state_disp[0] = $selected; break;
			case	"ACT"	:	$state_disp[1] = $selected; break;
			case	"NSW"	:	$state_disp[2] = $selected; break;
			case	"NT"	:	$state_disp[3] = $selected; break;
			case	"QLD"	:	$state_disp[4] = $selected; break;
			case	"SA"	:	$state_disp[5] = $selected; break;
			case	"TAS"	:	$state_disp[6] = $selected; break;
			case	"VIC"	:	$state_disp[7] = $selected; break;
			case	"WA"	:	$state_disp[8] = $selected; break;
		}
		
		
		if($love != ""){ $love = 1; $love_checked = " checked=\"checked\""; } else { $love = 0; } // this is signup_events
		
		
		if(
		$your_title != "" && $first_name != "" && $last_name != "" &&
		$address_1 != "" && $city != "" && $region != "" && $state != "" && $postcode != "" &&
		$number != "" &&
		$email != "" && $email == $email_confirm
		){
		
			$query = mysql_query("
				INSERT INTO fa_members
				(m_id, m_title, m_fname, m_lname, m_address_1, m_address_2, m_city, m_region, m_state, m_postcode, m_number,
				m_email, m_signup_events, m_flying_name, m_flying_crewtype, m_payment_confirmed, m_fb_id, m_signup_ts)
				VALUES
				('', '$your_title', '$first_name', '$last_name', '$address_1', '$address_2', '$city', '$region', '$state', '$postcode', '$number',
				'$email', '$love', '$name', '$select', '0', '$facebook_id', '" .time() ."')
			");
			
			if($query){
			
				$userid = mysql_insert_id();
			
				//$error = "<p>Info inserted into the database BUT I have no further information to continue.</p>";
				Header("Location: form_send.php?select=$select&name=$name&new=$userid");
				
				unset($your_title);
				unset($first_name);
				unset($last_name);
				unset($address_1);
				unset($address_2);
				unset($city);
				unset($region);
				unset($state);
				unset($postcode);
				unset($number);
				unset($email);
				unset($email_confirm);
				unset($love);
				unset($your_title_disp);
				unset($region_disp);
				unset($state_disp);
				
			} else {
				$error = "<p>There was an error processing your donation to forward onto PayPal.</p>";
			}
		
		} else {
			$error = "<p>All fields marked are required.</p>";
		}
	
	}
	
		
		

include_once("includes/header.php");

?>		
			
		<div class="wrapper">
			<div class="content">

				<div class="fs_form_content">
					<div class="ffc_header">
						<h2 class="ffc_title">Thanks for choosing to fly with us <strong><?php echo $name; ?>!</strong></h2>
						<p>Providing your contact information will allow us to send an electronic tax receipt to your nominated email address. Remember, donations of $2 or more are tax deductible.</p>
						<?php if($fb_profile_img){ echo $fb_profile_img; } ?>
					</div>

					<div class="ffc_form">
					
						<?php if($error){ echo "<div style=\"color: #ff0000; font-size: 14px; font-weight: bold;\">$error</div>"; } ?>

						<form novalidate class="ffc-form" method="post" action="form.php<?php echo "?select=$select&name=$name"; ?>">
							<p>
								<span class="label">Title</span>
								<span class="ffc-form-control-wrap your_title">
									<select class="ffc-form-control ffc-select ffc-validates-as-required" name="your_title" style="float: left;">
										<option <?php echo $your_title_disp[0]; ?>value="">Select</option>
										<option <?php echo $your_title_disp["Mr"]; ?>value="Mr">Mr</option>
										<option <?php echo $your_title_disp["Mrs"]; ?>value="Mrs">Mrs</option>
										<option <?php echo $your_title_disp["Ms"]; ?>value="Ms">Ms</option>
									</select>
								</span><span class="required">Required</span><br />
							</p>
							<p>
								<span class="label">First Name</span>
								<span class="ffc-form-control-wrap first_name">
									<input type="text" aria-required="true" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $first_name; ?>" name="first_name"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Last Name</span>
								<span class="ffc-form-control-wrap last_name">
									<input type="text" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $last_name; ?>" name="last_name"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Contact Address 1</span>
								<span class="ffc-form-control-wrap address_1">
									<input type="text" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $address_1; ?>" name="address_1"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Contact Address 2</span>
								<span class="ffc-form-control-wrap address_2">
									<input type="text" class="ffc-form-control ffc-text" size="40" value="<?php echo $address_2; ?>" name="address_2"></span>
							</p>
							<p>
								<span class="label">City</span>
								<span class="ffc-form-control-wrap city">
									<input type="text" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $city; ?>" name="city"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Region</span>
								<span class="ffc-form-control-wrap region">
									<select class="ffc-form-control ffc-selec ffc-validates-as-required" style="float: left;" name="region">
										<option <?php echo $region_disp[0]; ?>value="">Select</option>
										<option <?php echo $region_disp[1]; ?>value="Cairns and Far North">Cairns and Far North</option>
										<option <?php echo $region_disp[2]; ?>value="Townsville">Townsville</option>
										<option <?php echo $region_disp[3]; ?>value="Mackay Whitsundays">Mackay Whitsundays</option>
										<option <?php echo $region_disp[4]; ?>value="Central West">Central West</option>
										<option <?php echo $region_disp[5]; ?>value="Mount Isa and North West">Mount Isa and North West</option>
										<option <?php echo $region_disp[6]; ?>value="Wide Bay Burnett">Wide Bay Burnett</option>
										<option <?php echo $region_disp[7]; ?>value="South East Queensland">South East Queensland</option>
										<option <?php echo $region_disp[8]; ?>value="South West and Darling Downs">South West and Darling Downs</option>
										<option <?php echo $region_disp[9]; ?>value="Brisbane Metro">Brisbane Metro</option>
										<option <?php echo $region_disp[10]; ?>value="New South Wales">New South Wales</option>
										<option <?php echo $region_disp[11]; ?>value="Canberra">Canberra</option>
										<option <?php echo $region_disp[12]; ?>value="Tasmania">Tasmania</option>
										<option <?php echo $region_disp[13]; ?>value="Victoria">Victoria</option>
										<option <?php echo $region_disp[14]; ?>value="South Australia">South Australia</option>
										<option <?php echo $region_disp[15]; ?>value="Northern Territory">Northern Territory</option>
										<option <?php echo $region_disp[16]; ?>value="Western Australia">Western Australia</option>
									</select>
								</span><span class="required">Required</span><br />
								
							</p>
							<p>
								<span class="label">State</span>
								<span class="ffc-form-control-wrap state">
									<select class="ffc-form-control ffc-select ffc-validates-as-required" style="float: left;" name="state">
										<option <?php echo $state_disp[0]; ?>value="">Select</option>
										<option <?php echo $state_disp[1]; ?>value="ACT">ACT</option>
										<option <?php echo $state_disp[2]; ?>value="NSW">NSW</option>
										<option <?php echo $state_disp[3]; ?>value="NT">NT</option>
										<option <?php echo $state_disp[4]; ?>value="QLD">QLD</option>
										<option <?php echo $state_disp[5]; ?>value="SA">SA</option>
										<option <?php echo $state_disp[6]; ?>value="TAS">TAS</option>
										<option <?php echo $state_disp[7]; ?>value="VIC">VIC</option>
										<option <?php echo $state_disp[8]; ?>value="WA">WA</option>
									</select>
								</span><span class="required">Required</span><br />
								
							</p>
							<p>
								<span class="label">Postcode</span>
								<span class="ffc-form-control-wrap postcode">
									<input type="text" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $postcode; ?>" name="postcode"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Contact Number</span>
								<span class="ffc-form-control-wrap number">
									<input type="text" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $number; ?>" name="number"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Email</span>
								<span class="ffc-form-control-wrap email">
									<input type="text" aria-required="true" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $email; ?>" name="email"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="label">Confirm Email</span>
								<span class="ffc-form-control-wrap email_confirm">
									<input type="text" aria-required="true" class="ffc-form-control ffc-text ffc-validates-as-required" size="40" value="<?php echo $email_confirm; ?>" name="email_confirm"></span>
									<span class="required">Required</span>
							</p>
							<p>
								<span class="ffc-form-control-wrap love">
									<span class="ffc-form-control ffc-radio">
										<span class="ffc-list-item">
											<input type="radio" value="Yes, I'd love info about events" name="love" <?php echo $love_checked; ?>>
											&nbsp;
											<span class="ffc-list-item-label">Yes, I'd love info about events</span>
										</span>
									</span>
								</span>
							</p>
							<p class="amount">
								<span class="amount_title">Amount:</span>
								<span class="amount_value">$<?php echo $select; ?>.00 AUD</span>
							</p>
							
							<p class="p-submit">
								<input type="submit" name="submit" class="ffc-form-control ffc-submit" value="Make your payment now">
								<a class="paypal" href="#">Paypal</a><img src="img/visa-straight.png" width="51" height="32" style="float:right" alt=""/> <img src="img/mastercard-straight.png" width="51" style="float:right" height="32" alt=""/>
							</p>
						</form>

					</div>
				</div>

				<span class="airport-flag"></span>
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