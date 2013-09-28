<?php
$starsWidgetAlias = 'ext.doctors.doctorRatingStars.DoctorRatingStarsWidget';
$categories = $model->getSurveyCategories( $surveyUserRatingID );
// MyFunctions::echoArray( $testimonial, $categories );
?>
<script id="view-rating-popup-<?php echo $surveyUserID;?>" type="text/x-jquery-tmpl">
<div id="view_rating_popup_<?php echo $surveyUserID;?>" class="rating_popup">
    <a class="back b-close">back</a>
    <form id="new_rating_form" method="post">
        <div class="rating_wrapper">

		<!-- OVERALL INFO DIV -->
			<div class="rating_overall">
				<span>Patient Ratings &amp; Comments</span>
				<!--<a href="" class="rating_link_complete float_right percent"> Complete </a>-->
				<span class="float_right percent"><?php echo $confidenceFactor? round($confidenceFactor).'%': '&nbsp;'?></span>
				<div class="float_right" class="slider_overall">
                    <input name="Rating[value]" type="radio" class="star_overall required" value="1" disabled="disabled"<?php if( round($ratingScore * 2) == 1 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="2" disabled="disabled"<?php if( round($ratingScore * 2) == 2 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="3" disabled="disabled"<?php if( round($ratingScore * 2) == 3 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="4" disabled="disabled"<?php if( round($ratingScore * 2) == 4 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="5" disabled="disabled"<?php if( round($ratingScore * 2) == 5 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="6" disabled="disabled"<?php if( round($ratingScore * 2) == 6 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="7" disabled="disabled"<?php if( round($ratingScore * 2) == 7 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="8" disabled="disabled"<?php if( round($ratingScore * 2) == 8 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="9" disabled="disabled"<?php if( round($ratingScore * 2) == 9 ) echo ' checked="checked"' ?> />
                    <input name="Rating[value]" type="radio" class="star_overall required" value="10" disabled="disabled"<?php if( round($ratingScore * 2) == 10 ) echo ' checked="checked"' ?> />
                </div>
                <input name="Rating[conf_factor]" type="hidden" class="conf_factor" value="<?php echo $confidenceFactor?>" />
			</div>

<?php foreach( $categories as $category ):?>
            <!-- category -->
            <div class="rating_item">
            
                <p class="float_left" style="width:50%;"><?php echo $category['title']?></p>
                <a href="#" class="float_right percent ml5 ratingCategoryButton">More</a>
                <span class="float_right percent ml5"><?php echo (int)@$category['Complete_Percent']? round($category['Complete_Percent']).'%': '&nbsp;'?></span>
                
                <div id="cat_<?php echo $category['id'] ?>" class="float_right ml5 slider_cat">
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat required" value="1" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 1 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="2" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 2 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="3" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 3 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="4" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 4 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="5" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 5 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="6" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 6 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="7" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 7 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="8" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 8 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="9" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 9 ) echo ' checked="checked"'?> />
                    <input name="Rating[category][<?php echo $category['id']?>][value]" type="radio" class="star_cat" value="10" disabled="disabled"<?php if( round( @$category['Public_Rating_Score'] * 2 ) == 10 ) echo ' checked="checked"'?> />
                </div>
                <input name="Rating[category][<?php echo $category['id']?>][cat_rate]" class="cat_rate" type="hidden" value="<?php echo (int)@$category['Category_Rated'] ?>" />
                <input name="Rating[category][<?php echo $category['id']?>][conf_factor]" class="conf_factor" type="hidden" value="<?php echo (int)@$category['Complete_Percent'] ?>" />

                <!-- questions -->
                <div class="rating_category slider_items">
<?php $questions = $model->getSurveyQuestions( $category['id'], $surveyUserRatingID ); ?>
<?php foreach( $questions as $question ):?>
<?php if($question['ResponseType_ID'] == 2): // textarea?>
                    <div class="line table" style="width:100%;">
                    <h4 class="pt20"><?php echo $question['Question']?></h4>
                    <div class="float_right stars mt15 mb10">
                        <textarea name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" class="textarea" placeholder="Please provide detailed comments..." disabled="disabled"><?php echo @$question['Answer_Text']?></textarea>
                    </div><br class="clear"/>
        			</div>
<?php else: // stars?>
                    <div class="line">
        			<h4><?php echo $question['Question']?></h4>
                        <div class="stars">
                            <input name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" type="radio" class="star_item required" value="1" disabled="disabled" data-cat="cat_<?php echo $category['id'] ?>"<?php if( (int)@$question['Answer_Score'] == 1 ) echo ' checked="checked"' ?> />
                            <input name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" type="radio" class="star_item" value="2" disabled="disabled" data-cat="cat_<?php echo $category['id'] ?>"<?php if( (int)@$question['Answer_Score'] == 2 ) echo ' checked="checked"' ?> />
                            <input name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" type="radio" class="star_item" value="3" disabled="disabled" data-cat="cat_<?php echo $category['id'] ?>"<?php if( (int)@$question['Answer_Score'] == 3 ) echo ' checked="checked"' ?> />
                            <input name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" type="radio" class="star_item" value="4" disabled="disabled" data-cat="cat_<?php echo $category['id'] ?>"<?php if( (int)@$question['Answer_Score'] == 4 ) echo ' checked="checked"' ?> />
                            <input name="Rating[category][<?php echo $category['id']?>][items][<?php echo $question['id']?>]" type="radio" class="star_item" value="5" disabled="disabled" data-cat="cat_<?php echo $category['id'] ?>"<?php if( (int)@$question['Answer_Score'] == 5 ) echo ' checked="checked"' ?> />
                        </div>
        			</div>
<?php endif;?>

<?php endforeach; // question ?>
                </div><!-- End of questions -->
            
            </div><!-- End of category -->    
        

<?php endforeach; // category ?>
		</div>

    </form>

    <a href="#" class="blue_btn floatL mt20 pl15 pr15 b-close"><strong>Close</strong></a>

</div>
</script>
