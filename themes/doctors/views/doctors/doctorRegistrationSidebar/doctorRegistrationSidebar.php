<div class="tin_menu red_menu">



	<div class="red_top"><h2>doctor's desk</h2></div>

	

	<div class="change_pic"><img src="<?php echo $imgSrc; ?>"></div>

	
    <?php if( $isLogged ): ?>
    <div id="file-uploader">
        <noscript><p>Please enable JavaScript to use file uploader.</p></noscript>
    </div>    
    <script>
    $(document).ready(function() {
        var uploader = new qq.FileUploader({
            element: document.getElementById('file-uploader'),
            action: '<?php echo $uploaderAction; ?>',
            debug: true,
            uploadButtonText: 'Add/Change Photo',
            onSubmit: function(id, fileName){$(".qq-upload-list").empty();},
            onComplete: function(id, fileName, responseJSON){ 
                $(".change_pic img").attr('src', responseJSON.src);                
            },
        });
    });     
    </script>
    <?php else: ?>
    <div style="height: 50px;"></div>
    <?php endif; ?>
	

	<ul>
    <?php if( $isLogged ): ?>
    <li><a href="<?php echo $liTags['profile'];?>"<?php echo @$liTags['profile_active'] ?>>Profile</a></li>
		<li><a href="<?php echo $liTags['account'];?>"<?php echo @$liTags['account_active'] ?>>Account</a></li>
		<li><a href="<?php echo $liTags['maps'];?>"<?php echo @$liTags['maps_active'] ?>>Locations</a></li>
		<li><a href="<?php echo $liTags['rating'];?>"<?php echo @$liTags['rating_active'] ?>>Rating</a></li>
		<li><a href="<?php echo $liTags['mails'];?>"<?php echo @$liTags['mails_active'] ?>>Emails</a></li>
		<li><a href="<?php echo $liTags['photos'];?>"<?php echo @$liTags['photos_active'] ?>>Photos</a></li>
		<li><a href="<?php echo $liTags['faq'];?>"<?php echo @$liTags['faq_active'] ?>>FAQ</a></li> 
		<li><a href="<?php echo $liTags['support'];?>"<?php echo @$liTags['support_active'] ?>>Support</a></li>
    <?php else: ?>
    <li><a>Profile</a></li>
		<li><a>Account</a></li>
		<li><a>Locations</a></li>
		<li><a>Ratings</a></li>
		<li><a>Emails</a></li>
		<li><a>Photos</a></li>
		<li><a>FAQ</a></li> 
		<li><a>Support</a></li>
    <?php endif; ?>

	</ul>

	

</div>

<div class="bottom">&#32;</div>