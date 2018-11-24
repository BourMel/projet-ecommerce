/**
 * This file handles all cart-related operations
**/

$(document).ready(function() {
   
   // button to buy a product
   var addButton = $('.product_page button');
   
   // add the product to cart
   addButton.on("click", function(e) {
        e.preventDefault();
       
        let articleId = $(this).data("article");
       
        let request = $.ajax("/panier", {
            type: "post",
            data: {"article_id": articleId}
        })
        .done(function(response, textStatus, jqXHR) {
            location.reload();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
   });
   
});