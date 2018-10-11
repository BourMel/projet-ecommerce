/**
 * if the page has one or more divs with the class "display_and_form" 
 * on click of a button with a class "set_to_form"
 * the spans inside of the divs will be changed into inputs,
 * and the button to a submit button
**/

document.addEventListener('DOMContentLoaded', function() {
   
   var divToChange = document.getElementsByClassName("display_and_form");
   var changeButton = document.getElementsByClassName("set_to_form");
   
   if((divToChange.length >= 1) && (changeButton.length == 1)) {
       
       // creates all inputs
       for(var i=0; i<divToChange.length; i++) {
           
           var spanToChange = divToChange[i].getElementsByTagName("span");
           
           for(var j=0; j<spanToChange.length; j++) {
               // we create a new input
               var input = document.createElement("input");
               
               //which uses data-label and data-type attributes
               input.setAttribute("placeholder", spanToChange[j].getAttribute("data-label"));
               
              if(spanToChange[j].getAttribute('data-type') == "password") {
                  input.setAttribute("type", "password");
              } else {
                  input.setAttribute("type", "text");
              }
               
               // and we add the new item
               divToChange[i].appendChild(input);
           }
           
           
            // removes all spans
            for(var j=0; j<spanToChange.length; j++) {
                console.log(spanToChange[j])
                divToChange[i].removeChild(spanToChange[j]);
            }
       }
       
       
   }
   
    
});