/**
*   Art0fDesign Mailing jQuery Functions  
*/
$(document).ready(function() {

    /** toggle reply */
    $("#mailReply").click(function(){
        $(".mailThreadReply").slideToggle(500);
        return false;
    });
    
    /** load more */
    $(".seemore a").click(function(){
        var seeMoreA = $(this);
        var url = $(this).attr('href');
        var adata = {ajax:'load_more'};
        $(".seemore").hide(); $(".ajaxLoading").show();
        $.getJSON( url, adata, function(data, status){
            if( status == 'success' ){
                $("ul.mailThread, ul.results").append( data.html );
                if( data.href == '#' ){
                    if( data.createdDT != null ){
                        $(".seemore").empty().html('Thread Started on ' + data.createdDT).show();
                    }
                } else {
                    seeMoreA.attr( 'href', data.href );
                    $(".seemore").show();
                }
                /*
                $.each(data, function(index, value){
                    console.log('index: ' + index + ', value: ' + value);
                });/**/
                //console.log( 'status: ' + status + ', data: ' + data );
            } else { 
                console.log( data );
            }
            $(".ajaxLoading").hide();
        } );
        //alert(data.url);
        return false;
    });
    
});
