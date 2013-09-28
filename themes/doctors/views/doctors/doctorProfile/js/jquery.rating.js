/**
*   Art0fDesign Rating jQuery Functions  
*/
/*# AVOID COLLISIONS #*/
;if(window.jQuery) (function($){
/*# AVOID COLLISIONS #*/

$(document).ready(function() {
    // simulate new rating click
    //$(".new_rating_link").trigger('click');

    /**
     * render group's confidence factor value
     */
    function updateConfFactor( elem, value ){
        elem.parents('.rating_item').find('span.percent').html( value + '%' );
        elem.parents('.rating_item').find('input.cat_rate').val('1');
        elem.parents('.rating_item').find('input.conf_factor').val(value);
    }
    /*
     * retrieves category confidence factor base value
     */
    function categoryConfFactorBase( elem ){
        // selected element items wrapper
        var itemsWrapper = elem.parents('.rating_item');
        // confidence factor; sum of stars divided by 5
        var confItems = itemsWrapper.find('input.star_item').size() / 5;
        // confidence factor; add textarea count
        confItems += itemsWrapper.find('textarea').size();
        // finally round up confidence factor
        return Math.round(100 / confItems);
    }
    /**
     * Retrieves count of non empty textareas
     */
    function nonEmptyTextAreaCount( elem ){
        var areaCount = 0;
        elem.parents('.rating_item').find('textarea').each( function(index, elem){
            if( $(elem).val() != '' ) areaCount++;
        });
        return areaCount;
    }
    /**
     * recalculate group's values
     */
    function itemRatingCalculation( clickedItem, value )
    {        
        // related category wrapper
        var catWrapper = clickedItem.parents('.rating_item').find('.slider_cat');
        var itemsWrapper = clickedItem.parents('.slider_items');
        // average category slider value multiplied by 2
        var itemsSelected = 0; ratingSum = 0;
        // count through all selected stars
        itemsWrapper.find('input.star_item:checked').each(function(index, elem){
            ratingSum += parseInt( $(elem).val() );
            itemsSelected++;
        });
        //console.log( 'sum: ' + ratingSum + '; ' + itemsSelected );
        // catValue is 0-based index value        
        var catValue = Math.round((ratingSum/itemsSelected) * 2) - 1;
        catWrapper.find('input.star_cat:first').rating('readOnly',false).rating('select', catValue).rating('readOnly',true);
        // *** confidence factor ***
        // confidence factor update; count of selected stars and testareas
        //var areaCount = 0;
        //itemsWrapper.find('textarea').each( function(index, elem){if( $(elem).val() != '' ) areaCount++;});
        var confFactor = itemsSelected + nonEmptyTextAreaCount( clickedItem );
        //console.log(areaCount);
        // finally round up confidence factor
        confFactor *= categoryConfFactorBase( clickedItem );
        // update confidence factor value
        updateConfFactor( clickedItem, confFactor );
        catWrapper.next('input[type=hidden]').val('0');
        // update overall rating values
        overallRatingCalculation();
    }
    /** 
     * recalculate group conf factor after value change
     */
    function groupRatingCalculation( clickedItem, value ){
        // update confidence factor value
        var confFactor = categoryConfFactorBase( clickedItem );
        //clickedItem.parents('.rating_item').find('span.percent').html( confFactor + '%' );
        updateConfFactor( clickedItem, confFactor );
        // update 'at least one is rated' flag
        $("#new_rating_is_rated").val('1');
        // update overall rating values
        overallRatingCalculation();
    }
    /**
     * recalculate overall rating value and confidence factor
     */
    function overallRatingCalculation(  )
    {
        // calculate overall rating value
        var rate_sum = 0, rate_count = 0, conf_sum = 0;
        $("input.star_cat:checked").each(function(index, elem){
            rate_sum += parseInt($(elem).val());
            rate_count++;
        });
        var rate_value = Math.round(rate_sum / rate_count) - 1; 
        $(".star_overall").rating('enable').rating('select', rate_value).rating('disable');
        // calculate overall average of confidence factor
        rate_count = 0; // reset counter
        $(".rating_item input.conf_factor").each(function(index, elem){
            var elemVal = parseInt($(elem).val());
            if( elemVal ){
                rate_count++;
                conf_sum += elemVal;
            }
        });
        var conf_factor = Math.round(conf_sum / rate_count);
        $("div.rating_wrapper div.rating_overall span.percent").html( conf_factor + '%' );
        $("div.rating_wrapper div.rating_overall input.conf_factor").val(conf_factor);
    }
    
    // opens new rating dialog box 
    $(".new_rating_link").click(function(e){
        e.preventDefault();
        // Append div to body 
        $('#new-rating-popup').tmpl().appendTo('body');
        // Popup div
        $("#new_rating_popup").bPopup({
            modalClose:false,
            // prepare rating functions
            onOpen:function(){
                $(".star_item").rating({
                    callback:function(value, link){itemRatingCalculation($(this), value)}
                });
                $(".star_cat").rating({
                    split:2,
                    callback:function(value, link){groupRatingCalculation($(this), value)}
                });
                $(".star_overall").rating({
                    split:2
                });
                
            },/**/
            onClose:function(){$("#new_rating_popup").remove()}
        });

    });
    
    // opens view rating dialog box 
    $(".view_rating_link").click(function(e){
        e.preventDefault();
        var userID = $(this).attr('uid');
        // alert(userID); return false;
        // Append div to body 
        $('#view-rating-popup-' + userID).tmpl().appendTo('body');
        // Popup div
        $("#view_rating_popup_" + userID).bPopup({
            modalClose:false,
            // prepare rating functions
            onOpen:function(){
                $(".star_item").rating({
                    callback:function(value, link){itemRatingCalculation($(this), value)}
                });
                $(".star_cat").rating({
                    split:2,
                    callback:function(value, link){groupRatingCalculation($(this), value)}
                });
                $(".star_overall").rating({
                    split:2
                });
            },
            onClose:function(){$(this).remove()}
        });

    });

    $('.new_rating_login').click(function(){
        /* Clean up DOM */
        $('#blanket').remove();
        $('#popUpDiv').remove();
        
        /* append to body */
        var notes = {memo:"You need to be logged in to rate this doctor.", memo_nl:"Please login or Sign up if you don't have account."};
        $('#login-script-id').tmpl(notes).appendTo('body');

        /* Popup data */
        popup('popUpDiv');
        $("html, body").animate({ scrollTop: $('#popUpDiv').offset().top - 30 }, "slow");
    
        return false;
    });

    $(document).on( 'click', '.rating_link_complete', function(e){
        e.preventDefault();
    })
    // Close rating window
    $(document).on('click', "#new_rating_cancel", function(e){
        e.preventDefault();
        // hide testimonial field or cancel rating 
        if( $(".rating_testimonial").is(':visible') ){
            $("#new_rating_form .rating_testimonial").hide();
            $("#new_rating_form .rating_wrapper").show();
        } else {
            $("#new_rating_popup").bPopup().close();
        }
    });
    // textarea text input could change confidence factor
    $(document).on('keyup', '.slider_items textarea', function(){
        itemRatingCalculation( $(this) );
    });
    // saving data
    $(document).on('click', '#new_rating_save', function(e){
        e.preventDefault();
        // check is at least one category is rated
        if( $("#new_rating_is_rated").val() == '0' ){
            alert('At least one category must be rated');
            return false;
        }
        // display testimonial field or submit form
        if( $(".rating_testimonial").is(':visible') ){
            $("#new_rating_form").submit();            
        } else {
            $("#new_rating_form .rating_wrapper").hide();
            $("#new_rating_form .rating_testimonial").show();
        }
        /*
        var adata = $("#new_rating_form").serialize();
        var jqxhr = $.getJSON('', adata, function(data, status){
            console.log( data );
        }).error(function(){ alert('Sorry, something went wrong!'); });
        /**/
    });
    
    // questions accordion
    $(document).on('click', ".ratingCategoryButton", function(e){
        var itemsContent = $(this).nextAll(".slider_items");
        e.preventDefault();
        if( $(this).hasClass('on') ){
            $(this).removeClass('on').html('more');
            // enable category rating stars
            //$(this).nextAll('.slider_cat').find('input').rating('readOnly', false);
            $(this).nextAll('.slider_cat').find('input.star_cat:first').rating('enable');
            //$(this).nextAll('.slider_cat').find('input[type=hidden]').val(true);
            // hide items
            itemsContent.slideUp('normal');
        } else {
            $('.ratingCategoryButton.on').removeClass('on').html('more');
            $(".slider_items").slideUp('normal');

            $(this).addClass('on').html('less');
            // disable category rating stars
            //$(this).nextAll('.slider_cat').find('input').rating('readOnly', true);
            $(this).nextAll('.slider_cat').find('input.star_cat:first').rating('disable');
            //$(this).nextAll('.slider_cat').find('input[type=hidden]').val(false);
            // show items
            itemsContent.slideDown('normal');
        }
    });
        
});
/*# AVOID COLLISIONS #*/
})(jQuery);
/*# AVOID COLLISIONS #*/
