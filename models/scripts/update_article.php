<?php

/**
 * Update one article depending on the given id
 * 
 * Ex : while in workspace, typing
 * 'php models/scripts/update_article.php 1 ephedra 42.00 "La plante emblématique" 2'
 * will update the article 1
 */

// require_once "bootstrap.php";
// require_once "./models/Article.php";

// $id = $argv[1];
// $name = $argv[2];
// $price = $argv[3];
// $description = $argv[4];
// $category_id = $argv[5];

// $article = $entityManager->find('Article', $id);

// if ($article === null) {
//     echo "Article $id not found.\n";
//     exit(1);
// }

// $article->setName($name);
// $article->setPrice($price);
// $article->setDescription($description);
// $article->setCategory($category_id);

// $entityManager->flush();