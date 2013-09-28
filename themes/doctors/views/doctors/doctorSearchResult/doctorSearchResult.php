<?php
$starsWidgetAlias = 'ext.doctors.doctorRatingStars.DoctorRatingStarsWidget';
// count of results in a group div
$resultGroupCount = 5;
//
$docType = ''; $renderResult = true;
$t = DoctorSearch::getFiltersFromCookie();
switch( @$t['cat_id'] ){
    case '2': $docType = 'Dental'; break; 
    case '3': $docType = 'Mental Health'; $renderResult=false; break; 
    case '4': $docType = 'Holistic'; $renderResult=false; break; 
    default: $docType = 'Medical'; break; 
}
// die("RenderResult: $renderResult");
//
$counter = 1; // items counter
$isGroupOpened = false; // is result group is opened
$liClass = ''; // item element's class
//
$imgUrl = Yii::app()->theme->baseUrl . '/img/';
$starsBase = Yii::app()->theme->baseUrl . '/js/jRating/icons/star_rating_';
$starsExt = '.png';
?>
<h1 id="search-top" class="title search" style="margin:10px 0 5px 0; font-size:28px;">
    <span style="color:#1e4b7d;">Top <?=$docType?> Doctors</span><?php echo $title;?>
    <?php if( count($doctors) != 0 && $renderResult ): ?>
    <span class="pagTop float_right">
        <?php if($page == 1):?>
            <a href="#search-top" class="inactive"><img src="<?=$imgUrl.'pag_left_top.jpg'?>" /></a>
        <?php else: ?>
            <a href="<?php echo $seeMoreBaseUrl . '/page/' . ($page-1) . ''; ?>"><img src="<?=$imgUrl.'pag_left_top.jpg'?>" /></a>
        <?php endif;?>
        <?php if($page == $pageCount):?>
            <a href="#search-top" class="inactive"><img src="<?=$imgUrl.'pag_right_top.jpg'?>" /></a>
        <?php else: ?>
            <a href="<?php echo $seeMoreBaseUrl . '/page/' . ($page+1) . ''; ?>"><img src="<?=$imgUrl.'pag_right_top.jpg'?>" /></a>
        <?php endif;?>
    </span>
    <?php endif;?>

</h1>

<?php if( count($doctors) != 0 && $renderResult ): ?>
<div class="searchlist topsearch">
	<label>Sort by:</label>
	<select id="sort" class="styled" name="sort">
        <?php foreach( $sortArray as $key => $item ){ ?>
        <option value="<?php echo $key;?>"<?php echo $item['selected']; ?>><?php echo $item['text']; ?></option>
        <?php } ?>
	</select>
</div>
<?php endif;?>

<div id="search_result">
<?php if( count($doctors) != 0 && $renderResult ): ?>
<?php 
foreach( $doctors as $key=>$item ){
$reviewUrl = $reviewBaseUrl . $item->id . '/' . MyFunctions::parseForSEO($item->getFullName());
?>
<?php $detailStars = DoctorsUserRating::getResultRatingStars( $item->id, 0, 'search' );?>
<?php //MyFunctions::echoArray($detailStars); ?>
<?php if( !$isGroupOpened ): ?><?php $isGroupOpened = true;?>		
<div class="result_group"<?php if( $counter != 1 ) echo ' style="display: none;"'; ?>>
    <ul class="results">
<?php endif; ?>
    	<li<?php echo $liClass; ?>> <?php if( $liClass == '' ): ?><?php $liClass = ' class="white"'; ?><?php else: ?><?php $liClass = ''; ?><?php endif;?>
    		<span class="No"><?php echo $key+1;//$counter;?></span>
    		<?php 
                $defLocation = DoctorsUserLocation::getDefaultLocation( $item->id );
                $locationText = ''; 
                if( !empty( $defLocation ) ) {
                    //$locationText = $defLocation->location->facility . ' ';
                    $locationText .= $defLocation->location->address . ' ';
                    $locationText .= $defLocation->location->city . ', ';
                    $locationText .= $defLocation->location->state_code . ' ';
                    $locationText .= $defLocation->location->zip_code;
                } 
            ?>
    		<a href="<?php echo $reviewUrl; ?>" class="picLink"><img src="<?php echo $item->getThumbSrc('search');?>" class="photo" alt="" /></a>
    		<a href="<?php echo $reviewUrl; ?>" class="picLink"><h2>Dr. <?php echo $item->getFullName();?>, <em><?php echo $item->md != 0? $item->degree->code . ', ': ''; ?><?php echo $item->phd; ?></em></h2></a>
            <?php echo $this->widget( $starsWidgetAlias, array( 'value'=>$detailStars[0], 'displayValue'=>true ) )->html; ?>

            
			<h4><?php echo $locationText; ?></h4>
            <p><?php echo $item->getShorterDescription( $item->description , 200, true ); ?></p>
    		<div class="medals">
    			<img src="<?php echo $imgUrl;?>medal1.png" alt="MEDAL">
    			<img src="<?php echo $imgUrl;?>medal2.png" alt="MEDAL">
    			<img src="<?php echo $imgUrl;?>medal3.png" alt="MEDAL">
    		</div>
            <div class="boardList">
			<span class="board first">Board certified </span><span class="<?php echo $item->f_board? 'on': 'off'; ?>"></span><br />
            <span class="board">Verified doctor </span><span class="<?php echo $item->f_verified? 'on': 'off'; ?>"></span>
			</div>
    		<a href="<?php echo $reviewUrl; ?>" class="lastA">See More...</a>
			
    	</li>
<?php if( ($counter == count( $doctors )) || (($counter % $resultGroupCount) == 0) ): ?><?php $isGroupOpened = false;?>
    </ul>
</div><!-- RESULT GROUP -->
<?php endif; ?>
<?php $counter++; ?>
<?php } ?>
<?php else: ?>
    <?php if(!$renderResult): ?>
        <h1>Coming soon!</h1>
    <?php elseif(DoctorSearch::isFilteredByIssue()): ?>
        <h1>Search doctors by issue is coming soon!</h1>
    <?php else: ?>
        <h1>No results match selected criteria!</h1>
        <p><?php echo $noDoctorsMessage;?></p>
    <?php endif; ?>
<?php endif; ?>
</div><!-- SEARCH RESULT -->

<!-- ============ PAGINATION ================ -->
<?php if( count($doctors) != 0 && $renderResult ): ?>
<span class="pagBott bottomsearch"><span class="float_left" style="margin:5px 5px 0 0;"><?php echo $paginationText; ?></span>
    <?php if($page == 1):?>
        <a href="#search-top" class="inactive"><img src="<?=$imgUrl.'pag_left_bottom.jpg'?>" /></a>
    <?php else: ?>
        <a href="<?php echo $seeMoreBaseUrl . '/page/' . ($page-1) . ''; ?>"><img src="<?=$imgUrl.'pag_left_bottom.jpg'?>" /></a>
    <?php endif;?>
    <?php if($page == $pageCount):?>
        <a href="#search-top" class="inactive"><img src="<?=$imgUrl.'pag_right_bottom.jpg'?>" /></a>
    <?php else: ?>
        <a href="<?php echo $seeMoreBaseUrl . '/page/' . ($page+1) . ''; ?>"><img src="<?=$imgUrl.'pag_right_bottom.jpg'?>" /></a>
    <?php endif;?>
</span>
<?php endif; ?>
<div class="clear"></div>

<?php if( !empty($gmap) ):?>
<div class="map" style="width: 760px;">
<?php echo @$gmap;?>
</div>
<?php endif;?>
