<?php
$counter = 1;
$form = $this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form', 'enableAjaxValidation'=>false )); 
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 2: Specialty</h1>
<!--     <div class="step_ticketing">
        <a href="#" id="speciality_ticket" >Report missing Speciality / Subspeciality</a>
    </div>
 -->    
    <?php echo @$settings['wizzard-step2-intro']['set_value'];?>
        
    <fieldset class="leftalign">
        <div id="template-group-div" max-count="5" id-count="<?php echo count($userSpecs)+1; ?>">
        <?php foreach( $userSpecs as $specItem ){ ?>
        <div class="template-item">
        <dl class="float_left short long">
            <dt><span>SPECIALTY*</span></dt>
            <dd>
                <span class="select selectWrapper">---</span>
                <select name="Speciality[<?php echo $counter; ?>]" class="stled">
                    <option value="0">----</option>
                    <?php foreach( $specOptions as $key=>$value ){ ?>
                    <option value="<?php echo $key; ?>"<?php if( $specItem->spec_id == $key ) echo ' selected="selected"'; ?>><?php echo $value; ?></option>
                    <?php } ?>
                </select>                
            </dd>
            <dd>
                
                <input type="radio" id="default_<?php echo $counter; ?>" name="SpecDefault" value="<?php echo $counter; ?>"<?php echo $specItem->f_default==1? ' checked="checked"': '';?> />
                <label for="default_<?php echo $counter; ?>">Default</label>               
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left short long subspec_list"<?php if( empty( $subSpecOptions[$specItem->spec_id] ) ):?> style="display: none;"<?php endif;?>>
            <dt><span>SUBSPECIALTY*</span></dt>
            <dd>
                <ul class="selectarea checklist">
                <?php if( $specItem->spec_id ): ?>
                <?php if( !empty( $subSpecOptions[$specItem->spec_id] ) ):?>
                <?php foreach( $subSpecOptions[$specItem->spec_id] as $key=>$value ){ ?>
                    <?php $checked = ''; ?>
                    <? if( isset( $userSubspecs[$specItem->spec_id] ) && in_array( $key, $userSubspecs[$specItem->spec_id] ) ) $checked = ' checked="checked"'; ?>
                    <li><label><input type="checkbox" name="Subspeciality[]" class="check" value="<?php echo $key; ?>"<?php echo $checked;?> /><?php echo $value;?></label></li>                
                <?php } // foreach( $subSpecOptions )?>
                <?php endif;?>
                <?php endif; ?>
                </ul>
            </dd>
        </dl><div class="clear"></div>
        <dl class="float_left short long">
            <dt>&nbsp;</dt>
            <dd>
                <?php if( $counter != 1 ): // display always but first time ?>
                <a href="#" class="removeFields">remove</a>
                <?php endif;?>
                <?php if( $counter == count( $userSpecs ) ): // display in last group only ?>
                <a href="#" class="addMoreFields">add more</a>
                <?php endif;?>
            </dd>
        </dl>
        </div><!-- template-item -->
        <div class="clear"></div>
        <?php $counter++; } // foreach( $userSpecs ) ?>
        </div><!-- template-group-div -->
        
        <script id="template-script-id" type="text/x-jquery-tmpl">
            <div class="template-item">
            <dl class="float_left short long">
                <dt><span>SPECIALITY*</span></dt>
                <dd>
                    <span class="select selectWrapper">---</span>
                    <select name="Speciality[${idCount}]" class="stled">
                        <option value="0">----</option>
                        <?php foreach( $specOptions as $key=>$value ){ ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </dd>
            <dd>
                <input type="radio" id="default_${idCount}" name="SpecDefault" value="${idCount}" />
                <label for="default_${idCount}">Default</label>
            </dd>
            </dl><br class="clear"/>

            <dl class="float_left short long subspec_list" style="display:none;">
                <dt><span>SUBSPECIALITY*</span></dt>
                <dd>
                    <ul class="selectarea checklist">
                    </ul>
                </dd>
            </dl><br class="clear">
            <dl class="float_left short long">
                <dt>&nbsp;</dt>
                <dd><a href="#" class="removeFields">remove</a>&nbsp;<a href="#" class="addMoreFields">add more</a></dd>
            </dl>
            </div><!-- template-item -->
            <div class="clear"></div>
        </script>

        <div class="clear"></div>
        <!-- NAVIGATION -->        
        <dl class="float_left">
        <dd>
        <input class="gray_btn prev" type="submit" tabindex="150" value="Prev" name="Navigation[Prev]">
        <!--<a  class="gray_btn prev" id="prev_third" tabindex="150">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
        <input class="blue_btn next submit" type="submit" tabindex="160" value="Next" name="Navigation[Next]">
        <!--<a  class="blue_btn next submit" id="submit_third" tabindex="160">Next</a>-->
        </dd>
        </dl>
    </fieldset>
</div>
<?php $this->endWidget(); ?>
<div style="display: none;">
<?php foreach( $specOptions as $specKey=>$specValue ){ ?>
<ul id="temp-ul-<?php echo $specKey; ?>">
<?php if( !empty( $subSpecOptions[$specKey] ) ):?>
<?php foreach( $subSpecOptions[$specKey] as $key=>$value ){ ?>
<li><label><input type="checkbox" name="Subspeciality[]" class="check" value="<?php echo $key; ?>" /><?php echo $value;?></label></li>
<?php } // foreach(subspecOptions)?>
<?php endif;?>
</ul>
<?php } // foreach($specOptions)?>
</div>