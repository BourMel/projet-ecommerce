/**
 * This file handles all authentication-related operations
**/

$(document).ready(function() {
   
   // logout link
   var logout = $('.account_page .logout');
   
   logout.on("click", function(e) {
        e.preventDefault();

        $.ajax("/deconnexion", {
            type: "post"
        })
        .done(function(response, textStatus, jqXHR) {
            location.reload();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
   });
   
});