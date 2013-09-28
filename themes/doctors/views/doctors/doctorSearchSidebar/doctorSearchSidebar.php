<?php
/*
$selectSliderMaxValue = 30;
if( !isset($filter['years_to']) ) $filter['years_to'] = $selectSliderMaxValue;
?>
		<div class="accordionContent">
            <input type="hidden" id="search_url" value="<?php echo $postUrl; ?>" />

			<ul class="searchlist">
			<li><a>By Location</a></li>
			<li class="block short">
				<label>ZIP Code</label>
				<input type="text" id="zip" name="zip" class="textbox little" value="<?=@$filter['zip_code']?>" tabindex="20" />
			</li>
			<li class="block short short1">
				<div><label>City</label>
                <input type="text" id="city_ac" name="city" class="textbox little ajaxDropdown" 
                value="<?=@$filter['city_value'];?>" ajax_id="<?=intval(@$filter['city']);?>" tabindex="30" />
				</div>
			</li>
			<li class="block short short1">
				<label style="width:;">Within</label>
				<div class="float_right" style="width:125px">
				<input type="text" id="amount" />
				<div id="slider-range-min" style="width:120px;"></div>
				</div>
				
			</li>
			<!--<li class="spacer">&#32;</li>-->
			</ul>
		
			<div class="divide"></div>
		
			<ul class="searchlist">
			<li><a>By Speciality</a></li>
			<li class="block short">
				<label>Speciality</label>
                <input type="text" id="spec_ac" name="spec_ac" class="textbox little ajaxDropdown" autocomplete="OFF" 
                value="<?=@$filter['spec_value'];?>" ajax_id="<?=intval(@$filter['spec']);?>" tabindex="40" />
			</li>
			<li class="block short short1">
				<div><label>Sub Speciality</label>
                <input type="text" id="sspec_ac" name="sspec_ac" class="textbox little ajaxDropdown" autocomplete="OFF" 
                value="<?=@$filter['sspec_value'];?>" ajax_id="<?=intval(@$filter['sspec']);?>" tabindex="50" />                
                </div>
			</li>
			<!--<li class="spacer">&#32;</li>-->
			</ul>	
			
			<div class="divide"></div>
			
			<ul class="searchlist">
			<li><a>By Health Issues</a></li>
			<li class="block short">
				<label>Issue</label>
                <input type="text" id="issue_ac" name="issue_ac" class="textbox little ajaxDropdown" autocomplete="OFF" 
                value="<?=@$filter['issue_value'];?>" ajax_id="<?=intval(@$filter['issue']);?>" tabindex="60" />                
			</li>
			<li class="block short short1">
				<label style="width:100%; text-align:center;">Experience (Years in Practice)</label><br/>
				
				<fieldset style="width:190px;margin:15px 0 25px 25px;">
			
				<select name="valueA" id="valueA">
                <?php for( $i=0; $i<=$selectSliderMaxValue; $i++){ ?>
                    <?php $selected = ''; if( $i == intval(@$filter['years_from']) ) $selected = ' selected="selected"'; ?>
                    <option value="<?php echo $i;?>"<?php echo $selected;?>><?php echo $i;?></option>
                <?php } ?>
				</select>
		
			
				<select name="valueB" id="valueB">
                <?php for( $i=0; $i<=$selectSliderMaxValue; $i++){ ?>
                    <?php $selected = ''; if( $i == intval(@$filter['years_to']) ) $selected = ' selected="selected"'; ?>
                    <option value="<?php echo $i;?>"<?php echo $selected;?>><?php echo $i;?></option>
                <?php } ?>
				</select>
			</fieldset>
				
			</li>
			</ul>
			
			<div class="divide"></div>
			
			<ul class="searchlist" style="margin-right:0;">
			<li><a>By Insurance</a></li>
            <li>
                <label>Insurance</label>
                <input type="text" id="insurance_ac" name="insurance_ac" class="textbox little ajaxDropdown" autocomplete="OFF" 
                value="<?=@$filter['insurance_value'];?>" ajax_id="<?=intval(@$filter['insurance']);?>" tabindex="80" />                
            </li>
            <li><a style="margin:-5px 0 10px 0;">By Gender</a></li>
			<li>
				<input type="radio" name="gender" id="gender_m" class="styled" tabindex="91"
                value="M"<?php if( !isset($filter['gender']) || $filter['gender']=='M' ) echo ' checked="checked"'; ?> />
				<label for="gender_m" style="width: auto;">Male</label>
				<input type="radio" name="gender" id="gender_f" class="styled" tabindex="92"
                value="F"<?php if( isset($filter['gender']) && $filter['gender']=='F' ) echo ' checked="checked"'; ?> />
				<label for="gender_f" style="width: auto;">Female</label>
			</li>
            <li>
                <input type="submit" class="blue_btn red_btn submit" value="Filter Results" tabindex="100"
                style="position:relative; margin: 10px 0 0 30px !important; padding-bottom:10px !important; padding-top:10px !important;" id="research_submit" />
            </li>
			
			<li class="block"></li>
			</ul>
		
		<div style="height:15px;"></div>
		</div>
<?php /**/ ?>
