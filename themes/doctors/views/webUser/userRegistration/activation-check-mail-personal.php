<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;    
?>
<div class="picture">
		
	<img src="<?php echo $baseUrl; ?>/img/pic_personalize.jpg" alt="Picture">
	<img src="<?php echo $baseUrl; ?>/img/30.png" alt="30" class="number">
	<h1 class="title2"><span class="blue">personalize</span><br/>
		<span class="gray">seconds</span><br/>
		<em>free registration</em>
	</h1>
	
	<ul>
		<li>Copywriters at your layouts deserve</li>
		<li>Lorem ipsum dolor sit amet, consectetur</li>
		<li>Do your layouts deserve better than</li>
		<li>Apply as an art director and team</li>
	</ul>
	
	
	<a href="#" class="blue_btn">Personalize</a>

</div>

<?php if( empty($miscSettings['activation-check-mail-html']) ): ?>

<h1 class="title">Activate Account:</h1>

<p>Check Your Inbox to find instructions about activating account</p>

<?php else: ?>

<?php echo $miscSettings['activation-check-mail-html']['set_value']; ?>

<?php endif; ?>
