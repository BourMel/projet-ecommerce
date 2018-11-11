Ce projet contient actuellement l'interface front des pages suivantes :

'/', ou 'index.php' :
Page d'accueil du site.

'/catalogue' :
Catalogue listant les différents produits.

'/panier' :
Panier d'un utilisateur. Il est possible de modifier les quantités (aller jusqu'à 0 supprime le produit du panier).

'/compte' :
Compte client. Cliquer sur le bouton "modifier" fait apparaître un formulaire de modification avec une validation JavaScript.

'/produit' :
Page type présentant un produit, accessible en cliquant dans le catalogue ou dans la page d'accueil.

'/connexion' :
Cette page permet de se connecter ou de s'inscrire (après avoir cliqué sur le bouton 'afficher le formulaire d'inscription').
Les deux formulaires sont validés en JavaScript (le formulaire de connexion ne vérifie que le remplissage des champs,
tandis que celui d'inscription guide l'utilisateur).

Toute autre URL mène à la page 404.

Toutes les pages sont interconnectées par des liens présents sur le site, à l'exception de la page "connexion".
En effet, le lien menant au compte client ne sera pas accessible par un utilisateur déconnecté, donc il sera remplacé par celui de connexion.