<?php
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-registration-form', 'enableAjaxValidation'=>true ));
?>
<div>
<?php include_once('_links.php'); ?>

    <h1 class="title step_title">Step 6: Social Media</h1>

    <?php echo @$settings['wizzard-step6-intro']['set_value'];?>

    <fieldset class="leftalign">

        <dl class="float_left">
            <?php echo $form->errorSummary( $doctor ); ?>
        </dl>

        <dl class="float_left">
            <dt><label>TWITTER:</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'soc_twitter', array( 'class'=>'textbox textbox4', 'placeholder'=>'Enter twitter account name only' )); ?>
                <?php echo $form->error( $doctor, 'soc_twitter' ); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
        <dt><label>FACEBOOK:</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'soc_facebook', array( 'class'=>'textbox textbox4', 'placeholder'=>'Enter facebook account name only' )); ?>
                <?php echo $form->error( $doctor, 'soc_facebook'); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
        <dt><label>LINKEDIN:</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'soc_linkedin', array( 'class'=>'textbox textbox4', 'placeholder'=>'Enter full profile link' )); ?>
                <?php echo $form->error( $doctor, 'soc_linkedin'); ?>
            </dd>
        </dl><br class="clear"/>

        <dl class="float_left">
        <dt><label>GOOGLE PLUS:</label></dt>
            <dd>
                <?php echo $form->textField( $doctor, 'soc_google', array( 'class'=>'textbox textbox4', 'placeholder'=>'Enter google+ account name only' )); ?>
                <?php echo $form->error( $doctor, 'soc_google'); ?>
            </dd>
        </dl><br class="clear"/>

        <!-- NAVIGATION -->
        <dl class="float_left">
        <dd>
            <input class="gray_btn prev" type="submit" tabindex="100" value="Prev" name="Navigation[Prev]">
            <!--<a  class="gray_btn prev" id="prev_seventh" tabindex="100">Prev</a>-->
        </dd>
        </dl>
        <dl class="float_left">
        <dd>
            <input class="blue_btn next submit" type="submit" tabindex="110" value="Finish" name="Navigation[Finish]">
            <!--<a class="blue_btn next submit" id="submit_seventh" tabindex="40">Finish</a>-->
        </dd>
        </dl>
    </fieldset>
</div>
<?php $this->endWidget(); ?>
