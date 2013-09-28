<?php
//$docTypeOptions = array( '1'=>'Medical Doctor', '2'=>'Alternative Doctor', '3'=>'Dental Doctor', '4'=>'Mental Doctor' );
$docTypeOptions = DoctorCategory::getCategoryOptions('cat_name', true);
//$mdOptions = CMap::mergeArray( array(''=>'---'), Doctor::getSelectOptions('md') );
$phdOptions = CMap::mergeArray( array(''=>'---'), Doctor::getSelectOptions('phd') );
$boardYearOptions = array('0'=>'---'); $tillYear = intval( date('Y') ) - 15;
for( $i=1; $i<50; $i++){
    $boardYearOptions[$tillYear - $i] = $tillYear - $i;
}
//$practiceOptions = Doctor::getSelectOptions('in_practice');
//
$selectedLangs = explode("-", $doctor->languages);
if( empty($selectedLangs) ) $selectedLangs = array( ''=>'----' );
//
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form', 'enableAjaxValidation'=>true )); 
// MyFunctions::echoArray( $doctor->attributes, $doctor->errors, $form->errorSummary( $doctor ) );
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 1: Profile details</h1>
    
    <?php echo @$settings['wizzard-step1-intro']['set_value'];?>

    <br class="clear" />
        
    <fieldset class="leftalign">
        <dl class="float_left">
            <?php echo $form->errorSummary( $doctor ); ?>
        </dl><div class="clear"></div>
        
        <dl class="float_left short long">
            <dt><span>DOCTOR TYPE*</span></dt>
            <dd>
                <?php echo $form->dropDownList( $doctor, 'doc_type', $docTypeOptions, array('class'=>'styled', 'id'=>'type_select') ); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
            <dt><label>FIRST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'first_name', array('class'=>'textbox textbox4') ); ?>
                <?php echo $form->error( $doctor, 'first_name' ); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>MIDDLE NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'middle_name', array('class'=>'textbox textbox4') ); ?>
                <?php echo $form->error( $doctor, 'middle_name' ); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>LAST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'last_name', array('class'=>'textbox textbox4') ); ?>
                <?php echo $form->error( $doctor, 'last_name' ); ?>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left short long">
            <dt><span>DOCTOR TYPE*</span></dt>
            <dd>
                <span id="md_span" class="select selectWrapper">----</span>
                <?php echo $form->dropDownList( $doctor, 'md', $mdOptions, array('class'=>'stled', 'id'=>'md_select') ); ?>
                <div style="display:none;">
<?php foreach( $docTypeOptions as $key => $value ){ ?>
                <select id="md_options_<?=$key?>">
                    <option value="0" selected="selected">---</option>
<?php $catMdModels = DoctorDegree::retrieveAll( 'order_by', array( 'cat_id'=>$key ) );  ?>
<?php foreach( $catMdModels as $item ){ ?>
                    <option value="<?=$item->id?>"><?php echo $item->code . ' -- ' . $item->description;?></option>
<?php }// foreach( $catMdModels ) ?>
                </select>
<?php }// foreach( $docTypeOptions ) ?>
                </div>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left short">
            <dt><span>CREDENTIALS*</span></dt>
            <dd>
                <?php echo $form->dropDownList( $doctor, 'phd', $phdOptions, array('class'=>'styled') ); ?>
            </dd>
        </dl><br class="clear"/>


        <dl class="float_left short">
            <dt><span>YEAR CERTIFIED:*</span></dt>
            <dd>
                <?php echo $form->dropDownList( $doctor, 'board_year', $boardYearOptions, array('class'=>'styled') ); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
            <dt><label>NPI NUMBER:*</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'npi', array('class'=>'textbox textbox4') ); ?>
                <?php echo $form->error( $doctor, 'npi' ); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
            <dt><label>&nbsp;</label></dt>
            <dd>
            </dd>
        </dl><br class="clear"/>


<div id="lic-template-group-div" id-count="<?php echo count($licenses)+1;?>" max-count="5">
<?php $counter = 1; ?>
<?php foreach( $licenses as $item ){ ?>        
    <div class="lic-template-item">
        <dl class="float_left short long">
            <dt><span>STATE OF LICENSE*</span></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select name="License[state][<?=$counter?>]" class="stled">
                <?php foreach( $states as $key=>$value ){ ?>
                    <option value="<?php echo $key;?>"<?php if( $key == @$item->state ) echo ' selected="selected"'; ?>><?php echo $value;?></option>
                <?php } ?>
                </select>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>LICENSE NUMBER:*</label></dt>
            <dd>
                <input type="text" name="License[number][<?=$counter?>]" class="textbox textbox4" value="<?=@$item->number?>" />
                <span>
                <?php if( $counter != 1 ): ?>
                <a href="#" class="removeLicFields">remove</a>&nbsp;
                <?php endif; ?>
                <?php $style = ''; if( $counter != count( $licenses )) $style=' style="display:none;"'; ?>
                <a href="#" class="addMoreLicFields"<?=$style?>>add more</a>
                </span>
            </dd>
        </dl><br class="clear"/>
    </div>
    <?php $counter++;} ?>
