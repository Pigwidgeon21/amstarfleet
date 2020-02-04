$(document).ready(function() {
    //onclick add deck, hide table and show form
        $("#adddeck").click(function() {
            $("#first").slideUp("slow", function() {
                    $("#second").slideDown("slow");
            });  
        });
        
    
        // show table
        $("#returnd").click(function() {
            $("#second").slideUp("slow", function() {
                    $("#first").slideDown("slow");
            });  
        });


       
    
    });