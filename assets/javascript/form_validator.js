/**FRONT VALIDATION**/

/**
 * If msg is given, adds an error message next to an element
 * Else, remove it
 * Params :
 * Id of the target element
 * Msg to display if there is one
 **/
 
function addErrorMessage(id, msg) {
    var $elt = $("#" + id);
    var $parent = $elt.parent().first();
    
    // delete old error
    var $oldError = $(".error." + id);
    
    if($oldError.length != 0) {
        $oldError.remove();
    }
    
    // add new error
    
    if(msg.length > 0) {
        var error = document.createElement("label");
        error.classList = "error " + id;
        error.setAttribute("for", id);
        error.innerHTML = msg;
        
        $elt.after(error);
    }
}

/**
 * Checks if all fields in the form are filled, submits it if it's okay
 * Params :
 * Id of the form to check
 * Last field id (where to display the error)
 **/
function validateFilledForm(formId, lastFieldId) {
    $("#"+formId).on('submit', function(e){
            
        is_valid = true;
        
        for(var i=0; i<this.length; i++) {
            // we check that all fields (except submit button) are filled
            if(this[i].type != "submit" && this[i].value === '') {
                is_valid = false;
                console.log(this[i])
                break;
            }
        }
        
        if(is_valid) {
            addErrorMessage(lastFieldId, "")
        } else {
            // error displayed after the last field
            addErrorMessage(lastFieldId, "Tous les champs doivent être remplis")
            e.preventDefault();
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    
    /**INSCRIPTION**/
    
    var insc_form = document.getElementById("inscription");
     
    if(insc_form != null && insc_form.length != 0) {
        
        var password = document.getElementById("password_insc");
        
        document.getElementById("mail_insc").addEventListener("keyup", function() {
            if(validateEmail(this.value)) {
                this.className = "valid";
                addErrorMessage("mail_insc", "");
                
            } else {
                this.className = "invalid";
                addErrorMessage("mail_insc", "Votre adresse email n'est pas valide");
            }
        });
        password.addEventListener("keyup", function() {
            if(this.value.length >= 8) {
                this.className = "valid";
                addErrorMessage("password_insc", "");
                
            } else {
                this.className = "invalid";
                addErrorMessage("password_insc", "Votre mot de passe n'est pas assez long (moins de 8 caractères)");
            }
        });
        
        document.getElementById("password_conf").addEventListener("keyup", function() {
            if((this.value.length >= 8) && (this.value == password.value)) {
                this.className = "valid";
                
            } else {
                this.className = "invalid";
                addErrorMessage("password_conf", "Les mots de passe ne correspondent pas")
            }
        });
         
         
        /**every other field only needs to be filled**/

        // coloration to help the user
        $("#inscription .required").on("keyup", function() {
            if(this.value.length > 0) {
                this.className = "valid";
            } else {
                this.className = "invalid";
            }
        })

        
        // submits only if filled
        validateFilledForm("inscription", "city");
      
    }
    
    
    /**CONNECTION**/
    
    // only checks that the fields are filled
    validateFilledForm("connection_form", "password");
 
});


