<?php
$starsWidgetAlias = 'ext.doctors.doctorRatingStars.DoctorRatingStarsWidget';
// MyFunctions::echoArray($summary);
?>
<?php echo $breadcrumb?>

<?php /** Show or not a link for making new rate */?>
<?php //Yii::app()->end(); ?>
<?php //MyFunctions::echoArray(Yii::app()->webuser->isGuest); ?>
<?php if( !Yii::app()->webuser->isGuest && !empty($newRatingPopupHTML) && intval(@$summary['doctorID']) != Yii::app()->webuser->id ):?>
<span class="path path1<?php echo count($models)? '': ' path2'; ?>"><a href="#" class="new_rating_link blue_btn">Rate this doctor</a></span>
<?php else:?>
<span class="path path1<?php echo count($models)? '': ' path2'; ?>"><a href="#" class="new_rating_login blue_btn">Rate this doctor</a></span>
<?php endif; ?>

<?php if( $saved ): /** after saving rate display info */?>
<div class="rating_overall" style="margin-top:58px;">
    <span class="blue">Thank you for rating. Your answers will be processed!</span>
</div>
<!-- OVERALL INFO DIV -->
<div class="rating_overall" style="margin-top:5px;">
<?php else:?>
<!-- OVERALL INFO DIV -->
<div class="rating_overall" style="margin-top:58px;">
<?php endif;?>

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
            
        </div><!-- End of category -->
<?php endif;?>
</div>
<div class="clear"></div>
<!-- TOTAL REVIEWS DIV -->
<!-- <div class="rating_totals">
    <span>Total Reviews: <?php echo $summary['totalReviews']?></span>
    <span style="float: right;">Relevant Reviews: <?php echo $summary['relevantReviews']?></span>
</div>
 -->
<?php if( count($models))://  show ratings?>
<div class="rating_wrapper accordionWrapper">
<?php foreach( $models as $model ):?>
    <!-- rating -->
    <div class="rating_item">
        <div class="titleItem">
            <h3><?php echo $model->user->fullName?></h3>
            <h5><?php echo $model->user->f_relation=='doctor'? 'Doctor': 'Patient'?></h5>
            <h6><?php echo str_replace( '-', ' of ', date('M-Y', strtotime($model->update_dt)))?></h6>
        </div>
        <p class="float_left"><?php echo nl2br( @$model->testimonial->Response ) ?></p>
        <a href="#" class="accordionButton float_right percent">More</a>
		<span class="float_right percent"><?php echo $model->Public_Rating_Score?></span>
        <div class="float_right"> <?php echo $this->widget( $starsWidgetAlias, array( 'value'=>$model->Public_Rating_Score ) )->html; ?> </div>
		
        <!-- category -->
        <div class="rating_category accordionContent">

<?php foreach( $model->category as $cat ):?>
            <div class="line">
			<h4><?php echo $cat->Category->Code?></h4>
            <span><?php echo $cat->Public_Rating_Score?></span>
            <div class="stars"> <?php echo $this->widget( $starsWidgetAlias, array( 'value'=>$cat->Public_Rating_Score ) )->html; ?> </div>
			</div>

<?php endforeach;?>            
            
        </div><!-- End of category -->

<?php if( $model->User_ID == Yii::app()->webuser->id ):?>        
        <!-- rating edit command -->
        <a href="#" class="editView new_rating_link">Edit</a> 
<?php else:?>
        <!-- rating view command -->
        <a href="#" class="editView view_rating_link" uid="<?php echo $model->User_ID;?>">View</a> 
        <?php echo $viewRatingPopupHTML[$model->User_ID];?>
<?php endif; ?>
    </div><!-- End of rating -->    
<?php endforeach;?>

</div>

<?php else: /** no survey defined or no ratings yet */ ?>

<div class="rating_wrapper accordionWrapper">
    <?php if( $surveyID == 0 ): ?>
    <h4>Doctor does not have rating survey defined!</h4>
    <?php else: ?>
    <h4>No ratings made yet!</h4>
    <?php endif;?>
</div>
<?php endif;?>
<div class="itemPagination">
<?php 
$this->widget( 'AodLinkPager', array( 
    'pages'=>$pages, 
    //'linkBaseUrl'=>$linkBaseUrl, 
    'cssFile'=>false, 
    'header'=>'',
    'prevPageLabel' => '&#171;', 
    'nextPageLabel' => '&#187;',
    'maxButtonCount' => '10', 
) );/**/
?>
</div>

<?php echo $newRatingPopupHTML ?>
