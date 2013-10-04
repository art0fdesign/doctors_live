<div class="titleBlock"><span>DASHBOARD</span></div>
<div class="wideContent">
	
    <?php if( $_SERVER['SERVER_ADDR'] == '127.0.01' || $_SERVER['SERVER_ADDR'] == '::1'): ?>
    <a href="<?php echo Yii::app()->createUrl('site/session'); ?>">SESSION DATA</a>
    <?php endif; ?>

</div>