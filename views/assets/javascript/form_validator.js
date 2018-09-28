/**FRONT VALIDATION**/

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
                
            } else {
                this.className = "invalid";
                // errorMsg = "Votre mot de passe n'est pas assez long (moins de 8 caractères)";
            }
            
            // //if there is only numbers in the password
            // var regex = /^[0-9]*$/;
            // if(regex.test(this.value)) {
                
            // }
            
            // console.log(this.value)
            // console.log(regex.test(this.value))
                    
        });
        document.getElementById("password_conf").addEventListener("keydown", function() {
            if((this.value.length >= 8) && (this.value == password.value)) {
                this.className = "valid";
                
            } else {
                this.className = "invalid";
            }
        });
         
         
    }
 
 
});


