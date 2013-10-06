<?php
$starsWidgetAlias = 'ext.doctors.doctorRatingStars.DoctorRatingStarsWidget';
$userID = Yii::app()->webuser->id * ( Yii::app()->webuser->relation == 'siteuser' );
//$baseUrl = Yii::app()->theme->baseUrl . '/img/';
// overall ratings data
$starsBase = Yii::app()->theme->baseUrl . '/js/jRating/icons/star_rating_';
$starsExt = '.png';
$ratingValue = $surveyDoctorRating->Public_Rating_Score;
$ratingCount = $surveyDoctorRating->totalReviews;
$compositeRatingValue = $surveyDoctorRating->Composite_Rating_Score;
// $ratingCount = DoctorsUserRating::getResultRatingCount( $this->doctorID, $userID );
$stars = DoctorsUserRating::getResultRatingStars( $this->doctorID, $userID );
// details ratings stars
for( $i=1; $i<=6; $i++ ){
    $detailStars[$i] = DoctorsUserRating::getResultRatingStars( $this->doctorID, $userID, 'rate_' . $i );
    $detailValues[$i] = DoctorsUserRating::getResultRatingValue( $this->doctorID, $userID, 'rate_' . $i );
}
// resolve md-phd caption
$mdPhd = !empty($model->phd)? $model->phd: '';
$mdPhd = $model->md != 0 && !empty($model->phd)? ', ' . $mdPhd: $mdPhd;
$mdPhd = $model->md != 0 ? $model->degree->code . $mdPhd: $mdPhd;
$mdPhd = !empty($mdPhd)? ', <em>' . $mdPhd . '</em>': '';

$claimURL = Yii::app()->getRequest()->getBaseUrl(true);
$claimURL .= '/member-registration';
$claimURL .= '/'.$model->id.'/'.MyFunctions::parseForSEO($model->fullName);
?>

<?php echo $breadcrumb?>

<h1 class="title">General Information:</h1>

<?php if (Yii::app()->webuser->isGuest && !$model->f_claimed): ?>
<div class="claim_profile">
    <a href="<?php echo $claimURL;?>">Is this you? - Claim Your Profile</a>
</div>
<?php endif;?>

<div style="display:inline-block;">

    <div class="halftitle">

        <h1><?php echo $model->getFullName() . $mdPhd;?></h1>
        
        <!-- <h2><?php echo @$model->getDefaultSpecialityName(); ?></h2> -->
        <?php foreach ($model->getSpecialitiesByName() as $specName): ?>
        <h2><?php echo $specName; ?></h2>
        <?php endforeach; ?>
        
        <span><?php echo $model->gender=='M'? 'Male': 'Female'; ?> - <?php echo $model->in_practice; ?> years experience</span> 
        
        

<?php if( is_object( $defLocation ) ): ?>
<?php $defLocationModel = DoctorLocation::model()->findByPk( $defLocation->location_id ); ?>
        <h3><?php echo $defLocationModel->facility;?></h3>
        <span><?php echo $defLocationModel->address . ', ' . $defLocationModel->city . ', ' . $defLocationModel->state_code . ' ' . $defLocationModel->zip_code; ?><br />
        <?php echo $defLocationModel->phone; ?></span>
<?php endif;?>
        
        <?php echo $model->description; ?>
    
    </div>



    <div class="halftitle" >

<?php if (!$summary['rated']): ?>
        <div class="rating_overall" style="margin-top:5px;">
            <span>No ratings made yet!</span>
<?php else: ?>
        <!-- OVERALL INFO DIV -->
        <div class="rating_overall" style="margin-top:5px;">
            <span>Patient Ratings &amp; Comments</span>
            <span class="float_right percent" style="width:45px; text-align:center;"><?php echo $summary['ratingScore']?></span>   
            <div class="float_right"> <?php echo $this->widget( $starsWidgetAlias, array( 'value'=>$summary['ratingScore'] ) )->html; ?> </div>
        
<?php if (isset($summary['ratingsByGroup'])): ?>
            <!-- categories -->
            <div class="rating_category">

<?php foreach( $summary['ratingsByGroup'] as $cat ):?>
                <div class="line">
                <h4><?php echo $cat->Category->Code?></h4>
                <span><?php echo $cat->Public_Rating_Score?></span>
                <div class="stars"> <?php echo $this->widget( $starsWidgetAlias, array( 'value'=>$cat->Public_Rating_Score ) )->html; ?> </div>
                </div>

<?php endforeach;?>            
            
            </div><!-- End of categories -->
            <br class="clear" />
<?php endif; // if (isset($summary['ratingsByGroup'])):?>

<?php endif; // if ($summary['rated']) ?>

        </div>

<?php if ($summary['displayReview']): ?>
        <a href="<?php echo $ratingBaseUrl.'/rating'; ?>" class="blue_btn submit">See Ratings</a><br/>
<?php endif; ?>
    
    
    </div>

</div>




<?php foreach( $choices as $item ){ ?>
<div class="route general">

    <h1 class="title"><?php echo $item->choiceItem->choice_name; ?>:</h1>
    
    <p><?php echo nl2br($item->description); ?></p>

</div>

<?php } ?>


<div class="route">

    <h1 class="title">Location:</h1>
    
    <p><?php foreach( $locations as $locItem ){ $item = $locItem->location; ?>
    <?php $address = $item->address . ', ' . $item->city . ', ' . $item->state_code . ' ' . $item->zip_code; ?>
    <h2 style="display:inline-block"><?php echo $item->facility;?></h2><span> - <?php echo $address;?></span><br />
    <?php } ?></p>
    
</div>

<?php if( !empty($gmap) ): ?>
<div class="map">
<?php echo @$gmap;?>
</div>	
<?php endif;?>

</div>