/**
*   Art0fDesign Site User Login jQuery Functions  
*/
$(document).ready(function(){
    $("#form_submit").click(function(){
        // check checkbox-es
        if( ! $("#terms").is(':checked') ){
            /*alert('Check Terms!');*/ 
            $("#terms_error_msg").empty().html('Check terms!').show();
            return false;
        }
        $("h1.title").hide();
        $("#web-user-registration-form").hide().submit();
        $(".ajaxLoading").show();
        return false;
    });
});
