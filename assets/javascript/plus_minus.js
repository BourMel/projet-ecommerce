/**
 * Computes the price when quantity changes
 * And returns a formatted string
 * Params:
 * price (float)
 * qte (int)
 * newQte (int)
 */

function changePrice(price, qte, newQte) {
   
   var newPrice = (price*(newQte))/qte;
   return newPrice.toFixed(2).replace(".", ",") + "€";
   
}

/**
 * on click on a 'minus' or 'plus' span, handles quantity
 * assumes that a minus and a plus are always present in order to make less operations
**/

document.addEventListener('DOMContentLoaded', function() {
   
   // get all buttons plus and minus
   var plus = document.getElementsByClassName("plus");
   var minus = document.getElementsByClassName("minus");
   var total = document.getElementsByClassName("total");
   
   if((plus.length == minus.length) && (total.length == 1)) {
      total = total[0].querySelector("span");
      
       for(var i=0; i<plus.length; i++) {
       
           plus[i].addEventListener("click", function() {
              
               // send ajax request
               if(this.parentNode.hasAttribute("data-article")) {
                  addQuantityToProductCart(this.parentNode.getAttribute("data-article"));
               }
              
               // change the quantity
               var quantity = parseInt(this.parentNode.querySelector(".quantity").innerHTML);
               this.parentNode.querySelector(".quantity").innerHTML = quantity +1;
               
               // get the price, find the new one and format it before replacing it
               var price = parseInt(this.parentNode.parentNode.querySelector(".price").innerHTML);
               
               price = parseFloatString(this.parentNode.parentNode.querySelector(".price").innerHTML);
               
               var newPrice = changePrice(price, quantity, quantity+1);
               
               this.parentNode.parentNode.querySelector(".price").innerHTML = newPrice;
               
               // adjust total
               var totalVal = parseFloatString(total.innerHTML.substr(0, total.innerHTML.length));
               totalVal += (parseFloatString(newPrice) - price);
               total.innerHTML = totalVal.toFixed(2).replace(".", ",") + " €";
               
           })
           
           minus[i].addEventListener("click", function() {
              
               // send ajax request
               if(this.parentNode.hasAttribute("data-article")) {
                  removeQuantityToProductCart(this.parentNode.getAttribute("data-article"));
               }
              
               var quantity = parseInt(this.parentNode.querySelector(".quantity").innerHTML);
               
               if(quantity > 0) {
                   this.parentNode.querySelector(".quantity").innerHTML = quantity -1;
                   
                   // get the price, find the new one and format it before replacing it
                  var price = parseFloatString(this.parentNode.parentNode.querySelector(".price").innerHTML);
                  
                  var newPrice = changePrice(price, quantity, quantity-1);
                  
                  this.parentNode.parentNode.querySelector(".price").innerHTML = newPrice;
                  
                  if(quantity == 1) {
                      var divToDelete = this.parentNode.parentNode;
                      
                      divToDelete.parentNode.removeChild(divToDelete);
                  }
               }
               
               // adjust total
               var totalVal = parseFloatString(total.innerHTML.substr(0, total.innerHTML.length));
               totalVal -= (price - parseFloatString(newPrice));
               total.innerHTML = totalVal.toFixed(2).replace(".", ",") + " €";
           })
       }
   }
   
    
});