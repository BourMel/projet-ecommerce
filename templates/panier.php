<?php
    require "./shared/head.html";
    require "./shared/header.html";
?>

<main class="cart">
    <span class="separation titre d-flex flex-column">
        <img src="../assets/icons/buy.svg">
        <h2>Mon panier</h2>
    </span>
    
    <div class="wrapper row">
        
        <div class="box col-lg-6 col-sm-12">
            <img class="item" src="../assets/images/default3.jpg">
            <img class="item" src="../assets/images/default4.jpg">
            <img class="item" src="../assets/images/default2.jpg">
        </div>
        
        <div class="box col-lg-6 col-sm-12">
            <div class="info d-flex">
                <h3>Nom d'article</h3>
                <span class="price">6,00€</span>
            </div>
            <div class="info d-flex">
                <h3>Nom d'article</h3>
                <span class="price">15,00€</span>
            </div>
            <div class="info d-flex">
                <h3>Nom d'article fabuleux</h3>
                <span class="price">7,00€</span>
            </div>
            
            <p class="total">Total: 18,00 €</p>
            
            <button>Valider</button>
        </div>
    </div>
</main>

<?php    
    require "./shared/footer.html";