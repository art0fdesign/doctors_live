<?php
// urls are defined in _header.php file
?>
<?php if( Yii::app()->webuser->isGuest ): ?>
    <script id="login-script-id" type="text/x-jquery-tmpl">
		<div id="blanket" style="display:none;"></div>
		<div id="popUpDiv" style="display:none; height:650px">
		
			<div class="logopop"></div>
            
            <a class="back" href="#">close</a>
			
			<div id="top_main" class="top">
				<h3 class="mb20">Login</h3>
				{{if memo.length > 0}}
				<p style="margin-top:20px; text-align:center; color: #FF8000; font-weight:bold;">${memo}<br />${memo_nl}</p>
				{{/if}}
				<p style="margin-top:20px; text-align:center;">Enter your username and password. Alternatively you may login using Facebook or Twitter.</p>			
			</div>
		
			<div id="top_email" class="top" style="display:none;">
				<h4 class="mb20">Forgot Your Password?</h4>
				<p style="margin-top:20px; text-align:center;">No problem! Just type in your user name or email address and we will email it to you.</p>				
			</div>
			
			<div id="login_main" class="content" style="margin-top:0px;">
                <div class="login_fail_message"></div>
                <form method="get" id="login_form">
                    <fieldset>
    				<dl>
                        <dd style="width:320px;">
						<img class="icosmall" src="<?=Yii::app()->baseUrl?>/themes/doctors/img/ico1.png" alt="ico">
						<input type="text" id="login_un" name="WebLogin[username]" class="textbox textbox4" tabindex="510" 
						onfocus="if(this.value=='User Name or E-mail') this.value='';" onblur="if(this.value=='') this.value='User Name or E-mail';" value="User Name or E-mail"/>
						</dd>
						<br class="clear" /><br/>
						
						<dd style="width:320px; margin-top:5px;">
						<img class="icosmall" src="<?=Yii::app()->baseUrl?>/themes/doctors/img/ico2.png" alt="ico">
						<input type="password" id="login_pass" name="WebLogin[password]" class="textbox textbox4" tabindex="520" 
						onfocus="if(this.value=='Password') this.value='';" onblur="if(this.value=='') this.value='Password';" value="Password"/>
						</dd>
						<br /><br class="clear"/>
						
						<dd class="shadow"></dd><br class="clear"/>
                        
            <dd class="float_left"><a id="login_pass_forgot" href="#" class="note" >Forgot password?</a></dd>
						
						<dd class="float_right">
							<a id="login_cmd" href="#" class="login_btn">Login</a>
							<a id="login_sign_up" href="#" class="login_sign_up" >Sign Up</a>
						</dd><br />
                    </dl>

                    </fieldset>
                </form>
				<p style="margin:25px 0 0 0; text-align:center;">Or use either of the following</p>
			</div>
			
			<div id="login_email" class="content" style="display:none;">
                <form method="get">
                    <fieldset>
    				<dl>
						<dd>
						<input type="text" id="login_pf" name="WebLogin[username_pf]" class="textbox textbox4" tabindex="530" 
						onfocus="if(this.value=='User Name or E-mail') this.value='';" onblur="if(this.value=='') this.value='User Name or E-mail';" value="User Name or E-mail"/>
						</dd><br class="clear" />
                        <dt>&nbsp;</dt>
                        <dd style="width:380px;">
                            <a id="pass_forgot_cmd" href="#" class="login_btn float_left">Submit</a>&nbsp;
                            <a id="pass_forgot_back" href="#" class="login_btn float_left" style="margin-left:40px;">Back</a>
                        </dd><br />
                    </dl>

                    </fieldset>
                </form>
			</div>
			
			<div id="pass_ajax" class="content" style="display:none;">
                <dl>
                    <dt><img src="<?=Yii::app()->baseUrl?>/themes/doctors/img/ajax-loader.gif" alt="Ajax Loader"></dt><dd>&nbsp;</dd>
                </dl>
			</div>
		
			<div id="socialBox" class="bottom">
                <span></span>
                <a class="login_fbook" href="<?php echo Yii::app()->request->getBaseUrl(true).'/ha?provider=Facebook'; ?>">Sign in with Facebook</a>
                <a class="login_twitter" href="<?php echo Yii::app()->request->getBaseUrl(true).'/ha?provider=Twitter'; ?>" style="margin-left:15px">Sign in with Twitter</a>
 			</div>

        </div>
    </script>


    <script id="signup-script-id" type="text/x-jquery-tmpl">
		<div id="blanket" style="display:none;"></div>
		<div id="popUpDiv" style="display:none; min-height:550px; height:550px;">
            
            <div class="logopop"></div>
			
			<a class="back" href="#">close</a>
			
            <div id="top_main" class="top">
				<h3 class="mb20">SignUp <span> for membership</span></h3>
				<p style="margin:20px 10px 0 20px;">Your free access to information on Top Doctors in your City and the information most important to you. Just follow the two easy steps...</p><br /><br class="clear" />
                <form style="margin:20px 10px 0 40px;">
                <dl>
                    <dt>
                        <input type="radio" name="Signup" class="signup_radio" id="signup_doctor" checked="checked" href="<?=$signupDoctorUrl?>" />
                        <label for="signup_doctor">Doctors</label>
                    </dt>
                    <dd style="margin:5px 0 20px 30px; font-style:italic; font-size:12px;">
        				Doctors, by updating your profile we post it for free, and securely. You have access to information specific to benefit your practice and patients.
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <input type="radio" name="Signup" class="signup_radio" id="signup_member" href="<?=$signupPersonalUrl?>" />
                        <label for="signup_member">Users <span>(Patients &amp; General Public)</span></label>
                    </dt>
                    <dd style="margin:5px 0 20px 30px; font-style:italic; font-size:12px;">
        				Fast Secure registration, gives you access to all doctors for free. Anonymously you can give feedback, and get health related information important to your needs.
                    </dd>
                </dl>
                </form>
				
				<div class="shadow" style="margin:50px 0 30px 70px;"></div><br class="clear"/>
				
                <a class="signup_submit login_btn float_right" href="#" style="margin-right:50px;">Submit</a>
			</div>

        </div>
    </script>
<?php endif; ?>
