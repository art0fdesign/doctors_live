<?php
/**
 * Created by Lemmy.
 * Date: 8/9/12
 * Time: 1:39 PM
 */ ?>

<h1 class="title">Post: <?php echo $model->blog_name; ?></h1>
<div class="route general">
    <?php echo $model->blog_content; ?>
</div>

<h1 class="title" style="margin-top:20px;">Comments</h1>
<?php if(!empty($comments)): ?>
<?php foreach($comments as $comment): ?>
    <div class="blog">
        <p class="subtitle">by:&nbsp;<?=@$comment->creator->user_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->formatDate(); ?></p>
        <p><?php echo $comment->comment_content; ?></p>
    </div>
<?php endforeach; ?>
<?php endif; ?>


<?php
    $error = false;
    $inputOptions = array( 'class'=>'textbox textbox6', 'tabindex'=>'60');
    if( Yii::app()->webuser->isGuest ){
        $inputOptions['readonly']='readonly';
        $error = true;
    }


    //
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'blog-comment-form',
    'enableAjaxValidation'=>true,
    //'htmlOptions'=>array('class'=>'form'),
));  ?>



        <?php if($error):  ?>
        <dl class="float" style="margin-left: 10px">
            <dt>
            <p><h3>You must be logged in to leave a comment!</h3></p>
            </dt>
        </dl><br class="clear"/>
    <?php  endif ?>

    <fieldset>

        <dl class="float_left">
            <dt>
                <label for="comment_content">LEAVE A COMMENT:*</label>
                <?php echo $form->error($newComment, 'comment_content') ?>
            </dt>
            <dd>
                <?php echo $form->textArea($newComment,'comment_content', $inputOptions); ?>
            </dd>
        </dl>
        <dl class="float_right clear">
            <dd>
                <?php echo CHtml::submitButton('Submit', array('id'=>'form_id','name'=>'save', 'class'=>'blue_btn submit contactbtn', 'tabindex'=>'60')) ?>
            </dd>
        </dl>
    </fieldset>
    <?php if($error): ?>
    <script type="text/javascript">
    $('#form_id').click(function(){
    //
    return false;
    });
    </script>
        <?php endif ?>
<?php  $this->endWidget(); ?>
