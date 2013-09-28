	<li<?php if( @$classWhite ) echo ' class="white"'; ?>>
		<h2><?=$senderName?></h2>
		<?php //echo CHtml::encode($message);?>
		<p><?php echo $message;?></p>
		<span><?php echo date( 'F jS Y, g:i:sa', strtotime( $createdDT ) ); ?></span>
	</li>
