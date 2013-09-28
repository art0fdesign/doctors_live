<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    

?>
<div class="picture">



    <img src="<?php echo $baseUrl; ?>/img/pic_member.jpg" alt="Picture">

    <h1 class="title1"><span class="blue">become</span><br/>

        a member<br/>

        <em>create doctor account<br/>

            fast and easy</em>

    </h1>



</div>

<?php if( empty($miscSettings['activation-check-mail-html']) ): ?>

<h1 class="title">Activate Account:</h1>

<p>Check Your Inbox to find instructions about activating account</p>

<?php else: ?>

<?php echo $miscSettings['activation-check-mail-html']['set_value']; ?>

<?php endif; ?>
