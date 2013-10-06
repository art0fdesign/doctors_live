/**
 *   Art0fDesign Doctors SubSpeciality Scripts
 *   -----------------------------------------------
 */
$(document).ready(function() {
 
/** -------------------------------------------------------------------------------
 * Template plugin manipulacija
 ------------------------------------------------------------------------------- */    
    /* Add More dogadjaj */
    $(document).on("click", ".addMoreFields", function(){
        var templateGroupDiv = "#" + $(this).parents("div[id^=template-group-div]").prop('id');
        AddMoreFields( templateGroupDiv );
        return false;
    });
    function AddMoreFields( templateGroupDiv ){
        /* Proveri samo da li je dostigao maximum */
        //alert( templateGroupDiv ); return false;
        var maxCount = $(templateGroupDiv).attr('max-count');
        if( maxCount!=undefined && maxCount!=0 ){
            var childCount = $( templateGroupDiv + " div.template-item").size();            
            if( childCount >= maxCount) { alert('Maximum allowed elements count of ' + maxCount + ' reached!'); return false; }
        }        
        $('#template-script-id').tmpl({"showRemove":true}).appendTo(templateGroupDiv);
        //$('select.stled').each(function(){ DisplaySelection($(this)); });
        ShowLastAddMore( templateGroupDiv ) ;        
    }
    /* Remove Fields dogadjaj */
    $(document).on("click", ".removeFields", function(){
        if( confirm('Are You sure?') ){
            RemoveFields( $(this) );
        }
        return false;
    });
    function RemoveFields( removeLink ){
        var ident = removeLink.parent().siblings('.formRight').children('input[type="hidden"]').val();
        var templateGroupDiv = "#" + removeLink.parents("div[id^=template-group-div]").prop('id');
        if( ident != 0 ){
            var ajaxUrl = removeLink.prop('href');
            var ajaxData = 'id=' + ident + '&action=remove';
            //alert( ajaxData ); return false;
            $.ajax({type: "POST", url:ajaxUrl, data:ajaxData, dataType: 'json',
            }).done(function( msg ) {
                if( msg.result== 'success' ){
                    removeLink.parents("div.template-item:first").remove();
                    ShowLastAddMore( templateGroupDiv );                
                } else {
                    alert( "Item is not removed! Please check entered data!" );
                } 
            }).error(function(msg){
                alert("Something went wrong!");
            });
        } else {
            removeLink.parents("div.template-item:first").remove();
            ShowLastAddMore( templateGroupDiv );
        }                
    }
    /* Prikaz samo zadnjeg AddMore dugmeta */
    function ShowLastAddMore( templateGroupDiv){
        $( templateGroupDiv + " .addMoreFields" ).hide();
        $( templateGroupDiv + " .addMoreFields:last" ).show();
    }

/** -------------------------------------------------------------------------------
 * Dalja specificna obrada
  ------------------------------------------------------------------------------- */
    function ValidateName( nameElement ){
        if( nameElement.val() == '' ){
            alert( "Name cannot be blank!" );
            return false;
        } else {
            return true;
        }
    }
    $(document).on("click", ".editFields", function(){
        var polje = $(this).parent().siblings('.formRight').children('input[name="name"]');
        if( !ValidateName(polje) ) return false;
        var retVal = polje.val();
        polje.removeAttr('readonly').prop('retVal', retVal).focus();
        $(this).parent().hide().next().show();
        return false;
    });
    $(document).on("click", ".cancelFields", function(){
        var polje = $(this).parent().siblings('.formRight').children('input[name="name"]');
        var ident = polje.siblings('input[type="hidden"]');
        if( ident.val() == '0' ){ 
            if( confirm('Are You sure?') ){
                RemoveFields( $(this) ); return false; 
            } else {
                return false;
            }
        }
        var retVal = polje.prop('retVal');
        polje.prop('readonly', 'readonly').val(retVal);
        $(this).parent().hide().prev().show();
        return false;
    });
    $(document).on("click", ".saveFields", function(){
        // do ajax call to add/edit choice...
        var polje = $(this).parent().siblings('.formRight').children('input[name="name"]');
        if( !ValidateName(polje) ) return false;
        var ident = polje.siblings('input[type="hidden"]');
        var salt = "template-group-div";
        var spec = $(this).parents( "div[id^=" + salt + "]" ).prop('id').substr(salt.length + 1 );
        // ajax save...
        var thisElement = $(this);
        var ajaxUrl = $(this).prop('href');
        var ajaxData = 'id=' + ident.val() + '&name=' + polje.val() + '&spec_id=' + spec + '&action=save';
        //alert( ajaxData ); return false;
        $.ajax({type: "POST", url:ajaxUrl, data:ajaxData, dataType: 'json',
        }).done(function( msg ) {
            if( msg.result== 'success' ){
                ident.val( msg.id );
                polje.prop('readonly', 'readonly').removeAttr('retVal');
                thisElement.parent().hide().prev().show();
            } else {
                alert( "Data not saved! Please check entered data!" );
            } 
        }).error(function(msg){
            alert("Something went wrong!");
        });
        return false;
    });
    $(".addMoreHeadLink").click(function(){
        var templateGroupDiv = "#" + $(this).parent().next("div[id^=template-group-div]").prop('id');
        AddMoreFields( templateGroupDiv );
        return false;
    });    
});