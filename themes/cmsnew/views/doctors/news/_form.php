<?php

// Sys Info Panel date format
$dtFormat = $this->getCMSSetting( 'sysinfo_dt_format', 'Y-m-d H:i' );
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
    'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>true,
)); ?>
<div class="middleContent">
    <fieldset>
        <div class="widget">
    
        <div class="title1"><h6>News Data</h6></div>
        
        <div class="formRow mt30">
            <div class="formRight">
                <?php echo $form->errorSummary($model); ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow mt30">
            <?php echo $form->labelEx($model,'news_name'); ?>
            <div class="formRight">
                <?php echo $form->textField($model,'news_name',array('size'=>50,'maxlength'=>50)); ?>
                <?php echo $form->error( $model, 'news_name' ); ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
    		<?php echo $form->labelEx($model,'news_source'); ?>
            <div class="formRight">
        		<?php echo $form->textField($model,'news_source',array('size'=>50,'maxlength'=>50)); ?>
        		<?php echo $form->error( $model, 'news_source' ); ?>
            </div>
            <div class="clear"></div>
        </div>

        <!--<div class="formRow">
    		<?php //echo $form->labelEx($model,'news_text'); ?>
            <div class="formRight">
        		<?php //echo $form->textArea($model,'news_text',array('rows'=>6, 'cols'=>50)); ?>
        		<?php //echo $form->error( $model, 'news_text' ); ?>
            </div>
            <div class="clear"></div>
        </div>-->

        <!--<div class="formRow">
    		<?php //echo $form->labelEx($model,'news_image'); ?>
            <div class="formRight">
        		<?php //echo $form->textField($model,'news_image',array('size'=>60,'maxlength'=>256)); ?>
        		<?php //echo $form->error( $model, 'news_image' ); ?>
            </div>
            <div class="clear"></div>
        </div>-->

        <div class="formRow">
    		<?php echo $form->labelEx($model,'order_by'); ?>
            <div class="formRight">
        		<?php echo $form->textField($model,'order_by'); ?>
        		<?php echo $form->error( $model, 'order_by' ); ?>
            </div>
            <div class="clear"></div>
        </div>

        <!--<div class="formRow">
    		<?php //echo $form->labelEx($model,'f_status'); ?>
            <div class="formRight">
        		<?php //echo $form->textField($model,'f_status'); ?>
        		<?php //echo $form->error( $model, 'f_status' ); ?>
            </div>
            <div class="clear"></div>
        </div>-->

        <div class="formRow mb20">
            <?php echo $form->labelEx($model, 'f_status'); ?>
            <div class="formRight">
                <?php echo $form->checkBox($model,'f_status', array('id'=>'ch3','class'=>'styled')); ?>
                <?php echo $form->error( $model, 'f_status' ); ?>
                <label for="ch3">active</label>
            </div>
            <div class="clear"></div>
        </div>

        </div>
    </fieldset>

    <div class="widget">

        <fieldset>
            <?php /*<div class="title1"><h6><?php echo $form->labelEx($model,'description'); ?></h6></div>
                <div class="formRow mt30"></div>*/ ?>
            <div class="title"><h6>News Text</h6></div>
            <div class="formRight">
                <?php echo $form->textArea($model,'news_text',array('class'=>'textEditor')); ?>
                <?php echo $form->error( $model, 'news_text' ); ?>
            </div>
        </fieldset>
    </div>
</div>    

<!-- INFO PANEL -->
<div class="rightContent">

    <div class="rightWidget widget">
        <div class="title"><h6>Blog Image</h6></div>
        <div id="img-preview" style="width:202px; min-height:100px; border: 1px solid #CDCDCD; margin:30px auto 0 auto">
            <?php echo CHtml::image( File::model()->getFileThumbUrl( true, 'preview', $model->news_image )); ?>
        </div><br />
        <div align="center"><?php echo $form->dropDownList($model, 'news_image', $model->getImagesOptions(), array(
            'empty'=>'Select Image',
            'ajax'=>array(
                'type'=>'POST',
                'url'=>array('getImagePreview'),
                'success'=>'function(data){
                            $("#img-preview").html();
                            $("#img-preview").html(data);
                        }'
            )
        )); ?></div><br />
    </div>

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
