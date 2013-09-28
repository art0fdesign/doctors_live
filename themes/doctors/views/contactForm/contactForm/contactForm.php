<h1 class="title">Contact form:</h1>

<div class="route">	
    <?=@$sets['text_before_form']['set_value']; ?> 
</div>

<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'contact-form-form',
    //'htmlOptions'=>array('class'=>'form'),
    'enableAjaxValidation'=>true,
));
?>
<fieldset>
    <dl class="float_left">
        <dt><label>FIRST NAME:*</label>
            <?php echo $form->error( $model, 'first_name' ) ?></dt>
        <dd><?php echo $form->textField( $model, 'first_name', array('class'=>'textbox textbox1' )); ?></dd>

    </dl>

    <dl class="float_left">
        <dt><label>LAST NAME:*</label>
            <?php echo $form->error( $model, 'last_name') ?></dt>
        <dd><?php echo $form->textField( $model, 'last_name', array('class'=>'textbox textbox1')); ?></dd>
    </dl><div class="clear"></div>

    <dl class="float_left">
        <dt><label>E-MAIL ADDRESS:*</label>
            <?php echo $form->error( $model, 'email') ?></dt>
        <dd><?php echo $form->textField( $model, 'email', array('class'=>'textbox textbox1')); ?></dd>
    </dl>

    <dl class="float_left">
        <dt><label>CONFIRM E-MAIL ADDRESS:*</label>
            <?php echo $form->error( $model, 'email_repeat') ?></dt>
        <dd><?php echo $form->textField( $model, 'email_repeat', array('class'=>'textbox textbox1')); ?></dd>
    </dl><div class="clear"></div>

    <dl class="float_left">
        <dt><label>SUBJECT:*</label>
            <?php echo $form->error( $model, 'subject') ?></dt>
        <dd><?php echo $form->textField( $model, 'subject', array('class'=>'textbox textbox1')); ?></dd>
    </dl><div class="clear"></div>
    
    <dl class="float_left">
        <dt><label>LEAVE A COMMENT:*</label>
            <?php echo $form->error($model, 'message') ?></dt>
        <dd><?php echo $form->textArea( $model, 'message', array('class'=>'textbox textbox6')); ?></dd>
    </dl><div class="clear"></div>

<?php /*
    <?php if(CCaptcha::checkRequirements()):?>
    <dl class="float_right">
        <dt><label>ENTER CODE:*</label>
            <?php echo $form->error($model, 'verifyCode')?></dt>
        <dd>
            <?php echo $form->textField($model, 'verifyCode', array('class'=>'textbox textbox4'))?>            
        </dd>
    </dl>
    <dl class="float_right">
        
        <dd>
            <?php //$this->widget( 'CCaptcha', array('clickableImage'=>true, 'showRefreshButton'=>false, 'imageOptions'=>array( 'class'=>'captchaImage')) )?>
            <?php $this->widget( 'CCaptcha', array('refresh'=>$refreshCaptcha) )?>
        </dd>
    </dl>
    <?php endif;?>


    <br class="clear"/>
/**/ ?>

    <dl class="float_right">
        <dd>
            <?php echo CHtml::submitButton('CONTACT', array('name'=>'Save', 'class'=>'blue_btn submit contactbtn')); ?></dd>
    </dl>

    <br class="clear"/>
</fieldset>
<?php $this->endWidget(); ?>
