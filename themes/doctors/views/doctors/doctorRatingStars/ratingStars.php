
<div class="<?php echo $wrapperClass?>"<?php echo !empty($wrapperID)? ' id="'.$wrapperID.'"': ''?>>
    <img alt="STAR1" src="<?php echo $starsBase . $stars[1] . $starsExt; ?>" />
    <img alt="STAR2" src="<?php echo $starsBase . $stars[2] . $starsExt; ?>" />
    <img alt="STAR3" src="<?php echo $starsBase . $stars[3] . $starsExt; ?>" />
    <img alt="STAR4" src="<?php echo $starsBase . $stars[4] . $starsExt; ?>" />
    <img alt="STAR5" src="<?php echo $starsBase . $stars[5] . $starsExt; ?>" />
    <?php if ($displayValue): ?>
    <span class="stars_value"><?php echo number_format($value, 2); ?></span>
    <?php endif; ?>
</div>
