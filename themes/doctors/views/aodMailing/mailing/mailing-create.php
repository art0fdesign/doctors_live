<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>
<h1 class="title">Send Mail to <a href="<?=$hrefList?>" title="Click to view conversation"><?=$listUserFullName?></a></h1>

<?php
$form = $this->beginWidget('CActiveForm', array( 'id'=>'mailing-create-form', 'enableAjaxValidation'=>false )); 
?>
    <fieldset>
        <div><?php echo $form->errorSummary( $model ); ?></div>
        
        <?php echo $form->hiddenField( $model, 'receiver_id' ); ?>
                        
        <?php echo $form->textArea( $model, 'message', array( 'class'=>'mailingMessage', 'cols'=>'66', 'rows'=>'10', 'maxlength'=>'500', 'placeholder'=>'Enter Message') ); ?>
    </fieldset>
    
    <input class="gray_btn prev submit" type="submit" value="Cancel" name="Cancel" />
    <input class="blue_btn next submit" type="submit" value="Submit" name="Submit" />

<?php
$this->endWidget();
?>
