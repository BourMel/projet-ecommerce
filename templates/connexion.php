<?php
    require "./shared/head.html";
    require "./shared/header.html";
?>

<main class="connexion_page">
    <span class="separation titre d-flex flex-column">
        <img src="../assets/icons/account.svg">
        <h2>Connexion</h2>
    </span>
    
    <div class="wrapper row">
        
        <div class="box col-lg-6 col-sm-12">
            <h4>Déjà inscrit ?</h4>
            
            <form method="post" action="">
                <label for="mail">Adresse email</label>
                <input id="mail" type="text" placeholder="Adresse email">
                
                <label for="password">Mot de passe</label>
                <input id="password" type="password" placeholder="Mot de passe">
                
                <button type="submit">Connexion</button>
            </form>
        </div>
        
        <div class="box col-lg-6 col-sm-12">
            <h4>Créez un compte</h4>
            
            <button data-toggle="collapse" data-target="#inscription" role="button" aria-expanded="false" aria-controls="#inscription">
                Afficher le formulaire d'inscription
            </button>
            
            <form id="inscription" class="collapse" method="post" action="">
                <fieldset>
                    <label for="mail">Adresse email</label>
                    <input id="mail" type="text" placeholder="Adresse email">
                    
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" placeholder="Mot de passe">
                    
                    <label for="password_conf">Confirmation du mot de passe</label>
                    <input id="password_conf" type="password" placeholder="Confirmation du mot de passe">
                </fieldset>
                
                <fieldset>
                    <label for="last_name">Nom</label>
                    <input id="last_name" type="text" placeholder="Nom">
                    
                    <label for="first_name">Prénom</label>
                    <input id="first_name" type="text" placeholder="Prénom">
                    
                    <label for="address">Adresse</label>
                    <input id="address" type="text" placeholder="Adresse">
                    
                    <label for="cp">Code postal</label>
                    <input id="cp" type="text" placeholder="Code postal">
                    
                    <label for="city">Ville</label>
                    <input id="city" type="text" placeholder="Ville">
                </fieldset>
                    
                <button type="submit">Inscription</button>
            </form>
        </div>
        
    </div>
</main>

<?php    
    require "./shared/footer.html";