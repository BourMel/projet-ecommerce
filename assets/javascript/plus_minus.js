/**
 * on click on a 'minus' or 'plus' span, handles quantity
 * assumes that a minus and a plus are always present in order to make less operations
**/

document.addEventListener('DOMContentLoaded', function() {
   
   var plus = document.getElementsByClassName("plus");
   var minus = document.getElementsByClassName("minus");
   
   console.log(plus);
   console.log(minus);
   
   if(plus.length == minus.length) {
       for(var i=0; i<plus.length; i++) {
       
           plus[i].addEventListener("click", function() {
               var quantity = parseInt(this.parentNode.querySelector(".quantity").innerHTML);
               
               this.parentNode.querySelector(".quantity").innerHTML = quantity +1;
               
               var price = this.parentNode.parentNode.querySelector(".price").innerHTML;
               
               // @TODO
               this.parentNode.parentNode.querySelector(".price").innerHTML = "42,00€";
               
           })
           
           minus[i].addEventListener("click", function() {
               var quantity = parseInt(this.parentNode.querySelector(".quantity").innerHTML);
               
               if(quantity > 1) {
                   this.parentNode.querySelector(".quantity").innerHTML = quantity -1;
                   
                   var price = this.parentNode.parentNode.querySelector(".price").innerHTML;
               
                   // @TODO
                   this.parentNode.parentNode.querySelector(".price").innerHTML = "24,00€";
               
                // delete article
               } else if(quantity > 0) {
                   var divToDelete = this.parentNode.parentNode;
                   
                   divToDelete.parentNode.removeChild(divToDelete);
                   
                   //@TODO adjust total
               }
           })
       }
   }
   
    
});