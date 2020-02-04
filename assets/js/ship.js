$(document).ready(function() {
    //onclick addship, hide table and show form
        $("#addship").click(function() {
            $("#third").slideUp("slow", function() {
                    $("#fourth").slideDown("slow");
            });  
        });
        
    
        //onclick signup, hide registration and show login
        $("#returns").click(function() {
            $("#fourth").slideUp("slow", function() {
                    $("#third").slideDown("slow");
            });  
        });


       
    
    });