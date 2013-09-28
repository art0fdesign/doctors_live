<?php /*
$js = <<<JS
$( "#blogdate" ).datepicker({dateFormat: "yy-mm-dd"});
JS;
Yii::app()->clientScript->registerScript('blog-date', $js, CClientScript::POS_READY);
Yii::app()->clientScript->registerCoreScript('jquery-ui');
*/ ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'health-issue-form',
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'form'),
)); ?>


<div class="middleContent">

    <div class="widget">

        <div class="title1"><h6>Blog Data</h6></div>

        <fieldset>

            <div class="formRow mt30">
                <div class="formRight">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            </div>

            <div class="formRow">
                <?php echo $form->labelEx($model,'blog_date'); ?>
                <div class="formRight">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        //'name'=>'publishDate',
                        // additional javascript options for the date picker plugin
                        'model'=>$model,
                        'attribute'=>'blog_date',
			'scriptFile'=>false,
                        'options'=>array(
                            
                            'dateFormat'=>'yy-mm-dd'
                        ),
                        'htmlOptions'=>array(
                        ),
                    ));
                    ?>
                </div>
                <?php echo $form->error($model,'blog_date'); ?>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <?php echo $form->labelEx($model,'blog_name'); ?>
                <div class="formRight"><?php echo $form->textField($model,'blog_name',array()); ?></div>
                <?php echo $form->error($model,'blog_name'); ?>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <?php echo $form->labelEx($model,'blog_author'); ?>
                <div class="formRight"><?php echo $form->textField($model,'blog_author',array('size'=>60,'maxlength'=>256)); ?></div>
                <?php echo $form->error($model,'blog_author'); ?>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <?php echo $form->labelEx($model,'order_by'); ?>
                <div class="formRight"><?php echo $form->textField($model,'order_by',array('size'=>60,'maxlength'=>255)); ?></div>
                <?php echo $form->error($model,'order_by'); ?>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <?php echo $form->labelEx($model,'lang_id'); ?>
                <div class="formRight"><div class="select-list"><?php echo $form->dropDownList($model,'lang_id', $model->getLangOptions(),array()); ?></div></div>
                <?php echo $form->error($model,'lang_id'); ?>
                <div class="clear"></div>
            </div>

            <div class="formRow mb20">
                <?php echo $form->labelEx($model, 'f_status'); ?>
                <div class="formRight"><?php echo $form->checkBox($model,'f_status', array('id'=>'ch3','class'=>'styled')); ?>
                    <label for="ch3">active</label></div>
                <div class="clear"></div>
            </div>

        </fieldset>

    </div>




    <div class="widget">
        <div class="title"><h6>Blog Text</h6></div>
        <fieldset>
            <?php echo $form->textArea($model,'blog_content',array('class'=>'textEditor')); ?>
        </fieldset>
    </div>

</div>

<div class="rightContent">

    <div class="rightWidget widget">
        <div class="title"><h6>Blog Image</h6></div>
        <div id="img-preview" style="width:202px; min-height:100px; border: 1px solid #CDCDCD; margin:30px auto 0 auto">
            <?php echo CHtml::image( File::model()->getFileThumbUrl( true, 'preview', $model->blog_image )); ?>
        </div><br />
        <div align="center"><?php echo $form->dropDownList($model, 'blog_image', $model->getImagesOptions(), array(
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
    <div class="clear"></div>

    <div class="rightWidget widget">
        <div class="title">
            <h6>System info</h6>
        </div>
        <div class="formRow mt30">
            <b>Created by: </b>
            <span><?= @$model->creator->first_name.' '.@$model->creator->last_name; ?></span>
        </div>
        <div class="formRow">
            <b>Created: </b>
            <span><?= $model->created_dt; ?></span>
        </div>
        <div class="formRow">
            <b>Modified by: </b>
            <span><?= @$model->editor->first_name.' '.@$model->editor->last_name; ?></span>
        </div>
        <div class="formRow mb20">
            <b>Modified: </b>
            <span><?= $model->changed_dt; ?></span>
        </div>
    </div>
    <div class="button-box mt20">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('name'=>'save', 'class'=>'saveBtn')); ?>
        <?php echo CHtml::link('or back to list',array('index'), array('class'=>'backBtn')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
