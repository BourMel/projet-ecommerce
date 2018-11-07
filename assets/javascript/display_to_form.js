/**
 * if the page has one or more divs with the class "display_and_form" 
 * on click of a button with a class "set_to_form"
 * the spans inside of the divs will be changed into inputs,
 * and the button to a submit button
 * the form is added instead of a parent div with class "parent_div"
**/

document.addEventListener('DOMContentLoaded', function() {
   
   var parentDiv = document.getElementsByClassName("parent_div");
   var divToChange = document.getElementsByClassName("display_and_form");
   var changeButton = document.getElementsByClassName("set_to_form");
   
   if(changeButton.length == 1) {
      changeButton[0].addEventListener("click", function() {
   
       if((divToChange.length >= 1) && (changeButton.length == 1) && (parentDiv.length == 1)) {
           
           // creates a form inside the simple parent div
           var form = document.createElement("form");
           form.setAttribute('id', "parent_form");
           form.innerHTML = parentDiv[0].innerHTML;
           // we remove old content
           parentDiv[0].innerHTML = "";
           // and replace it with the form
           parentDiv[0].appendChild(form);
           
           // this elements changed so we get them again
           divToChange = document.getElementsByClassName("display_and_form");
           changeButton = document.getElementsByClassName("set_to_form")[0];
           
           // creates all inputs
           for(var i=0; i<divToChange.length; i++) {
               
               var spanToChange = divToChange[i].querySelectorAll("span");
               
              for(var j=0; j<spanToChange.length; j++) {
                  // we create a new input
                  var input = document.createElement("input");
                   
                  //which uses data-label and data-type attributes
                  input.setAttribute("placeholder", spanToChange[j].getAttribute("data-label"));
                  
                  var input_id = spanToChange[j].getAttribute("id");
                  
                  input.setAttribute("id", input_id);
                  input.setAttribute("name", input_id);
                  
                  if(spanToChange[j].getAttribute('data-type') == "password") {
                      input.setAttribute("type", "password");
                  } else {
                      input.setAttribute("type", "text");
                      // if it's not a password, we get the value and put it in the form
                      input.setAttribute("value", spanToChange[j].innerHTML);
                  }
                   
                  // and we add the new item
                  divToChange[i].appendChild(input);
                  // and remove the old one
                  divToChange[i].removeChild(spanToChange[j]);
              }
           }
           
           // now we change the "change" button to a submit one
           changeButton.innerHTML = "Valider";
           
          }
      });
   }
    
});