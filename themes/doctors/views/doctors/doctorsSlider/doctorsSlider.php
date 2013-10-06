<?php
$imgUrl = Yii::app()->theme->getbaseUrl();
?>

        <div id="left_scroll">
            <a href='javascript:slide("left");'><img src="<?php echo $imgUrl; ?>/img/arrow_left.png" alt="LEFT"></a>
        </div>

        <div id="carousel_inner">
            <ul id='carousel_ul'>
                <?php foreach ((array)$models as $model): ?>
                <li>
                    <a href="<?php echo $model['href']; ?>" class="slider_logo">
                        <img src="<?php echo $model['src']; ?>" />
                        <span class="slider_display_name"><?php echo $model['name']; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
<!--
                <li><a href="#" class="logo1"></a></li>
                <li><a href="#" class="logo2"></a></li>
                <li><a href="#" class="logo3"></a></li>
                <li><a href="#" class="logo4"></a></li>
                <li><a href="#" class="logo5"></a></li>
                <li><a href="#" class="logo1"></a></li>
                <li><a href="#" class="logo2"></a></li>
-->
            </ul>
        </div>

        <div id="right_scroll">
            <a href='javascript:slide("right");'><img src="<?php echo $imgUrl; ?>/img/arrow_right.png" alt="RIGHT"></a>
        </div>
