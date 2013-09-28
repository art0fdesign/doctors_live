<?php

// Sys Info Panel date format
$dtFormat = $this->getCMSSetting( 'sysinfo_dt_format', 'Y-m-d H:i' );
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-names-form',
    'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>true,
)); ?>
<div class="middleContent">
    <fieldset>
        <div class="widget">
        
            <div class="title1"><h6>Survey Names Data</h6></div>
            
            <div class="formRow">
                <div class="formRight mt40">
                    <?php echo $form->errorSummary($model); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'SurveyName'); ?>
                <div class="formRight">
            		<?php echo $form->textField($model,'SurveyName',array('size'=>60,'maxlength'=>100)); ?>
            		<?php echo $form->error( $model, 'SurveyName' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
        		<?php echo $form->labelEx($model,'Description'); ?>
                <div class="formRight">
            		<?php echo $form->textArea($model,'Description',array('maxlength'=>1000)); ?>
            		<?php echo $form->error( $model, 'Description' ); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow mb20">
                <?php echo $form->labelEx($model, 'f_status'); ?>
                <div class="formRight"><?php echo $form->checkBox($model,'f_status', array('id'=>'ch3','class'=>'styled')); ?>
                    <label for="ch3">active</label></div>
                <div class="clear"></div>
            </div>

        </div>
    </fieldset>
</div>    

<!-- INFO PANEL -->
<div class="rightContent">
    <div class="rightWidget widget">
        <div class="title"><h6>System Info</h6></div>
        
        <div class="formRow mt30">
            <b>Created by: </b>
            <span><?php echo @$model->creator->first_name.' '.@$model->creator->last_name; ?></span>
        </div>
        
        <div class="formRow">
            <b>Created: </b>
            <span><?php echo $model->isNewRecord ? '': date( $dtFormat, strtotime( @$model->created_dt ) ); ?></span>
        </div>
        
        <div class="formRow">
            <b>Modified by: </b>
            <span><?php echo @$model->editor->first_name.' '.@$model->editor->last_name; ?></span>
        </div>
        
        <div class="formRow mb20">
            <b>Modified: </b>
            <span><?php echo $model->isNewRecord ? '': date( $dtFormat, strtotime( @$model->changed_dt ) ); ?></span>
        </div>
    </div>
    
    <div class="button-box mt20">
        <?php echo CHtml::submitButton( $model->isNewRecord ? 'Create' : 'Save', array('name'=>'save', 'class'=>'saveBtn')); ?>
        <?php echo CHtml::link( 'Back to List', array('index'), array('class'=>'backBtn')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>