/**
*   Art0fDesign User Favorites jQuery Functions  
*/
$(document).ready(function() {
    $("#sort").change(function(){
        var url = $(this).attr('url') + $(this).val();
        window.location = url;
        return false;
    });
});