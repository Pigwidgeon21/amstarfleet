$(document).ready(function() {
    //onclick addroom, hide table and show form
        $("#addroom").click(function() {
            $("#first").slideUp("slow", function() {
                    $("#second").slideDown("slow");
            });  
        });
        
    
        //show login
        $("#returnr").click(function() {
            $("#second").slideUp("slow", function() {
                    $("#first").slideDown("slow");
            });  
        });


       
    
    });