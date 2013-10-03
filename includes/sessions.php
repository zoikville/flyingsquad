<?php

/* oooooooooooooooooooooooooooooooooooooooooooooooo */

/*	Author			-> Richard Grainger
					-> Work for: ZOIK

/*	Date			-> 13 August 2013

/*	File			-> sessions.php

/*	Contact			-> mail@richardgrainger.com.au
				
/* 	Copyright (c)	-> Richard Grainger

/* oooooooooooooooooooooooooooooooooooooooooooooooo */


session_start();







// *************************** CHECK IF THE COOKIE IS STORED *************************** //
if($_COOKIE[$gua_sesn]['cookie_u'] != "" && $_COOKIE[$gua_sesn]['cookie_a'] != "" && empty($_SESSION[$gua_sesn])){

	$username = $_COOKIE[$gua_sesn]['cookie_u'];
	$password = $_COOKIE[$gua_sesn]['cookie_a'];		
	
	$query = mysql_query("SELECT * FROM cd_members WHERE m_id = '$username' AND m_password = '$password'");		
	$row_check = mysql_num_rows($query);
	
	if($row_check > 0){
	
			while ($row = mysql_fetch_assoc($query)){
			
				// base sessions //
				$_SESSION[$gua_sesn]['logged_in']	= true;
				$_SESSION[$gua_sesn]['ip']			= getip();
				$_SESSION[$gua_sesn]['time']		= time();
				
				// extras //
				$_SESSION[$gua_sesn]['id']			= sql_pull($row['m_id']);
				$_SESSION[$gua_sesn]['fbid']		= sql_pull($row['m_fb_id']);
				$_SESSION[$gua_sesn]['fname']		= sql_pull($row['m_fname']);
				$_SESSION[$gua_sesn]['email']		= sql_pull($row['m_email']);
				
				// allow //
				$_SESSION[$gua_sesn]['allow']		= 1; // allow them to be logged in //
				session_write_close();
				
			}
			@mysql_free_result($query);
	
	} else {
		header("Location: /login");
	}
	
}
// *************************** END CHECK IF THE COOKIE IS STORED *************************** //


// ** GET THE LAST PAGE THEY VISITED FOR THE LOGIN ** //
$nolink_pages = array(
'login.php', 'captcha.php' , 'register.php', 'no_js.php', 'password_reset.php', '404.php',
'offer_details_expired.php',
'ajax_clickcounter.php'
);
if(!in_array($this_page, $nolink_pages)){
	$_SESSION[$gua_sesn]['last_page'] = full_url();
}





if(
empty($_SESSION[$gua_sesn]['logged_in']) ||
empty($_SESSION[$gua_sesn]['ip']) || $_SESSION[$gua_sesn]['ip'] !== getip() ||
empty($_SESSION[$gua_sesn]['time']) ||
(time()-$_SESSION[$gua_sesn]['time'] > $gua_timeout) ||
!is_numeric($_SESSION[$gua_sesn]['allow'])
){

	$logged = false;
	
	
	
	
	
	$logged_top_login =	"
	<div class=\"login\">
    <a href=\"javascript:void(0)\" onclick=\"showmenu(event)\">LOGIN<span id=\"login-right\">></span></a>
      <div id=\"login-content\">
        <div class=\"login-left\">
          <h3>login with your facebook account</h3>
          <a class=\"face-login\" href=\"".$facebook->getLoginUrl($fb_params)."\"></a>
		</div>
        <div class=\"login-right\">
		
			<form action=\"$gua_https"."login\" method=\"post\" name=\"logintop\">
			
				<h3>login with VIP+ Account</h3>
				<input class=\"ipt-text\" type=\"text\" name=\"email\" value=\"Email\" onclick=\"if(this.value=='Email')this.value=''\" onfocus=\"this.value='';\" onblur=\"if(this.value =='')this.value='Email';\"/>
				<input class=\"ipt-text\" type=\"password\" name=\"password\" value=\"Password\" onclick=\"if(this.value=='Password')this.value=''\" onfocus=\"this.value='';\" onblur=\"if(this.value =='')this.value='Password';\"/>
				<div class=\"login-bottom\">
				<input class=\"btn-login\" type=\"submit\" name=\"submit\" tabindex=\"5\" value=\"Login\">
				<br/>
				Forgot your <a href=\"/login/forgot-password\">password</a>? <br/>
				Don't have an account? <a href=\"/login/register\">Sign up</a>
				</div>
				
			</form>
		  
		  
        </div>
      </div>
    </div>
						";
	

					
					
	

} else {

	$logged = true;
	
	
	
	
	$logged_top_login =	"
	<div class=\"login\">
		<a href=\"javascript:void(0)\" onclick=\"showmenu(event)\">Member: " .$_SESSION[$gua_sesn]['fname'] ."<span id=\"login-right\">></span></a>
		<div id=\"login-content\">
			<a href=\"/account\">My Account</a><br />
			<a href=\"/login/1\">Logout</a>
		</div>
	</div>
						";
    
 
	
	
	
	$_SESSION[$gua_sesn]['time'] = time();

}
?>