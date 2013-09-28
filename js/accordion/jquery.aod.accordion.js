/**
*   Art0fDesign Accordion Content jQuery Functions
-------------------------------------------------------
Thanks to Menu Colapsed script that was 
 DEVELOPED BY: Ryan Stemkoski
 COMPANY: Zipline Interactive
 EMAIL: ryan@gozipline.com 
-------------------------------------------------------
* For better performance set accordionContent display property to none
* 'on' class is used for styling purpose
*/
;(function($) {
    
$(document).ready(function() {
    var accordionWrapperClass = 'accordionWrapper';
    var accordionButtonClass = 'accordionButton';
    var accordionContentClass = 'accordionContent';
    //
    $(document).on('click', '.' + accordionButtonClass, function(e){
        e.preventDefault();
        //
        // remove 'on' class
        $('.' + accordionButtonClass).removeClass('on').html('more');
        // close all opened divs
        $(this).parents('.' + accordionWrapperClass).find('.' + accordionContentClass).slideUp('normal');
        // reference buttons content
        var nextContent = $(this).nextAll('.' + accordionContentClass);        
        // open slide
        if( nextContent.is(':hidden') ){
            // add 'on' class
            $(this).addClass('on').html('less');
            // show slide
            nextContent.slideDown('normal');
        }
        
    });
});

})(jQuery);
