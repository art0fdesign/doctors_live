<?php if( false ): //if( Yii::app()->webuser->isGuest ): ?>
		<li><a class="login">
			<div class="logbox">
			<strong>LOGIN FORM</strong>
				<form method="get">
				<fieldset>
                        <div class="login_fail_message clear"></div>
                        
					    <label>Username:</label>
						<input type="text" name="WebLogin[username]" id="un" class="textbox textbox5" tabindex="10" /><br/>
				
						<label>Pasword:</label>
						<input type="password" name="WebLogin[password]" id="pass" class="textbox textbox5" tabindex="20" />

						<div class="float_left radiocheck1">
						<input type="radio" name="WebLogin[dr]" id="dr" class="styled" checked="checked" value="dr" tabindex="30" />
						<label style="width:20px;" for="dr">Doctor</label>
						</div>
						<div class="float_left radiocheck2">
						<input type="radio" name="WebLogin[dr]" id="us" class="styled" value="us" tabindex="40" />
						<label style="width:20px;" for="us">User</label>
						</div>

						<br class="clear"/>

                        <!--<span class="notregister"><a href="#">not registered?</a></span>-->
						<input id="login_form_submit" class="blue_btn submit" type="submit" tabindex="50" value="Submit" name="WebLogin[Login]" />
						<!--<a href="#" class="blue_btn submit" tabindex="90">Submit</a>-->
						
				</fieldset>
				</form>				
			</div>
			Login
			</a>
		</li>
<?php else: ?>
		<li><a class="login" id="logout" href="<?php echo $logoutUrl; ?>">Logout</a></li>        
<?php endif; ?>