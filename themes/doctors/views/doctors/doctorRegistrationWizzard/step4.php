<?php
$counter = 1;
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 4: Locations</h1>
<!--     <div class="step_ticketing">
        <a href="#" id="location_ticket" >Report missing Location / Direction</a>
    </div>
 -->    
    <?php echo @$settings['wizzard-step4-intro']['set_value'];?>

        <dl class="float_right short long">
            <dt><a href="#" id="new_location_link" style="margin-right:25px;">Not in list?</a></dt>
        </dl><br class="clear"/>
        
<?php 
$newLocationForm=$this->beginWidget('CActiveForm', array( 'id'=>'new-location-form', 'enableAjaxValidation'=>true, 'htmlOptions' => array('style'=>'display:none;') ));
?>
    <fieldset class="leftalign">
        <div class="clear">
            <?php echo $newLocationForm->errorSummary($newLocation); ?>
        </div>
        <dl class="float_left short long">
            <dt><label>FACILITY:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'facility', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'facility' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>ADDRESS:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'address', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'address' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>CITY:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'city', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'city' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>ZIP CODE:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'zip_code', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'zip_code' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>COUNTY:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'county', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'county' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>STATE</label></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select id="state_code" class="stled" name="DoctorLocation[state_code]">
<?php foreach( $newLocation::getUSStates() as $abbrev=>$name): ?>
                    <option value="<?php echo $abbrev; ?>"><?php echo $name; ?></option>
<?php endforeach; ?>
                </select>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>PHONE:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'phone', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'phone' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>LONGITUDE:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'longitude', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'longitude' ); ?>
            </dd>
        </dl>
        <dl class="float_left short long">
            <dt><label>LATITUDE:</label></dt>
            <dd>
                <?php echo $newLocationForm->textField($newLocation, 'latitude', array('class'=>'textbox textbox4') ); ?>
                <?php echo $newLocationForm->error( $newLocation, 'latitude' ); ?>
            </dd>
        </dl>
        <div class="float_right">
            <a href="#" class="blue_btn btn_location_add" id="new_location_add">Add Location</a>
            <a href="#" class="blue_btn btn_location_add" id="new_location_cancel">Cancel</a>
        </div>
        <div class="clear"></div>
    </fieldset>
<?php $this->endWidget(); ?>

        
<div id="step4_result">        
        <dl class="float_left short long">
            <dt><span>LOCATION</span></dt>
            <dd>
                <input type="text" id="location_ac" class="textbox textbox7" name="location_ac" />
            </dd>
            <dd style="width:440px; font-size:10px; ">
                <p style="padding: 0;">Please enter a valid address (no company names). Select the address from the list. Otherwise, please type a new address.</p>
            </dd>
        </dl><br class="clear"/>


<?php 
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-location-form', 'enableAjaxValidation'=>false ));
?>        
    <fieldset class="leftalign">
        <dl class="float_left short xlong">
            <dt><label>DEFAULT LOCATION</label></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select id="location_default" class="stled" name="location_default">
<?php foreach( $locations as $item){ $selected=''; if( $item->location_id == $model->location_default ) $selected = ' selected="selected"'; ?>
                    <option value="<?=$item->id?>"<?=$selected?>><?=$item->location->getLabelAC()?></option>
<?php } ?>
                </select>
            </dd>
        </dl>
        <div class="float_right">
            <a href="#" class="blue_btn btn_location_add" id="location_add">Add Location</a>
        </div>
        <div class="clear"></div>
        
        <!-- LOCATIONS LIST -->
        <table id="location_list">
            <thead>
        		<tr>       
                    <th>Location</th>
            		<th>&nbsp;</th>        
                </tr>
            </thead>
            
        	<tbody>
<?php foreach( $locations as $item){ ?>
        		<tr>
        			<td><?=$item->location->getLabelAC()?></td>
                    <td>
                        <a href="#" class="BtnDelete remove_location" id="remove_<?=$item->id?>" title="Remove location"></a>
                    </td>
        		</tr>
<?php } ?>
        	</tbody>
        </table>
        <div class="clear"></div>

        <!-- NAVIGATION -->
        <dl class="float_left">
        <dd>
            <input class="gray_btn prev" type="submit" value="Prev" name="Navigation[Prev]">            
            <!--<a  class="gray_btn prev" id="prev_fifth" tabindex="100">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
            <input class="blue_btn next submit" type="submit" value="Next" name="Navigation[Next]">
            <!--<a  class="blue_btn next submit" id="submit_fifth" tabindex="110">Next</a>-->
        </dd>
        </dl>
    </fieldset>
</div>
<?php $this->endWidget(); ?>
</div>