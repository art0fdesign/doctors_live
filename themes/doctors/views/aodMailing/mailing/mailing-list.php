<?php
$baseUrl = Yii::app()->theme->baseUrl;
$counter = 0;
?>
<div class="title">
    <?=$listUserFullName?>
    <a class="float_right" href="#" id="mailReply">reply</a>
    <div class="mailThreadReply">
        <?php $form = $this->beginWidget('CActiveForm', array( 'id'=>'mailing-reply-form', 'enableAjaxValidation'=>false ));  ?>
            <fieldset>
                <?php //echo $form->hiddenField( $model, 'receiver_id' ); ?>
                <?php echo $form->textArea( $model, 'message', array('rows'=>10, 'cols'=>64, 'placeholder'=>'Enter Message to reply') ); ?>
            <input class="float_right" type="submit" name="Submit" value="Send" />
            </fieldset>
        <?php $this->endWidget();?>
    </div>
</div>

<ul class="mailThread">

<?php if( count( $mails ) == 0 ): ?>
        <h2>No conversation to display</h2>

<?php endif; ?>
<?php 
foreach( $mails as $item ){ 
    $counter++; $classWhite = $counter & 1;
    $params = array(    
        'classWhite' => $classWhite,
        'senderName' => $item->sender->user_name,
        'message'    => $item->message,
        'createdDT'  => $item->created_dt,
    );
    echo $this->render( '_list-item', $params, true );
} 
?>

</ul>
<?php if( count( $mails ) != 0 ): ?>
<?php if( $hrefPagination != '#' ): ?>
<div class="seemore"><a href="<?=$hrefPagination?>">Load Older Messages</a></div>
<?php else: ?>
<div class="seemore">Thread started on <?=$createdDT?></div>
<?php endif; ?>
<div class="ajaxLoading mailAjax"><img src="<?=$baseUrl?>/img/ajax-loader.gif" /></div>
<?php endif; ?>
