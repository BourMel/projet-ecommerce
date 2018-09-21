<?php
    require "./shared/head.html";
    require "./shared/header.html";
?>

<main class="account_page">
    <span class="separation titre d-flex flex-column">
        <img src="../assets/icons/account.svg">
        <h2>Compte client</h2>
    </span>
    
    <div class="wrapper row">
        
        <div class="box col-lg-4 col-sm-12">
            <h4>Compte</h4>
            
            <div id="account_infos">
                <span id="mail">jea_dupont@hello.net</span>
                <span id="password">*****</span>
            </div>
        </div>
        
        <div class="box col-lg-4 col-sm-12">
            <h4>Adresse</h4>
            
            <div id="client_infos">
                <span id="firstname_name">Jeanne Dupont</span>
                <span id="address">7, rue de Whatever</span>
                <span id="city_cp">67000 Strasbourg</span>
            </div>
        </div>
        
        <div class="box col-lg-4 col-sm-12">
           <h4>Commandes</h4>
           
           <div id="command_infos">
                <span id="done">6 commandes réalisées</span>
                <span id="received">5 commandes réceptionnées</span>
                <span id="processing">1 commande en cours de traitement</span>
            </div>
        </div>
        
    </div>
    
    <button>Modifier</button>
    
</main>

<?php    
    require "./shared/footer.html";