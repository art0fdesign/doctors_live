/**
*   Art0fDesign Profile jQuery Functions  
*/
$(document).ready(function() {
    $('#favorite').click(function(){
        var setter = parseInt($('#fav_setter').val());
        var getter = parseInt($('#fav_getter').val());
        if( isNaN(setter) ){
            alert( 'You have to be logged to manage favorites!');
            return false;
        } else {
            if( !$(this).is('.favorite2')){
                var adata = {favorite:'set',setter:setter,getter:getter};
                $.get('', adata, function(data){
                    $("#fav_id").val( data );
                    $('#favorite').addClass('favorite2');
                    $('#favorite').html('Unfavorite');
                    alert("Doctor is successfully added to Your Favorites list.");
                    console.log(data);
                });
            } else {
                var fav_id = $("#fav_id").val();
                var adata = {favorite:'unset',fav_id:fav_id};
                if( confirm('Are You sure?') ){
                    $.get('', adata, function(data){
                        $("#fav_id").val();
                        $('#favorite').removeClass('favorite2');
                        $('#favorite').html('Add to favorite');
                        alert("Doctor is successfully removed from Your Favorites list.");
                        console.log(data);
                    });
                }
                
            }
        }
        return false;
    });
});