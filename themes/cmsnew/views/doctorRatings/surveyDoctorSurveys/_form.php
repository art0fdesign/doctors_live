<?php
$typeOptions = SurveyDoctorSurvey::getSurveyTypeOptions();
$surveyOptions = SurveyName::getSurveyOptions();
// Sys Info Panel date format
$dtFormat = $this->getCMSSetting( 'sysinfo_dt_format', 'Y-m-d H:i' );
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-doctor-survey-form',
    'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>false,
)); ?>
<div class="middleContent">
    <fieldset>
        <div class="widget">
        
            <div class="title1"><h6>Doctor Survey Data</h6></div>
            
            <div class="formRow mt30">
                <div class="formRight">
                    <?php echo $form->errorSummary($model); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'Doctor_ID'); ?>
                <div class="formRight">
                    <?php echo $form->hiddenField( $model, 'Doctor_ID', array( 'id'=>'ac_doctor_id' ) )?>
                    <input type="text" id="ac_doctor" value="<?php echo @$model->Doctor->fullName?>" />
<?php 
/** TODO: implement this autocomplete functionality as Widget */
$script = "
    jQuery('#ac_doctor').autocomplete({
        source: '" . $this->createUrl( 'surveyDoctorSurveys/autocomplete' ) . "',
        minLength: '2',
        select: function( event, ui ){ jQuery('#ac_doctor_id').val(ui.item.id); },
        search: function( event, ui ){ jQuery('#ac_doctor_id').val(''); },
    });
";
$imgUrl = Yii::app()->theme->baseUrl . '/img/ajax-loader_16x16.gif';
$css = ".ui-autocomplete-loading { background: white url('$imgUrl') right center no-repeat; }";
Yii::app()->clientScript->registerCss( 'ds_autocomplete_css', $css );
Yii::app()->clientScript->registerCoreScript( 'jquery.ui.css' );
Yii::app()->clientScript->registerScript('ds_autocomplete_js', $script);
?>
            		<?php echo $form->error( $model, 'Doctor_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'SurveyType_ID'); ?>
                <div class="formRight">
                    <?php echo $form->dropDownList( $model, 'SurveyType_ID', $typeOptions )?>
            		<?php echo $form->error( $model, 'SurveyType_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow mb20">
        		<?php echo $form->labelEx($model,'SurveyName_ID'); ?>
                <div class="formRight">
            		<?php echo $form->dropDownList($model,'SurveyName_ID',$surveyOptions); ?>
            		<?php echo $form->error( $model, 'SurveyName_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>
    
        </div>
    </fieldset>
</div>    

<!-- INFO PANEL -->
<div class="rightContent">
    <div class="rightWidget widget">
        <div class="title"><h6>System Info</h6></div>
<!--        
        <div class="formRow mt30">
            <b>Created by: </b>
            <span><?php //echo @$model->creator->first_name.' '.@$model->creator->last_name; ?></span>
        </div>
        
        <div class="formRow">
            <b>Created: </b>
            <span><?php //echo $model->isNewRecord ? '': date( $dtFormat, strtotime( @$model->created_dt ) ); ?></span>
        </div>
        
        <div class="formRow">
            <b>Modified by: </b>
            <span><?php //echo @$model->editor->first_name.' '.@$model->editor->last_name; ?></span>
        </div>
        
        <div class="formRow mb20">
            <b>Modified: </b>
            <span><?php //echo $model->isNewRecord ? '': date( $dtFormat, strtotime( @$model->changed_dt ) ); ?></span>
        </div>
-->
    </div>
    
    <div class="button-box mt20">
        <?php echo CHtml::submitButton( $model->isNewRecord ? 'Create' : 'Save', array('name'=>'save', 'class'=>'saveBtn')); ?>
        <?php echo CHtml::link( 'Back to List', array('index'), array('class'=>'backBtn')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
