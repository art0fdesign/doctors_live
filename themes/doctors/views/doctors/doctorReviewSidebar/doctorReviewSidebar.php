<?php
$imgUrl = Yii::app()->theme->baseUrl . '/img/';
?>
<div class="tin_menu red_menu">

    <div class="red_top"><h2>dr <?php echo $doctor->getFullName(); ?></h2></div>

    <div class="change_pic"><img src="<?php echo $doctor->getThumbSrc('desk');?>"></div>

    <?php if( in_array( $doctor->id, $favorites ) ): ?>
    <a id="favorite" class="blue_btn favorite1 favorite2">Unfavorite</a>
    <?else: ?>
    <a id="favorite" class="blue_btn favorite1">Add to favorite</a>
    <?php endif; ?>
    <?php if( !Yii::app()->webuser->isGuest ): ?>
    <input type="hidden" id="fav_getter" name="dtr_id" value="<?php echo $doctor->id;?>" />
    <input type="hidden" id="fav_setter" name="user_id" value="<?php echo Yii::app()->webuser->id; ?>" />
        <?php if( !in_array( $doctor->id, $favorites ) ): ?>
    <input type="hidden" id="fav_id" name="fav_id" value="0" />
        <?php else:?>
            <?php foreach( $favorites as $k=>$v ){ ?>
                <?php if( $v == $doctor->id ):?>
    <input type="hidden" id="fav_id" name="fav_id" value="<?php echo $k; ?>" />
                <?php endif; // set fav_id value ?>
            <?php } ?>
        <?php endif; // in_array ?>
    <?php endif; // if !isGuest ?>
    <ul>
        <li<?php echo @$hrefs['profile_active']; ?>><a href="<?php echo $hrefs['profile']; ?>">profile</a></li>
        <li<?php echo @$hrefs['maps_active']; ?>><a href="<?php echo $hrefs['maps']; ?>">maps &amp; directions</a></li>
        <li<?php echo @$hrefs['rating_active']; ?>><a href="<?php echo $hrefs['rating']; ?>">doctor ratings</a></li>
        <li<?php echo @$hrefs['gallery_active']; ?>><a href="<?php echo $hrefs['gallery']; ?>">photo gallery</a></li>


    </ul>

<!--    <div class="badges">
    <h3>Practice Performance Badges</h3>
            <img src="<?php echo $imgUrl;?>badge1.png" alt="MEDAL" style="margin-left:36px;">
            <img src="<?php echo $imgUrl;?>badge2.png" alt="MEDAL">
            <img src="<?php echo $imgUrl;?>badge3.png" alt="MEDAL">
    </div>
 -->
    <?php if( !empty( $doctor->soc_twitter ) || !empty( $doctor->soc_facebook ) || !empty( $doctor->soc_linkedin ) || !empty( $doctor->soc_google ) ): ?>
    <h3>Follow This Doctor</h3>
    <ul class="social1">
        <?php if( !empty( $doctor->soc_twitter ) ):?>
        <li><a href="<?php echo 'https://www.twitter.com/' . $doctor->soc_twitter; ?>" class="twitter" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $doctor->soc_facebook ) ):?>
        <li><a href="<?php echo 'https://www.facebok.com/' . $doctor->soc_facebook; ?>" class="fb" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $doctor->soc_linkedin ) ):?>
        <li><a href="<?php echo $doctor->soc_linkedin; ?>" class="linkedin" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $doctor->soc_google ) ):?>
        <li><a href="<?php echo 'https://plus.google.com/' . $doctor->soc_google; ?>" class="google" target="_blank">&#32;</a></li>
        <?php endif;?>
    </ul>
    <?php endif;?>

</div>
<div class="bottom">&#32;</div>
