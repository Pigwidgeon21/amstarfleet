$(document).ready(function() {
    //onclick addroom, hide table and show form
        $("#addcrew").click(function() {
            $("#first").slideUp("slow", function() {
                    $("#second").slideDown("slow");
            });  
        });
        
    
        //show login
        $("#returnc").click(function() {
            $("#second").slideUp("slow", function() {
                    $("#first").slideDown("slow");
            });  
        });


       
    
    });