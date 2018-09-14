<?php
    require "./shared/head.html";
    require "./shared/header.html";
?>

<main class="accueil">
    <div class="catalogue"> 
        <div class="wrapper d-flex justify-content-between">
            <p>Venez découvrir nos produits !</p>
            <a href="" class="align-self-end">Visitez notre catalogue</a>
        </div>
    </div>
    
    <span class="separation d-flex flex-column">
        <img src="../assets/icons/heart.svg">
        <h2>Meilleures ventes</h2>
    </span>
    
    <div class="best wrapper d-flex justify-content-between">
        <a href="" class="item">
            <img src="../assets/images/default2.jpg">
            <h3>Nom d'article</h3>
            <span class="price">6,00€</span>
        </a>
        
        <a href="" class="item">
            <img src="../assets/images/default3.jpg">
            <h3>Nom d'article</h3>
            <span class="price">6,00€</span>
        </a>
        
        <a href="" class="item">
            <img src="../assets/images/default4.jpg">
            <h3>Nom d'article</h3>
            <span class="price">6,00€</span>
        </a>
    </div>
    
</main>

<?php    
    require "./shared/footer.html";