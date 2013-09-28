/**
*   Art0fDesign Profile jQuery Functions  
*/
$(document).ready(function() {
    
    $('#media_type_select').change(function(){
        var selectedOption = $(this).children(':selected').val();
        if( selectedOption == 'vid' ){
            $("#file_wrapper").hide();
            $("#video_wrapper").show();
        } else {
            $("#file_wrapper").show();
            $("#video_wrapper").hide();
        }
    });
    
    $("#speciality_ticket").click(function(){
        alert( 'Popup Ticketing Form...');
        return false;
    });
    
    $("#location_ticket").click(function(){
        alert( 'Popup Ticketing Form...');
        return false;
    });
    
    $(document).on( 'change', '.stled[name^="Speciality"]', function(){
        var thisID = $(this).children(':selected').prop('value');
        var subHtml = $('ul#temp-ul-' + thisID).html();
        var subList = $(this).parents('.template-item').children('.subspec_list');
        //
        if( subHtml.length == 1 ){
            subList.hide();
        } else {
            subList.children('dd').children('.selectarea').empty().html( subHtml );
            subList.show()
        }
    });
    $(document).on( 'click', 'input[name=SpecDefault]', function(){ AddChangedFlag(); } );
    $(document).on( 'change', '.file', function(){
        $(this).siblings('span').html( $(this).val() );
    }); 
    
    $("#type_select").change(function(){
        var category = $(this).find('option:selected').val();
        var mdSelect = $("#md_select");
        var tmpSelect = $("#md_options_" + category);
        $("#md_span").html('----');
        mdSelect.empty().html( tmpSelect.html() );
        return false;
    });

    /* Display upload button */
    $("#file_photo_upload").change(function(){
        $("#media_upload_button").show();
    });
/** -------------------------------------------------------------------------------
 * Locations manipulation
 --------------------------------------------------------------------------------- */    
    
    function DisplaySelection(item){
        var selectedText = $(item).children(":selected").text();
        $(item).parent().children("span:first").empty().append(selectedText);    
    }
    
    $("#location_default").change(function(){ AddChangedFlag(); });
    
    $("#location_add").click(function(){
        // serialize data to send
        var adata = {};
        adata['location_ajax'] = 'ajax';
        adata['action'] = 'add';
        //
        adata['location_id'] = 0;
        if( $("#location_ac").val() != '' &&  $("#location_ac").attr('ajax_id') !== undefined ) adata['location_id'] = $("#location_ac").attr('ajax_id');
        adata['f_default'] = $("#location_default:checked").size();
        //
        if( adata['location_id'] == 0 ){
            $("#location_ac").focus();
            alert('Please select location from list or add new link.');
            return false;
        }
        $.getJSON('', adata, function(data, status, req){
            //console.log(data);
            if( data.status == 'added' ){
                // insert row in table
                var html = '';
                html = '<tr><td>' + data.label + '</td>';                    
                html += '<td>';
                html += '<a href="#" class="BtnDelete remove_location" id="remove_' + data.id + '" title="Remove Location"></a>';
                html += '</td></tr>';
                $("#location_list tbody").append(html);
                // insert option in select list
                html = '<option value="' + data.id + '">' + data.label + '</option>';
                $("#location_default").append( html );
                DisplaySelection( $("#location_default") );
                //
                $("#location_ac").val('').removeAttr('ajax_id').focus();
            }
        });
        //
        return false;
    });
    $(document).on('click', '.remove_location', function(){
        // serialize data to send
        var removeTR = $(this).parents('tr');        
        var adata = {};        
        //
        if( !confirm( 'Are you sure?' ) ) return false;
        //
        adata['location_ajax'] = 'ajax';
        adata['action'] = 'remove';
        adata['id'] = $(this).attr('id').replace('remove_', '');
        var removeOption = $("#location_default option[value=" + adata['id'] + "]");
        var selectFirst = false;
        if( $("#location_default option:selected").val() == adata['id'] ) selectFirst = true;
        $.getJSON('', adata, function(data, status, req){
            if( data.status == 'removed' ){
                removeTR.hide();                
                removeOption.remove();
                if( selectFirst ){
                    $("#location_default").val($("#location_default option:first").val());
                    DisplaySelection($("#location_default"));
                }
            }
        });
        return false;
    });
    $(document).on('click', '#new_location_link, #new_location_cancel', function(e){
        e.preventDefault();
        $('#new-location-form').toggle();
        $('#new_location_link').toggle();
        $('#step4_result').toggle();
        return false;
    });
    $(document).on('click', '#new_location_add', function(e){
        $('#new-location-form').submit();
        return false;
    });


/** -------------------------------------------------------------------------------
 * Locations manipulation
 --------------------------------------------------------------------------------- */    

    $(document).on('click', '.remove_media', function(){
        // serialize data to send
        var removeTR = $(this).parents('tr');        
        var adata = {};        
        //
        if( !confirm( 'Are you sure?' ) ) return false;
        //
        adata['media_ajax'] = 'ajax';
        adata['action'] = 'remove';
        adata['id'] = $(this).attr('id').replace('remove_', '');
        $.getJSON('', adata, function(data, status, req){
            if( data.status == 'removed' ){
                removeTR.hide();                
            }
        });
        return false;
    });


/** -------------------------------------------------------------------------------
 * Sub Template plugin manipulation
 ------------------------------------------------------------------------------- */    
    /* Add More event */
    $(document).on("click", ".addMoreSubFields", function(){
        /* Proveri samo da li je dostigao maximum */
        var tplGrpDivID = "#" + $(this).parents('div[id^=subtemplate-group-div]').prop('id');
        //alert( tplGrpDivID ); return false;
        var maxCount = $(tplGrpDivID).attr('max-count');
        if( maxCount!=undefined && maxCount!=0 ){
            var childCount = $( tplGrpDivID + " > div.subtemplate-item").size(); 
            if( childCount >= maxCount) { alert('Maximum allowed elements count of ' + maxCount + ' reached!'); return false; }
        } 
        var idCount = tplGrpDivID.substr( '#subtemplate-group-div'.length + 1 );
        //alert( idCount );
        $('#subtemplate-script-id').tmpl({"showRemove":true,"idCount":idCount}).appendTo(tplGrpDivID);
        $(this).hide(); AddChangedFlag();
        return false;
    });
    /* Remove Fields event */
    $(document).on("click", ".removeSubFields", function(){
        if( confirm('Are You sure?') ){
            var tplGrpDivID = "#" + $(this).parents('div[id^=subtemplate-group-div]').prop('id');
            $(this).parents("div.subtemplate-item:first").remove();
            ShowLastSubAddMore( tplGrpDivID );
            AddChangedFlag();
        }
        return false;
    });
    $(document).on("click", ".check, .stled_check, input[name^=OnBoard]", function(){
        AddChangedFlag();
    });
    $(document).on("change", ".stled, textarea, input[name^=Direction]", function(){
        AddChangedFlag();
    });
    /* Show only last AddMore button */
    function ShowLastSubAddMore( tplGrpDivID ){
        $( tplGrpDivID + " .addMoreSubFields").hide();
        $( tplGrpDivID + " .addMoreSubFields:last").show();
    }
    /* Adding Changed Field */
    function AddChangedFlag(){
        $('form').append( $('<input/>', { type: 'hidden', name: 'Changed', value: 'changed' }) );
    }
 
/** -------------------------------------------------------------------------------
 * LICENCE Template plugin manipulation
 ------------------------------------------------------------------------------- */    
    /* Add More event */
    $(document).on("click", ".addMoreLicFields", function(e){
        e.preventDefault();
        /* Check if max-count is reached */
        var maxCount = $("#lic-template-group-div").attr('max-count');
        if( maxCount!=undefined && maxCount!=0 ){
            var childCount = $("#lic-template-group-div div.lic-template-item").size();            
            if( childCount >= maxCount) { alert('Maximum allowed elements count of ' + maxCount + ' reached!'); return false; }
        } 
        var idCount = parseInt($('#lic-template-group-div').attr('id-count')); if( isNaN( idCount ) ) idCount = 1;
        $('#lic-template-script-id').tmpl({"showRemove":true,"idCount":idCount}).appendTo('#lic-template-group-div');
        $('#lic-template-group-div').attr('id-count', idCount+1);
        $(this).hide();
        $('select.stled').each(function(){ DisplaySelection($(this)); });
        AddChangedFlag();
        return false;
    });
    /* Remove Fields event */
    $(document).on("click", ".removeLicFields", function(){
        if( confirm('Are You sure?') ){
            $(this).parents("div.lic-template-item:first").remove();
            ShowLastLicAddMore();
            AddChangedFlag();
        }
        return false;
    });
    /* Display last AddMore link only */
    function ShowLastLicAddMore(){
        $(".addMoreLicFields").hide();
        $(".addMoreLicFields:last").show();
    }


/** ===================== jQueryUI AutoComplete ============================  */
var cache={}, prevReq;
$('#location_ac').autocomplete({
    source: function(request, response){
        var term = 'loc_' + request.term;        
        if (term in cache){
            response(cache[term]);
            return;
        }
        request['param'] = 'location';
        //console.log(request);
        
        prevReq=$.getJSON('', request, function(data, status, req){
            //console.log(data);
            cache[term]=data;
            if (req===prevReq){
                response(data);
            }
        });
    },
    select: function( event, ui ){
        $('#location_ac').attr('ajax_id', ui.item.id);
        //console.log(ui.item.id);
    },
    change: function( event, ui ){
        if( $('#location_ac').val() == '' ) $('#location_ac').removeAttr('ajax_id');
    }
});



});
