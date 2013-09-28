/**
 *   Art0fDesign Doctors Choice Scripts
 *   -----------------------------------------------
 */
$(document).ready(function() {
 
/** -------------------------------------------------------------------------------
 * Template plugin manipulacija
 ------------------------------------------------------------------------------- */    
    /* Add More dogadjaj */
    $(document).on("click", ".addMoreFields", function(){
        AddMoreFields();
        return false;
    });
    function AddMoreFields(){
        /* Proveri samo da li je dostigao maximum */
        var maxCount = $("#template-group-div").attr('max-count');
        if( maxCount!=undefined && maxCount!=0 ){
            var childCount = $("#template-group-div div.template-item").size();            
            if( childCount >= maxCount) { alert('Maximum allowed elements count of ' + maxCount + ' reached!'); return false; }
        }        
        $('#template-script-id').tmpl({"showRemove":true}).appendTo('#template-group-div');
        //$('select.stled').each(function(){ DisplaySelection($(this)); });
        ShowLastAddMore();        
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
        if( ident != 0 ){
            var ajaxUrl = removeLink.prop('href');
            var ajaxData = 'id=' + ident + '&action=remove';
            //alert( ajaxData ); return false;
            $.ajax({type: "POST", url:ajaxUrl, data:ajaxData, dataType: 'json',
            }).done(function( msg ) {
                if( msg.result== 'success' ){
                    removeLink.parents("div.template-item:first").remove();
                    ShowLastAddMore();                
                } else {
                    alert( "Item is not removed! Please check entered data!" );
                } 
            }).error(function(msg){
                alert("Something went wrong!");
            });
        } else {
            removeLink.parents("div.template-item:first").remove();
            ShowLastAddMore();
        }                
    }
    /* Prikaz samo zadnjeg AddMore dugmeta */
    function ShowLastAddMore(){
        $(".addMoreFields").hide();
        $(".addMoreFields:last").show();
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
        //alert( "Click!" ); return false;
        var polje = $(this).parent().siblings('.formRight').children('input[name="name"]');
        if( !ValidateName(polje) ) return false;
        var ident = polje.siblings('input[type="hidden"]');
        // ajax save...
        var thisElement = $(this);
        var ajaxUrl = $(this).prop('href');
        var ajaxData = 'id=' + ident.val() + '&name=' + polje.val() + '&action=save';
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
        AddMoreFields();
        return false;
    });
});