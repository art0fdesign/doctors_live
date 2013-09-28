<?php
$surveyOptions = SurveyName::getSurveyOptions();
$categoryOptions = SurveyCategory::getCategoryOptions();
$responseOptions = SurveyResponseType::getResponseOptions();
$questionOptions = SurveyQuestion::getQuestionStatusOptions();
//MyFunctions::echoArray( $questionOptions );
// Sys Info Panel date format
$dtFormat = $this->getCMSSetting( 'sysinfo_dt_format', 'Y-m-d H:i' );
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-question-form',
    'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>true,
)); ?>
<div class="middleContent">
    <fieldset>
        <div class="widget">
        
            <div class="title1"><h6>Survey Question Data</h6></div>
            
            <div class="formRow mt30">
                <div class="formRight">
                    <?php echo $form->errorSummary($model); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'SurveyName_ID'); ?>
                <div class="formRight">
            		<?php echo $form->dropDownList($model,'SurveyName_ID',$surveyOptions); ?>
            		<?php echo $form->error( $model, 'SurveyName_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'SurveyCategory_ID'); ?>
                <div class="formRight">
            		<?php echo $form->dropDownList($model,'SurveyCategory_ID',$categoryOptions); ?>
            		<?php echo $form->error( $model, 'SurveyCategory_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'Question_Order'); ?>
                <div class="formRight">
            		<?php echo $form->textField($model,'Question_Order',array()); ?>
            		<?php echo $form->error( $model, 'Question_Order' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'Question'); ?>
                <div class="formRight">
            		<?php echo $form->textArea($model,'Question',array()); ?>
            		<?php echo $form->error( $model, 'Question' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'ResponseType_ID'); ?>
                <div class="formRight">
            		<?php echo $form->dropDownList($model,'ResponseType_ID',$responseOptions); ?>
            		<?php echo $form->error( $model, 'ResponseType_ID' ); ?>
                </div>
                <div class="clear"></div>
            </div>
 
            <div class="formRow mb20">
                <?php echo $form->labelEx($model, 'Status_ID'); ?>
                <div class="formRight">
                    <?php echo $form->dropDownList($model,'Status_ID', $questionOptions); ?>
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
    </div>
    
    <div class="button-box mt20">
        <?php echo CHtml::submitButton( $model->isNewRecord ? 'Create' : 'Save', array('name'=>'save', 'class'=>'saveBtn')); ?>
        <?php $link = array( 'index' ); if( $survey ) $link['survey']=$survey; if($category) $link['category'] = $category; ?>
        <?php echo CHtml::link( 'Back to List',$link, array('class'=>'backBtn')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
