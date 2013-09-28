/**
 *   Art0fDesign 'MultiField' Plugin Manipulation
 *   -----------------------------------------------
 *   Kombinacija form_element + multifield ne radi kako treba 
 */
$(document).ready(function() {
//$(function(){    
    //$("#LangGroup").EnableMultiField();
    
/** -------------------------------------------------------------------------------
 * Zamena za form_element (styled->stled)
 * Samo za select listu
 ------------------------------------------------------------------------------- */    
    /* Poziv prikaza izabranog option elementa prilikom ucitavanja dokumenta */
    $('select.stled').each(function(){ DisplaySelection($(this)); });
    /* Poziv prikaza izabranog elementa na formi */
    $(document).on("change", "select.stled", function(){ DisplaySelection($(this)); }); 
    /* Funkcija koja izvrsava prikaz option elelmenta */
    function DisplaySelection(item){
        var selectedText = $(item).children(":selected").text();
        $(item).parent().children("span:first").empty().append(selectedText);    
    }
 
/** -------------------------------------------------------------------------------
 * Template plugin manipulacija
 ------------------------------------------------------------------------------- */    
    /* Add More dogadjaj */
    $(document).on("click", ".addMoreFields", function(e){
        e.preventDefault();
        /* Proveri samo da li je dostigao maximum */
        var maxCount = $("#template-group-div").attr('max-count');
        if( maxCount!=undefined && maxCount!=0 ){
            var childCount = $("#template-group-div div.template-item").size();            
            if( childCount >= maxCount) { alert('Maximum allowed elements count of ' + maxCount + ' reached!'); return false; }
        } 
        var idCount = parseInt($('#template-group-div').attr('id-count')); if( isNaN( idCount ) ) idCount = 1;
        $('#template-script-id').tmpl({"showRemove":true,"idCount":idCount}).appendTo('#template-group-div');
        $('#template-group-div').attr('id-count', idCount+1);
        $(this).hide();
        $('select.stled').each(function(){ DisplaySelection($(this)); });
        AddChangedFlag();
        return false;
    });
    /* Remove Fields dogadjaj */
    $(document).on("click", ".removeFields", function(){
        if( confirm('Are You sure?') ){
            $(this).parents("div.template-item:first").remove();
            ShowLastAddMore();
            AddChangedFlag();
        }
        return false;
    });
    /* Prikaz samo zadnjeg AddMore dugmeta */
    function ShowLastAddMore(){
        $(".addMoreFields").hide();
        $(".addMoreFields:last").show();
    }
    /* DOdavanje Changed Polja */
    function AddChangedFlag(){
        $('form').append( $('<input/>', { type: 'hidden', name: 'Changed', value: 'changed' }) );
    }
});