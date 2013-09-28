<h1 class="title">Change Profile Information:</h1>
<?php
$userName = Yii::app()->webuser->model->user_name; 
$pWord = MyFunctions::generatePassword( 12, 1 );
$pageID = Frontend::getPageIDByWidget('userProfile');
$pcUrl = Yii::app()->baseUrl . '/' . Frontend::getPageData( $pageID ) . '/password'; 
//
$form=$this->beginWidget('CActiveForm', array( 'id'=>'web-user-account-form', 'enableAjaxValidation'=>true )); 
?>
<fieldset class="leftalign">
    
    <div>
        <?php echo $form->errorSummary( $model ); ?>
    </div>
        

    <dl class="float_left">
        <dt><label>USER NAME:</label></dt>
        <dd>
            <?php echo $form->textField( $model, 'user_name', array( 'class'=>'textbox textbox4', 'readonly'=>'readonly' ));?>
        </dd>
    </dl><br class="clear"/>

    <dl class="float_left short long">
        <dt><span>PASSWORD:</span></dt>
        <dd>
            <div class="pass_wrapper"><a href="<?=$pcUrl?>">Change password</a></div>
        </dd>
    </dl><br class="clear"/><br />

    <dl class="float_left">
        <dt><label>FIRST NAME:*</label></dt>
        <dd>
            <?php echo $form->error( $model, 'first_name' );?>
            <?php echo $form->textField( $model, 'first_name', array( 'class'=>'textbox textbox4' ));?>
        </dd>
    </dl><br class="clear"/>
    
    <dl class="float_left">
        <dt><label>LAST NAME:*</label></dt>
        <dd>
            <?php echo $form->error( $model, 'last_name' );?>
            <?php echo $form->textField( $model, 'last_name', array( 'class'=>'textbox textbox4' ));?>
        </dd>
    </dl><br class="clear"/>
    
    <dl class="float_left">
        <dt><label>EMAIL:*</label></dt>
        <dd>
            <?php echo $form->error( $model, 'email' );?>
            <?php echo $form->textField( $model, 'email', array( 'class'=>'textbox textbox4' ));?>
        </dd>
    </dl><br class="clear"/>

    <br />
    <dl class="float_left radiocheck">
        <dt style="width:110px;"><label></label></dt>
        <dd>
            <?php echo $form->checkBox( $model, 'f_newsletter', array( 'class'=>'styled', 'id'=>'chk_news' ));?>
            <!--<input type="checkbox" name="Newsletter" class="styled">-->
        </dd>
        <dt><label for="chk_news">I would like to receive important news.</label></dt>
    </dl><br class="clear"/>
    
    <dl class="float_left">
        <dd>
            <!--<a class="blue_btn submit" tabindex="90" href="#">Submit form</a>-->
            <input type="submit" class="blue_btn submit" name="Profile[Account]" value="Save" />
        </dd>
    </dl>
</fieldset>
<?php $this->endWidget();?>
