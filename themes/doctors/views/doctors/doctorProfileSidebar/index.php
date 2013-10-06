<?php
    if( (Yii::app()->getTheme())!==null ) $baseUrl = Yii::app()->theme->baseUrl;
    else $baseUrl = Yii::app()->request->baseUrl . '/' . $this->publicPath;
?>
<div class="tin_menu red_menu">



    <div class="red_top"><h2>dr <?php echo $model->fullName; ?></h2></div>



    <div class="change_pic"><img src="<?php echo $model->getThumbSrc(); ?>" /></div>



    <a class="blue_btn favorite1" href="<?php echo $hrefs['edit']; ?>">Change profile</a>



    <ul>

        <li<?php echo @$hrefs['profile_active'] ?>><a href="<?php echo $hrefs['profile']; ?>">My profile</a></li>

        <li<?php echo @$hrefs['schedules_active'] ?>><a href="<?php echo $hrefs['schedules']; ?>">My schedules</a></li>

        <li<?php echo @$hrefs['maps_active'] ?>><a href="<?php echo $hrefs['maps']; ?>">My Maps</a></li>

        <li<?php echo @$hrefs['ratings_active'] ?>><a href="<?php echo $hrefs['ratings']; ?>">My rating</a></li>

        <li<?php echo @$hrefs['mails_active'] ?>><a href="<?php echo $hrefs['mails']; ?>">My mails</a></li>

        <li<?php echo @$hrefs['photos_active'] ?>><a href="<?php echo $hrefs['photos']; ?>">My Photos</a></li>

        <li<?php echo @$hrefs['recommendations_active'] ?>><a href="<?php echo $hrefs['recommendations']; ?>">Recommendations</a></li>

        <li<?php echo @$hrefs['account_active'] ?>><a href="<?php echo $hrefs['account']; ?>">Account</a></li>

        <li<?php echo @$hrefs['faq_active'] ?>><a href="<?php echo $hrefs['faq']; ?>">FAQ</a></li>

        <li<?php echo @$hrefs['support_active'] ?>><a href="<?php echo $hrefs['support']; ?>">Support</a></li>

        <li<?php echo @$hrefs['pricing_active'] ?>><a href="<?php echo $hrefs['pricing']; ?>">Pricing</a></li>

    </ul>


<!--
    <div class="badges">

    <h3>Practice Performance Badges</h3>

            <img src="<?php echo $baseUrl;?>/img/badge1.png" alt="MEDAL" style="margin-left:36px;">

            <img src="<?php echo $baseUrl;?>/img/badge2.png" alt="MEDAL">

            <img src="<?php echo $baseUrl;?>/img/badge3.png" alt="MEDAL">

    </div>
 -->


    <?php if( !empty( $model->soc_twitter ) || !empty( $model->soc_facebook ) || !empty( $model->soc_linkedin ) || !empty( $model->soc_google ) ): ?>
    <h3>Follow This Doctor</h3>
    <ul class="social1">
        <?php if( !empty( $model->soc_twitter ) ):?>
        <li><a href="<?php echo 'https://www.twitter.com/' . $model->soc_twitter; ?>" class="twitter" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $model->soc_facebook ) ):?>
        <li><a href="<?php echo 'https://www.facebok.com/' . $model->soc_facebook; ?>" class="fb" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $model->soc_linkedin ) ):?>
        <li><a href="<?php echo $model->soc_linkedin; ?>" class="linkedin" target="_blank">&#32;</a></li>
        <?php endif;?>
        <?php if( !empty( $model->soc_google ) ):?>
        <li><a href="<?php echo 'https://plus.google.com/' . $model->soc_google; ?>" class="google" target="_blank">&#32;</a></li>
        <?php endif;?>
    </ul>
    <?php endif;?>



</div>

<div class="bottom">&#32;</div>