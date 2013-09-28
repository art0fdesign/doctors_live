	<li<?php if( $classWhite ) echo ' class="white"'; ?>>
        <img class="photo" alt=" " src="<?=$imgSrc?>" title="<?=$fullName?>" />
		<h2><?=$fullName?>, <em><?=$locationText?></em></h2>
		<p class="mailshort"><?php echo MyFunctions::getShortText( $message, 100, '...' );?></p>
		<span class="maildate"><?php echo date( 'F jS Y, g:ia', strtotime( $createdDT ) ); ?></span>
		<a class="read_mail" href="<?=$href?>">Read Messages</a>
		<img src="<?=$baseUrl?>/img/mail_status_<?=$mailStatus?>.png" class="mail_photo" alt=" " />
	</li>
