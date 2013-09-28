<div class="tin_menu red_menu">

	<div class="red_top"><h2>personal desk</h2></div>
	
	
	<ul>
<?php if( $isLogged ): ?>
		<li<?php echo @$hrefs['profile_active']; ?>><a href="<?php echo $hrefs['profile']; ?>">My Account</a></li>
		<li<?php echo @$hrefs['favorites_active']; ?>><a href="<?php echo $hrefs['favorites']; ?>">Favorites</a></li>
		<li<?php echo @$hrefs['faq_active']; ?>><a href="<?php echo $hrefs['faq']; ?>">FAQ</a></li>
		<li<?php echo @$hrefs['support_active']; ?>><a href="<?php echo $hrefs['support']; ?>">Support</a></li>
<?php else: ?>
		<li><a>My Account</a></li>
		<li><a>Favorites</a></li>
		<li><a>FAQ</a></li>
		<li><a>Support</a></li>
<?php endif; ?>
	</ul>
	
</div>
<div class="bottom">&#32;</div>