</div>        
        
<script id="lic-template-script-id" type="text/x-jquery-tmpl">
    <div class="lic-template-item">
        <dl class="float_left short long">
            <dt><span>STATE OF LICENSE*</span></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select name="License[state][${idCount}]" class="stled">
                <?php foreach( $states as $key=>$value ){ ?>
                    <option value="<?php echo $key;?>"<?php if( $key == '' ) echo ' selected="selected"'; ?>><?php echo $value;?></option>
                <?php } ?>
                </select>
            </dd>
        </dl><br class="clear"/>
        
        <dl class="float_left">
            <dt><label>LICENSE NUMBER:*</label></dt>
            <dd>
                <input type="text" name="License[number][${idCount}]" class="textbox textbox4" />
                <span>{{if showRemove}}<a href="#" class="removeLicFields">remove</a>&nbsp;{{/if}}
                <a href="#" class="addMoreLicFields">add more</a></span>
            </dd>
        </dl><br class="clear"/>
    </div>
</script>
        

        <dl class="float_left radiocheck">
            <dt style="width:115px;"><label>GENDER</label></dt>
            <dd>
                <input type="radio" name="Doctor[gender]" id="sex_male" class="styled" tabindex="100" value="M"<?php echo @$doctor->gender == 'M'? ' checked="checked"': ''; ?>>
            </dd>
            <dt><label for="sex_male">Male</label></dt>
            <dd>
                <input type="radio" name="Doctor[gender]" id="sex_female" class="styled" tabindex="110" value="F"<?php echo @$doctor->gender == 'F'? ' checked="checked"': ''; ?>>
            </dd>
            <dt><label for="sex_female">Female</label></dt>
        </dl><br class="clear"/>
        
        <dl class="float_left short">
            <dt><span>IN PRACTICE*</span></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'in_practice', array('class'=>'textbox textbox2', 'maxlength'=>2) ); ?>
                <?php echo $form->error( $doctor, 'in_practice' ); ?>
                <?php //echo $form->dropDownList( $doctor, 'in_practice', $practiceOptions, array('class'=>'styled') ); ?>
            </dd>
            <dt>YEARS</dt>
        </dl><br class="clear"/>
        
        <dl class="float_left short long">
            <dt><span>SPEAKING*</span></dt>
            <dd>
                <div id="template-group-div" max-count="5">
                    <?php $counter = 1; ?>
                    <?php foreach($selectedLangs as $item){ ?>
                    <div class="template-item">                    
                        <span class="select selectWrapper">----</span>
                        <select name="Language[]" class="stled">
                        <?php foreach( $languages as $key=>$value ){ ?>
                            <option value="<?php echo $key;?>"<?php if( $key == $item ) echo ' selected="selected"'; ?>><?php echo $value;?></option>
                        <?php } ?>
                        </select>
                        <span class="langCommands">
                            <?php if( $counter != 1 ): ?>
                            <a href="#" class="removeFields">remove</a>&nbsp;
                            <?php endif; ?>
                            <?php $style = ''; if( $counter != count( $selectedLangs )) $style = ' style="display: none;"'  ?>
                            <a href="#" class="addMoreFields"<?=$style?>>add more</a></span>
                    </div>
                    <?php $counter++;} ?>
                </div>
            </dd>
            
        </dl><br class="clear"/>
        
        <script id="template-script-id" type="text/x-jquery-tmpl">
                    <div class="template-item">                    
                        <span class="select selectWrapper">----</span>
                        <select name="Language[]" class="stled">
                        <?php foreach( $languages as $key=>$value ){ ?>
                            <option value="<?php echo $key;?>"><?php echo $value;?></option>
                        <?php } ?>
                        </select>
                        <span class="langCommands">{{if showRemove}}<a href="#" class="removeFields">remove</a>&nbsp;{{/if}}
                        <a href="#" class="addMoreFields">add more</a></span>
                    </div>
        </script>
        
        <dt style="width:auto;padding-top:15px;"></dt>
        <br class="clear"/>
        
        <dl class="float_left"><!-- style="padding-top:15px;"-->
            <dt><label>COMMENTS:</label></dt>
            <dd>
                <?php echo $form->textArea( $doctor, 'description', array('class'=>'textbox textbox3') ); ?>
                <?php echo $form->error( $doctor, 'description' ); ?>
            </dd><br class="clear">
            <dd><em>* required fields</em></dd>
        </dl><br class="clear">
        
        <!-- NAVIGATION -->
        <dl class="float_left">
        <dd>
            <input class="gray_btn prev" type="submit" tabindex="150" value="Prev" name="Navigation[Prev]">
            <!--<a  class="gray_btn prev" id="prev_second" tabindex="150">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
            <input class="blue_btn next submit" type="submit" tabindex="160" value="Next" name="Navigation[Next]">
            <!--<a  class="blue_btn next submit" id="submit_second" tabindex="160">Next</a>-->
        </dd>
        </dl>
        
    </fieldset>
</div>
<?php $this->endWidget(); ?>
