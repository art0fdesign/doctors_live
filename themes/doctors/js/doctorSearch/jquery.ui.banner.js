/**
*   Art0fDesign Page Banner jQuery Search Functionality  
*/
jQuery(document).ready(function() {

    /** ===================== jQueryUI AutoComplete ============================  */
    jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
        _renderMenu: function( ul, items ) {
            var that = this,
                currentCategory = "";
            jQuery.each( items, function( index, item ) {
                if ( item.category != currentCategory ) {
                    ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                    currentCategory = item.category;
                }
                that._renderItemData( ul, item );
            });
        }
    });
    var cache={}, prevReq;
    /*jQuery('#spec_nsi').autocomplete({*/
    jQuery('#spec_nsi').catcomplete({
        source: function(request, response){
            var cat = jQuery("input[name=cat_id]").val(); // doctor category
            var zip = jQuery("input[name=cz_id]").val(); // selected zip code from second search
            var searchBy = 'name';
            var term = 'spec_' + request.term;        
            //if (term in cache){
            //    response(cache[term]);
            //    return;
            //}
            if (jQuery('#nsi_spec').is(':checked')) {
                searchBy = 'spec';
            } else if (jQuery('#nsi_issue').is(':checked')) {
                searchBy = 'issue';
            }
            request['param'] = 'nsi';
            request['cat'] = cat;
            request['zip'] = zip;
            request['search'] = searchBy;
            //console.log(request);
            
            prevReq=jQuery.getJSON('', request, function(data, status, req){
                //console.log(data);
                //cache[term]=data;
                if (req===prevReq){
                    response(data);
                }
            });
        },
        select: function( event, ui ){
            //jQuery('#spec_nsi').attr('ajax_id', ui.item.id);
            jQuery("input[name=nsi_id]").val(ui.item.id);
            //console.log(ui.item.id);
        }
    });
    jQuery('#spec_nsi').each(function() {
        var elem = jQuery(this);
        
        // Save current value of element
        elem.data('oldVal', elem.val());
        
        // Look for changes in the value
        elem.bind("propertychange keyup input paste", function(event){
            // If value has changed...
            if (elem.data('oldVal') != elem.val()) {
                // Updated stored value
                elem.data('oldVal', elem.val());
                
                // Do action
                jQuery("#nsi_id").val('');
                //console.log(jQuery("#cz_id").val());
            }
        });
    });

    jQuery('#spec_cz').autocomplete({
        source: function(request, response){
            var term = 'spec_' + request.term;        
            /*if (term in cache){
                response(cache[term]);
                return;
            }/**/
            request['param'] = 'cz';
            //console.log(request);
            
            prevReq=jQuery.getJSON('', request, function(data, status, req){
                //console.log(data);
                //cache[term]=data;
                if (req===prevReq){
                    response(data);
                }
            });
        },
        select: function( event, ui ){
            //jQuery('#spec_cz').attr('ajax_id', ui.item.id);
            jQuery("input[name=cz_id]").val(ui.item.id);
        }
    });
    jQuery('#spec_cz').each(function() {
        var elem = jQuery(this);
        
        // Save current value of element
        elem.data('oldVal', elem.val());
        
        // Look for changes in the value
        elem.bind("propertychange keyup input paste", function(event){
            // If value has changed...
            if (elem.data('oldVal') != elem.val()) {
                // Updated stored value
                elem.data('oldVal', elem.val());
                
                // Do action
                jQuery("#cz_id").val('');
                //console.log(jQuery("#cz_id").val());
            }
        });
    });

});