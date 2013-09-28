<?php
/** to select tab on load set class: tabbertabdefault */
// deleted
$tab = array(1=>'', '', '', '');
$tab[$cat_id] = ' tabbertabdefault';

switch ($nsi_radio) {
	case 'spec': $placeholder = 'Enter speciality'; break;
	case 'issue': $placeholder = 'Enter issue'; break;
	default: $placeholder = 'Enter name';
}
if ($cz_value == 'Enter place or ZIP code' || $cz_value == 'Enter place or ZIP code:') {
	$cz_value = '';
}
?>
		
	<div class="tabber" style="padding:20px 0 0 0;">
		<div class="tabbertab<?=$tab[1]?>"><h2>Medical</h2></div>		
		<div class="tabbertab<?=$tab[2]?>"><h2>Dental</h2></div>		
		<div class="tabbertab<?=$tab[3]?>"><h2>Mental Health</h2></div>
		<div class="tabbertab<?=$tab[4]?>"><h2>Holistic</h2></div>

		<div class="tabberform search<?php if ($cat_id>2) echo ' hidden';?>">
			<form id="doctor_search_form" method="post" action="<?=$postUrl?>">
			<fieldset>
								<input type="hidden" name="SearchPageBannerSearch" value="<?=$cat_id?>" />  
                <input type="hidden" id="cat_id_selected" name="cat_id" value="<?=$cat_id?>" />  

				<dl class="float_left">
					<dd>
						<label>I'm looking for:</label>
						<input id="nsi_name" type="radio" name="nsi_radio" value="name"<?php echo $nsi_radio=='name' || $nsi_radio==''?' checked="checked"':'';?>><label for="nsi_name">&nbsp;Name&nbsp;</label>
						<input id="nsi_spec" type="radio" name="nsi_radio" value="spec"<?php echo $nsi_radio=='spec'?' checked="checked"':'';?>><label for="nsi_spec">&nbsp;Speciality&nbsp;</label>
						<input id="nsi_issue" type="radio" name="nsi_radio" value="issue"<?php echo $nsi_radio=='issue'?' checked="checked"':'';?>><label for="nsi_issue">&nbsp;Issue&nbsp;</label>
					</dd>
					<dd>
						<input type="text" id="spec_nsi" name="nsi_value" class="textbox textbox4" autocomplete="OFF" value="<?=$nsi_value?>" tabindex="20" placeholder="<?php echo $placeholder;?>" />
						<input type="hidden" id="spec_value" name="nsi_id" value="<?=$nsi_id?>" />
					</dd>
					<dd id="nsi_error" class="search_error"><label>Please select an item from list</label></dd>
				</dl>
		
				<dl class="float_left" style="margin-left:-5px; height:57px;">
					<dd>
						<label>* Within 50 miles from location</label>
					</dd>
					<dd style="padding-left:6px; padding-right:2px;">
						<input type="text" id="spec_cz" name="cz_value" class="textbox textbox4" value="<?=$cz_value?>" autocomplete="OFF" tabindex="30" placeholder="Enter place or ZIP code" />
						<input type="hidden" name="cz_id" value="<?=$cz_id?>" />
					</dd>
					<dd id="cz_error" class="search_error"><label>Please select an item from list</label></dd>
				</dl>
				<input type="hidden" id="sort_hidden" name="sort" value="1" />
        	<input type="submit" class="blue_btn red_btn submit" value="Search Top Doctors" tabindex="40" />
			</fieldset>
			</form>
		</div>
		<div class="tabberform comingsoon<?php if ($cat_id<3) echo ' hidden';?>">
			<h3>Coming soon!</h3>
		</div>
	</div>
