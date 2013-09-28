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


<?php if( $model->f_status ): // activation succeeded ?>

<?php if( empty($miscSettings['activation-result-success']) ): // no setting; display default html ?>
<h1 class="title">Account Activation Status:</h1>
<p>Inform user that activation is passed or not</p>
<?php else: // display setting's value ?>
<?php echo $miscSettings['activation-result-success']['set_value']; ?>
<?php endif; ?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $model->id; ?>">
    <input type="hidden" name="Action" value="LogIn">
    <input type="submit" name="Submit" value="Login" class="blue_btn submit" />
</form>

<?php else: // activation failed ?>

<?php if( empty($miscSettings['activation-result-fail']) ): // no setting; display default html ?>
<h1 class="title">Account Activation Status:</h1>
<p>Something went wrong in activation process!</p>
<?php else: // display setting's value ?>
<?php echo $miscSettings['activation-result-fail']['set_value']; ?>
<?php endif; ?>


<?php endif; // if($model->f_status) ?>
