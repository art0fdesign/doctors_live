/**
*   Art0fDesign Search Page jQuery Functions  
*/
/* ----------- Tabber Initialization ---------------- */
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
var tabberOptions = {
    'manualStartup':true,
    'onClick':function(argsObj){
        document.getElementById('cat_id_selected').value = argsObj.index+1;
        if (document.getElementById('nsi_spec').checked || document.getElementById('nsi_issue').checked) {
            document.getElementById('spec_nsi').value = '';
            document.getElementById('spec_value').value = '';
            document.getElementById('spec_nsi').focus();
        // } else {
        //     document.getElementById('doctor_search_form').submit();
        }
        if (argsObj.index<2) {
            jQuery('.tabberform.comingsoon').hide();
            jQuery('.tabberform.search').show();
        } else {
            jQuery('.tabberform.search').hide();
            jQuery('.tabberform.comingsoon').show();
        }
    }
};
/* ----------- jQuery ---------------- */
$(document).ready(function() {
    
    jQuery("#doctor_search_form").submit(function(){
        var nsiElem = jQuery('#spec_nsi');
        var nsiValue = nsiElem.val();
        var nsiID = jQuery('input[name=nsi_id]').val();
        var czElem = jQuery('#spec_cz');
        var czValue = czElem.val();
        var czID = jQuery('input[name=cz_id]').val();
        var errored = false;
        //
        nsiElem.removeClass('errorize');
        czElem.removeClass('errorize');
        if (nsiValue!='Enter name:' && nsiValue!='') {
            if (nsiID==0 && (jQuery('#nsi_spec').is(':checked') || jQuery('#nsi_issue').is(':checked'))) {
                nsiElem.addClass('errorize');
                jQuery('#nsi_error').show();
                errored = true;
            }
        }
        if (czValue!='Enter place or ZIP code' && czValue!='' && czID==0) {
            czElem.addClass('errorize');
            jQuery('#cz_error').show();
            errored = true;
        }
        if (errored) {
            return false;
        }
        // clear id hiddens if nothing is selected
        if( jQuery('#spec_cz').val() == '' ) jQuery('input[name=cz_id]').val('');
        if( jQuery('#spec_nsi').val() == '' ) jQuery('input[name=nsi_id]').val('');
    });

    jQuery("#spec_nsi").keypress(function(event){
        if ( event.which != 13 ) {
            jQuery('.errorize').removeClass('errorize');
            jQuery('.search_error').hide();
            jQuery('input[name=nsi_id]').val('');
        }
    });
    jQuery("#spec_cz").keypress(function(event){
        if ( event.which != 13 ) {
            jQuery('.errorize').removeClass('errorize');
            jQuery('.search_error').hide();
            jQuery('input[name=cz_id]').val('');
        }
    });

    jQuery(".tabberform input[type=radio]").click(function(){
        var selected_radio = jQuery(this).val();
        var message = '';
        switch (selected_radio) {
            case 'spec': message = 'Enter speciality'; break;
            case 'issue': message = 'Enter issue'; break;
            default: message = 'Enter name';
        }
        jQuery('.errorize').removeClass('errorize');
        jQuery('.search_error').hide();
        jQuery('input[name=nsi_id]').val('');
        jQuery('#spec_nsi').val('').attr('placeholder', message).focus();
    });

    jQuery("#sort").change(function(){
        var sort_value = jQuery("#sort option:selected").val();
        jQuery("#sort_hidden").val(sort_value);
        jQuery("#doctor_search_form").submit();
    });

});