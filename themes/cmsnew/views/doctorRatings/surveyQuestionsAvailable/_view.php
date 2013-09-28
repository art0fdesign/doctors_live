<?php

// Sys Info Panel date format
$dtFormat = $this->getCMSSetting( 'sysinfo_dt_format', 'Y-m-d H:i' );
// array to disable input fields... if there MUST be inputs???
 
$readOnly = array('readonly'=>'readonly');
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'survey-questions-available-form',
    'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>false,
)); ?>
<div class="middleContent">
    <fieldset>
        <div class="widget">
    
            <div class="title1"><h6>Question Data</h6></div>

    
            <div class="formRow mt30">
                <?php echo $form->labelEx($model,'id'); ?>
                <div class="formRight">
                    <?php echo $form->textField( $model, 'id', $readOnly ); ?>
                </div>            
                <div class="clear"></div>
            </div>

    
            <div class="formRow">
                <?php echo $form->labelEx($model,'SurveyCategory_ID'); ?>
                <div class="formRight">
                    <?php echo Chtml::textField( 'SurveyCategory_ID', $model->Category->Code, $readOnly ); ?>
                </div>            
                <div class="clear"></div>
            </div>

    
            <div class="formRow">
                <?php echo $form->labelEx($model,'Question'); ?>
                <div class="formRight">
                    <?php echo $form->textArea( $model, 'Question', $readOnly ); ?>
                </div>            
                <div class="clear"></div>
            </div>

    
            <div class="formRow">
                <?php echo $form->labelEx($model,'ResponseType_ID'); ?>
                <div class="formRight">
                    <?php echo CHtml::textField( 'ResponseType_ID', $model->ResponseType->response_name, $readOnly ); ?>
                </div>            
                <div class="clear"></div>
            </div>


            <div class="formRow mb20">
                <?php echo $form->labelEx($model, 'f_status'); ?>
                <div class="formRight"><?php echo $form->checkBox($model,'f_status',array('id'=>'ch_status','class'=>'styled')); ?></div>
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
            <span><?php echo date( $dtFormat, strtotime( @$model->created_dt ) ); ?></span>
        </div>
        
        <div class="formRow">
            <b>Modified by: </b>
            <span><?php echo @$model->editor->first_name.' '.@$model->editor->last_name; ?></span>
        </div>
        
        <div class="formRow mb20">
            <b>Modified: </b>
            <span><?php echo date( $dtFormat, strtotime( @$model->changed_dt ) ); ?></span>
        </div>
    </div>
    
    <div class="button-box mt20">
        <?php echo CHtml::link( 'Edit', array('update', 'id'=>$model->id), array('class'=>'saveBtn')); ?>
        <?php echo CHtml::link( 'Back to List', array('index'), array('class'=>'backBtn')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
