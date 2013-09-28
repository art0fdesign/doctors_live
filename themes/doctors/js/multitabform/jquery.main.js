$(function(){
    //original field values
    $('#submit_first').click(function(){
                //slide steps
                $('#first_step').fadeOut(200);
                $('#second_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500);   
    });
    $('#prev_second').click(function(){
                //slide steps
                $('#second_step').fadeOut(200);
                $('#first_step').fadeIn(200);   
                $('html, body').animate({ scrollTop: 0 }, 500);
    });
    $('#submit_second').click(function(){
                //slide steps
                $('#second_step').fadeOut(200);
                $('#third_step').fadeIn(200);      
                $('html, body').animate({ scrollTop: 0 }, 500);
    });
	$('#prev_third').click(function(){
                //slide steps
                $('#third_step').fadeOut(200);
                $('#second_step').fadeIn(200);      
                $('html, body').animate({ scrollTop: 0 }, 500);
    });
    $('#submit_third').click(function(){
		        //slide steps
		        $('#third_step').fadeOut(200);
		        $('#fourth_step').fadeIn(200); 
		        $('html, body').animate({ scrollTop: 0 }, 500);  
    });
	$('#prev_fourth').click(function(){
                //slide steps
                $('#fourth_step').fadeOut(200);
                $('#third_step').fadeIn(200); 
                $('html, body').animate({ scrollTop: 0 }, 500);
    });
    $('#submit_fourth').click(function(){
                //slide steps
                $('#fourth_step').fadeOut(200);
                $('#fifth_step').fadeIn(200);   
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#prev_fifth').click(function(){
                //slide steps
                $('#fifth_step').fadeOut(200);
                $('#fourth_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#submit_fifth').click(function(){
                //slide steps
                $('#fifth_step').fadeOut(200);
                $('#sixth_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#prev_sixth').click(function(){
                //slide steps
                $('#sixth_step').fadeOut(200);
                $('#fifth_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#submit_sixth').click(function(){
                //slide steps
                $('#sixth_step').fadeOut(200);
                $('#seventh_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#prev_seventh').click(function(){
                //slide steps
                $('#seventh_step').fadeOut(200);
                $('#sixth_step').fadeIn(200);  
                $('html, body').animate({ scrollTop: 0 }, 500); 
    });
    $('#submit_seventh').click(function(){
        //send information to server
        //alert('Data sent');
        $("#profile_wrapper").submit();
    });
    //Deo koji dodaje dodatne jezike
    /*
    $('#add_lang').click(function(){
        var a=$('#lang_container').html();
        var b=$('#lang_one').html();
        var c=a+b;
        $('#lang_container').html(c);	
    });/**/

     //DEO ZA SELECT LISTE DA STILIZUJE 



 function DisplaySelection(item){

    // obezbedi tarabu

   // if(itemID.substring(0, 1) != '#') itemID = "#" + itemID;

   // alert(item);

    var selectedText = $(item).children(":selected").text();

   // alert(selectedText);

    $(item).parent().children("span").empty().append(selectedText);    

}



$(".stled").change(function(){

   // var itemID = $(this).attr("id");

    //alert(itemID);

    DisplaySelection(this);

});/**/
});