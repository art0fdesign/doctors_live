<?php
$imgUrl = Yii::app()->theme->baseUrl . '/img/';
$starsBase = Yii::app()->theme->baseUrl . '/js/jRating/icons/star_rating_';
$starsExt = '.png';
?>
<h1 class="title search">Favorites Doctors</h1>

<div class="searchlist topsearch">
	<label>Sort by:</label><br/>
	<select id="sort" class="styled" name="sort" url="<?php echo $sorterUrlBase; ?>">
        <?php foreach( $sortArray as $key => $item ){ ?>
        <option value="<?php echo $item['value'];?>"<?php echo $item['selected']; ?>><?php echo $item['text']; ?></option>
        <?php } ?>
	</select>
</div>

<?php if( !empty($gmap)): ?>
<div class="map">
    <?php echo $gmap;?>
</div>
<?php endif; ?>

<br />
<br />
<br />

<?php if( empty($favorites) ): ?>
<h2>No favorites are defined!</h2>
<?php endif; ?>

<ul class="results">

<?php $white=false; foreach( $favorites as $key=>$item ){?>
<?php $detailStars = DoctorsUserRating::getResultRatingStars( $item->id );?>
	<li<?php if( $white ):?> class="white"<?php endif; $white = !$white;?>>
		<span class="No"><?php echo $key+1; ?></span>
		<?php 
            $defLocation = DoctorsUserLocation::getDefaultLocation( $item->id );
            $locationText = ''; if( !empty( $defLocation ) ) $locationText = $defLocation->location->city . ', ' . $defLocation->location->state_code; 
        ?>
        <img src="<?php $thumbSrc = $item->getThumbSrc('search'); echo $thumbSrc; ?>" class="photo" alt="<?php if( $thumbSrc ) echo MyFunctions::parseForSEO($item->fullName);?>" />
		<h2>Dr. <?php echo $item->getFullName();?>, <em><?php echo $locationText; ?></em></h2>
		<div class="stars">
			<img src="<?php echo $starsBase . $detailStars[1] . '_details' . $starsExt; ?>" alt="STAR">
			<img src="<?php echo $starsBase . $detailStars[2] . '_details' . $starsExt; ?>" alt="STAR">
			<img src="<?php echo $starsBase . $detailStars[3] . '_details' . $starsExt; ?>" alt="STAR">
			<img src="<?php echo $starsBase . $detailStars[4] . '_details' . $starsExt; ?>" alt="STAR">
			<img src="<?php echo $starsBase . $detailStars[5] . '_details' . $starsExt; ?>" alt="STAR">
		</div>
        <p><?php echo $item->getShorterDescription( $item->description , 120, true ); ?></p>
		<div class="medals">
			<img src="<?php echo $imgUrl;?>medal1.png" alt="MEDAL">
			<img src="<?php echo $imgUrl;?>medal2.png" alt="MEDAL">
			<img src="<?php echo $imgUrl;?>medal3.png" alt="MEDAL">
		</div>
		<a href="<?php echo $reviewUrlBase . $item->id . '/' . MyFunctions::parseForSEO($item->getFullName()); ?>">See More</a>
	</li>
<?php }?>

</ul>

<?php if( $page ): ?>
<span class="seemore"><a href="<?php echo $pagerUrl;?>">See More Doctors</a></span>
<?php endif;?>

