/**
*   Art0fDesign Rating jQuery Functions  
*/
/*# AVOID COLLISIONS #*/
;if(window.jQuery) (function($){
/*# AVOID COLLISIONS #*/

$(document).ready(function() {
    //alert('Rating is ready!');
    
    $(".star_item").rating({
        callback:function(value, link){
            //itemRatingCalculation($(this));
            $("#cat_1").find('input:first').rating('select', value-1);
            $(this).parents('.rating_item').find('.slider_cat input:first').rating('select',value-1);                        
            console.log($(this).parents('.rating_item').find('.slider_cat input:first').size());
        },
        //readOnly: true
    });
    $(".star_cat").rating({
        split:2,
        //callback:function(value, link){
        //    console.log( 'Group value ' + value );
        //}
    });/**/
    
    $(document).on('click', ".ratingCategoryButton", function(e){
        var itemsContent = $(this).nextAll(".ratingItemsContent");
        var msg = 'Click!';
        e.preventDefault();
        if( $(this).hasClass('on') ){
            $(this).removeClass('on').html('more');
            //$('input[type=radio]', this.form).rating('readOnly',true);
            // disable items rating
            //itemsContent.find('input.star_item').rating('readOnly',true);
            // enable category item
            $(this).nextAll('.slider_cat').find('input').rating('readOnly', false);
            // hide items
            itemsContent.slideUp('normal');
        } else {
            $(this).addClass('on').html('less');
            // enable rating items
            //itemsContent.find('input.star_item').rating('readOnly',false);
            // disable category item
            $(this).nextAll('.slider_cat').find('input').rating('readOnly', true);
            // show items
            itemsContent.slideDown('normal');
        }
    });
    
    /*$(document).on('click', '.star_item', function(e){
        e.preventDefault();
        //
        var catWrapperID = $(this).parents('.rating_item').children('.slider_cat');//.attr('id').toString();
        var catValue = 3;// $(this).val() - 1;
        //
        //alert( $("#" + catSlider).find('input').size() );
        //$("#cat_1").find('input').rating('select', catValue);
        //$("#" + catWrapperID).find('input').rating('select', catValue);
        catWrapperID.find('input').rating('select', catValue);
        //alert( catSlider );
        //catSlider.rating('select','2');
        //alert( catSlider.attr('id') );
        console.log( 'catwrapperid id: ' + catWrapperID.attr('id') + '; catValue: ' + catValue );
    });/**/

    function itemRatingCalculation( clickedItem )
    {        
        var msg = clickedItem.attr('name') + '->' + clickedItem.val();
        console.log(msg);
        var catWrapperID = clickedItem.parents('.rating_item').find('.slider_cat').attr('id').toString();
        var catValue = clickedItem.val() - 1;
        //
        //alert( $("#" + catSlider).find('input').size() );
        $("#" + catWrapperID).find('input:first').rating('select', catValue);
        $("#cat_1").find('input:first').rating('select', catValue);
        console.log(catWrapperID);
        //alert( catSlider );
        //catSlider.rating('select','2');
        //alert( catSlider.attr('id') );
    }

    $("#new_rating_link").click(function(e){
        e.preventDefault();
        alert('Popup');
        // Append form tobody 
        //$('#new-rating-popup').tmpl().appendTo('body');
        // Popup div
        $("#new_rating_popup").bPopup({
            modalClose:false,
            //onOpen:function(){$(".rating_slider").barrating()},
            /*
            onOpen:function(){
                $(".star_item").rating({
                    callback:function(value, link){
                        //itemRatingCalculation($(this));
                        $("#cat_1").find('input:first').rating('select', value-1);
                        $(this).parents('.rating_item').find('.slider_cat input:first').rating('select',value-1);                        
                        console.log($(this).parents('.rating_item').find('.slider_cat input:first').size());
                    },
                    //readOnly: true
                });
                $(".star_cat").rating({
                    split:2,
                    //callback:function(value, link){
                    //    console.log( 'Group value ' + value );
                    //}
                });/**/
            }
            //onClose:function(){$("#new_rating_popup").remove()}
        });
        
    });
    // Close rating window
    $(document).on('click', "#new_rating_cancel", function(e){e.preventDefault(); $("#new_rating_popup").bPopup().close();});
    
    $('.editView').click(function(e){
        e.preventDefault();
        //alert('click!');
        jQuery('#rating_popup').bPopup({modalClose:false});
    });


/*    $('#rate_update, #rate_cancel, #rate_create').click(function(){
        if( $(this).attr('id') == 'rate_update' || $(this).attr('id') == 'rate_create' ){
            $('.rating_result').hide();
            $('.rating_slider, .rating_select, #rate_submit, #rate_cancel').show();
        } else {
            $('.rating_slider, .rating_select, #rate_submit, #rate_cancel').hide();
            $('.rating_result').show();
        }
        return false;
    });
    $('#rate_submit').click(function(){
        // check is all votings are rated
        var url = $(this).attr('href');
        var err = '';
        var notVotedCount = $('.rating_slider:not([votedrate])').size();
        if( notVotedCount ){
            err += ' - ' + notVotedCount + " votes are not rated\n";
        }
        var waitTime =  parseInt($('#wait_time option:selected').val());
        if( waitTime == 0 ){ err += " - Waiting time not selected\n";}
        var visitsCount =  parseInt($('#visits_count option:selected').val());
        if( visitsCount == 0 ){ err += " - Visits count not selected\n";}
        var following =  parseInt($('#following option:selected').val());
        if( following == 0 ){ err += " - Following up not selected\n";}
        //
        if( err != '' ){ 
            err = "Rating cannot be processed because of following errors:\n" + err;
            alert( err ); return false; 
        }
        //console.log( notVotedCount ); return false;
        var postData = {};
        postData.Rating = 'Proceed';
        $('.rating_slider').each(function(){
            postData[$(this).attr('id').substring(2)] = $(this).attr('votedrate');
        });
        postData.wait_time = waitTime;
        postData.visits_count = visitsCount;
        postData.following = following;
        //console.log( postData ); return false;        
        $.post( '', postData, function(responseData){location.reload();}, 'json' );
        return false;
    });
/**/
});
/*# AVOID COLLISIONS #*/
})(jQuery);
/*# AVOID COLLISIONS #*/
