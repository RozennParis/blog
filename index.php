<?php


require 'vendor/autoload.php';



if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'listArticles') {
        $articleController = new ArticleController();
        $data = $articleController->listArticles();
    }
   /* elseif ($_GET['action'] == 'post') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            post();

        }

        else {

            echo 'Erreur : aucun identifiant de billet envoyé';

        }

    }*/

}

else {
    $articleController = new \blog\controller\frontend\ArticleController();

    $data = $articleController->listArticles();

}