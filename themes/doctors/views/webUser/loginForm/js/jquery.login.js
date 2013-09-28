/**
*   Art0fDesign Site User Login jQuery Functions  
*/
var tpl_memo = {memo:'',memo_nl:''};
/** function for prepare new authenticated user connectivity */
function prepareNewAuthentication( html ){
    jQuery('#popUpDiv #login_main > p').empty();
    jQuery('#popUpDiv .bottom').empty().html( html );
}

jQuery(document).ready(function(){

/** -------------- POPUP LOGIN FORM ------------------ */
    jQuery('ul.headmenu li:first-child > a').click(function(){
        //alert( 'Login!' ); return false;
        /* Clean up DOM */
        jQuery('#blanket').remove();
        jQuery('#popUpDiv').remove();
        
        /* append to body */
        jQuery('#login-script-id').tmpl(tpl_memo).appendTo('body');

        /* Popup data */
        popup('popUpDiv');
        jQuery("html, body").animate({ scrollTop: jQuery('#popUpDiv').offset().top - 30 }, "slow");
    
        return false;
    });
    
    jQuery('ul.headmenu li + li > a').click(function(){
        //alert( 'Login!' ); return false;
        /* Clean up DOM */
        jQuery('#blanket').remove();
        jQuery('#popUpDiv').remove();
        
        /* append to body */
        jQuery('#signup-script-id').tmpl().appendTo('body');

        /* Popup data */
        popup('popUpDiv');
        jQuery("html, body").animate({ scrollTop: jQuery('#popUpDiv').offset().top - 30 }, "slow");
    
        return false;
    });
    
    jQuery(document).on('click', '#popUpDiv .back', function(){
        popup('popUpDiv');
        return false;
    });

    jQuery(document).on('click', '.login_fbook, .login_twitter', function(){  
        var url = $(this).attr('href');
        window.open( url, '_blank', 'scrollbars=yes,height=500,width=800' );
        return false;
    });
    
    jQuery(document).on('click', '#popUpDiv .bottom a.login_new', function(){
        popup( 'popUpDiv' );
        /* Clean up DOM */
        jQuery('#blanket').remove();
        jQuery('#popUpDiv').remove();
        
        /* append to body */
        jQuery('#signup-script-id').tmpl().appendTo('body');

        /* Popup data */
        popup('popUpDiv');
        jQuery("html, body").animate({ scrollTop: jQuery('#popUpDiv').offset().top - 30 }, "slow");
    
        return false;
    });
    
    function submitLogin(){
        var userName = jQuery("#login_un").val();
        var userPass = jQuery("#login_pass").val();
        var adata = {"WebLogin":{"Login":"Submit", username:userName, password:userPass}};
        jQuery.getJSON( '', adata, function( data, status ){
            console.log(data);
            if( status='success' ){
                if( data.result > 0 ){
                    window.location = data.url;
                    // location.reload();
                } else{
                    jQuery(".login_fail_message").empty().html( data.message );
                }                            
            } else {
                console.log( 'Function failed: ' + status );
            }
        } );/**/
    }
    
    jQuery(document).on('click', '#login_cmd', function(){
        submitLogin(); return false;
    });
    
    function submitPasswordForgotten(){
        jQuery("#login_email").hide(); jQuery("#pass_ajax").show();        
        var eMail = jQuery("#login_pf").val();
        var adata = {"WebLogin":{"PassForgot":"Submit", username:eMail}};
        jQuery.getJSON( '', adata, function( data, status ){
            if( status='success' ){
                if( data.result > 0 ){
                    //popup('popUpDiv'); 
                    window.location = data.url;                
                } else{
                    jQuery("#pass_ajax").hide(); jQuery("#login_email").show();
                    //jQuery(".login_fail_message").empty().html( data.message );
                    alert( data.message );
                    //console.log('data: ' + data.result + '->' + data.url + ', message: ' + data.message);
                }                            
            } else {
                //console.log( 'Function failed: ' + status );
            }
        } );        
    }

    jQuery(document).on('click', '#pass_forgot_cmd', function(){
        submitPasswordForgotten();
        return false;
    });

    jQuery(document).on('click', '#login_pass_forgot', function(){
        jQuery("#top_main").hide(); jQuery("#socialBox").hide(); jQuery("#top_email").show();
        jQuery("#login_main").hide(); jQuery("#login_email").show();
        return false;
    });

    jQuery(document).on('click', '#pass_forgot_back', function(){
        jQuery("#top_main").show(); jQuery("#socialBox").show(); jQuery("#top_email").hide();
        jQuery("#login_main").show(); jQuery("#login_email").hide();
        return false;
    });
    
    jQuery(document).on('keypress', '#login_un, #login_pass', function(e){
        if( e.which == 13 ) {
            submitLogin(); 
            return false;
        }
    });
    
    jQuery(document).on('keypress', '#login_pf', function(e){
        if( e.which == 13 ) {
            submitPasswordForgotten(); 
            return false;
        }
    });
    
    jQuery(document).on( 'click', '.signup_submit', function(){
        var url = jQuery('.signup_radio:checked').attr('href');
        window.location = url;
        return false;
    });

    jQuery(document).on('click', '#login_sign_up', function(){
        // alert('Click'); return false;
        /* Clean up DOM */
        jQuery('#blanket').remove();
        jQuery('#popUpDiv').remove();
        
        /* append to body */
        jQuery('#signup-script-id').tmpl().appendTo('body');

        /* Popup data */
        popup('popUpDiv');
        jQuery("html, body").animate({ scrollTop: jQuery('#popUpDiv').offset().top - 30 }, "slow");
    
        return false;
    });

});
