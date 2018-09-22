/**FRONT VALIDATION**/

document.addEventListener('DOMContentLoaded', function() {
    
    /**INSCRIPTION**/
    
    var insc_form = document.getElementById("inscription");
     
    if(insc_form.length != 0) {
        
        var password = document.getElementById("password_insc");
        
        document.getElementById("mail_insc").addEventListener("keydown", function() {
            if(validateEmail(this.value)) {
                this.className = "valid";
                
            } else {
                this.className = "invalid";
            }
        });
        password.addEventListener("keydown", function() {
            if(this.value.length >= 8) {
                this.className = "valid";
                
            } else {
                this.className = "invalid";
            }
        });
        // document.getElementById("password_conf").addEventListener("keydown", function() {
        //     if((this.value.length >= 8) && (this.value == password.value)) {
        //         this.className = "valid";
                
        //     } else {
        //         this.className = "invalid";
        //     }
        // });
         
         
    }
 
 
});


