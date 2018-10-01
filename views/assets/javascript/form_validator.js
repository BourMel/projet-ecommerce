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
    console.log(".error#" + id)
    console.log($oldError);
    
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


document.addEventListener('DOMContentLoaded', function() {
    
    /**INSCRIPTION**/
    
    var insc_form = document.getElementById("inscription");
     
    if(insc_form.length != 0) {
        
        var password = document.getElementById("password_insc");
        
        document.getElementById("mail_insc").addEventListener("keyup", function() {
            if(validateEmail(this.value)) {
                this.className = "valid";
                
            } else {
                this.className = "invalid";
            }
        });
        password.addEventListener("keyup", function() {
            var errorMsg = "";
            
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
         
         
    }
 
 
});


