/**
 * This file handles all cart-related operations
**/

/**
 * With a given id, send an ajax request to increment the product quantity in cart
 * Params:
 * article id in database
 */
function addQuantityToProductCart(articleId) {
    articleId = parseInt(articleId);
    
    $.ajax("/panier", {
        type: "post",
        data: {"article_id": articleId}
    })
    .done(function(response, textStatus, jqXHR) {
        console.log("success");
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
    });
}

/**
 * With a given id, send an ajax request to decrement the product quantity in cart
 * Params:
 * article id in database
 */
function removeQuantityToProductCart(articleId) {
    articleId = parseInt(articleId);
    
    $.ajax("/panier/" + articleId, {
        type: "delete"
    })
    .done(function(response, textStatus, jqXHR) {
        console.log("success");
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
    });
}


/**
 * Product page : add an article to cart
 */

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