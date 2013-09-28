<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    
    $states = CMap::mergeArray( array(''=>'----'),  Doctor::getUSStates() );
?>
<div class="picture">



    <img src="<?php echo $baseUrl; ?>/img/pic_member.jpg" alt="Picture">

    <h1 class="title1"><span class="blue">update your profile</span><br/>

        for free!<br/>

        <em>giving patients an opportunity<br/>

            to find you easier</em>

    </h1>



</div>

<div class="ajaxLoading">
    <img src="<?php echo $baseUrl; ?>/img/ajax-loader.gif" alt="Form is submitting" />
</div>

<h1 class="title">Doctor Registration:</h1>

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-user-registration-form',
    //'htmlOptions'=>array('class'=>'form'),
	'enableAjaxValidation'=>true,
)); 
?>

    <fieldset>

        <?php //echo $form->errorSummary( $model ); ?>

        <dl class="float_left">
            <dt><label>FIRST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'first_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'first_name' ); ?>
            </dd>
        </dl>

        <dl class="float_left">
            <dt><label>LAST NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'last_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'last_name' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">

            <dt><label>E-MAIL ADDRESS:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'email', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'email' ); ?>
            </dd>

        </dl>



        <dl class="float_left">
            <dt><label>CONFIRM E-MAIL ADDRESS:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'email_repeat', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'email_repeat' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">
            <dt><label>USER NAME:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'user_name', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_name' ); ?>
            </dd>
        </dl><br class="clear">



        <dl class="float_left">
            <dt><label>PASSWORD:*</label></dt>
            <dd>
                <?php echo $form->passwordField( $model, 'user_pwd', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_pwd' ); ?>
            </dd>
        </dl>

        <dl class="float_left">
            <dt><label>CONFIRM PASSWORD:*</label></dt>
            <dd>
                <?php echo $form->passwordField( $model, 'user_pwd_repeat', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'user_pwd_repeat' ); ?>
            </dd>
        </dl><br class="clear" />

        <dl class="float_left">
            <dt><label>NPI NUMBER:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'npi', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'npi' ); ?>
            </dd>
        </dl><br class="clear" />

<!--         <dl class="float_left short long">
            <dt><label>STATE:*</label></dt>
            <dd>
                <span class="select selectWrapper">----</span>
                <select name="WebLogin[npi_state]" class="stled">
                <?php foreach( $states as $key=>$value ){ ?>
                    <option value="<?php echo $key;?>"<?php if( $key == @$model->npi_state ) echo ' selected="selected"'; ?>><?php echo $value;?></option>
                <?php } ?>
                </select>
            </dd>
        </dl>

        <dl class="float_left" style="margin-left:50px;">
            <dt><label>LICENSE NUMBER:*</label></dt>
            <dd>
                <?php echo $form->textField( $model, 'npi_license', array( 'class'=>'textbox textbox1' ) ); ?>
                <?php echo $form->error( $model, 'npi_license' ); ?>
            </dd>
        </dl>
 -->

        <dl class="float_left check">

            <dd>
                <?php echo $form->checkBox( $model, 'f_newsletter', array( 'class'=>'styled', 'id'=>'news', 'checked'=>'checked' )); ?>
            </dd>

            <dt><label for="news">I would like to receive important news updates and offers from TopDoctors.com and its health-friendly partners</label></dt>

        </dl>

        <br/>

        <dl class="float_left check">

            <dd>
                <input type="checkbox" name="terms" id="terms" class="styled">
            </dd>

            <dt>
                <label for="terms">I agree to the <a href="#">Terms of Use</a></label>
                <!--<span>Returning User? <a href="#">Login now</a></span>-->
            </dt><br class="clear" />
            <div class="errorMessage mt10" id="terms_error_msg" style="display:none">&nbsp;</div> 

        </dl>



        <dl class="float_left">

            <dd>
                <input type="hidden" name="Action" value="Registration">
                <input id="form_submit" class="blue_btn submit" type="submit" value="Submit" name="Save">
            </dd>

        </dl>



    </fieldset>

<?php $this->endWidget(); ?>
