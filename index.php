<?php

error_reporting(E_ALL); ini_set('display_errors', '1');


require 'vendor/autoload.php';

use \blog\controller\frontend\ArticleController;
use \blog\controller\frontend\ConnectionController;
use \blog\controller\backend\AdminController;


if (isset($_GET['action'])) {


    // --------- FrontEnd --------- //


    if ($_GET['action'] == 'listArticles') {

        $articleController = new ArticleController();
        $data = $articleController->listArticles();
    }

    elseif ($_GET['action'] == 'article'){

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            $articleController = new ArticleController();
            $data = $articleController->article($_GET['id']);
        }
        else {

            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }


    elseif ($_GET['action'] == 'addComment') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {


            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $articleController = new ArticleController();
                $addedComment = $articleController->addComments($_GET['id'], $_GET['parentId'], $_POST['author'], $_POST['comment']);
            }

            else {

                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }

        else {

            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }


    elseif ($_GET['action'] == 'alertComment') {

        if (!empty($_GET['id']) && !empty($_GET['commentId']) && !empty($_GET['alert'])) {

            $articleController = new ArticleController();
            $alertedComment = $articleController->alertComments($_GET['id'], $_GET['commentId'], $_GET['alert']);
        }

        else {

            echo 'Erreur : votre message d\'alerte n\'a pas été envoyé !!!';
        }
    }


    elseif ($_GET['action'] == 'connexion'){

       
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

            $connectionController = new ConnectionController();
            $connection = $connectionController->openAdmin($_POST['pseudo'], $_POST['password']);

            $adminController = new AdminController();
            $data = $adminController->listAdmin();
        }
    } 


    // <--------- BackEnd ---------> //

    // <----- display ----->
    elseif ($_GET['action'] == 'adminView'){

        $adminController = new AdminController();
        $data = $adminController->listAdmin();
    }


    elseif ($_GET['action'] == 'adminArticles'){

        $adminController = new AdminController();
        $data = $adminController->showAllArticles();
    
    }

    elseif ($_GET['action'] == 'adminArticle'){ 

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            $adminController = new AdminController();
            $data = $adminController->showArticle($_GET['id']);
        }
        else {

            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }


    elseif ($_GET['action'] == 'adminComments'){

            $adminController = new AdminController();
            $data = $adminController->showAllComments();
    
    }

    elseif ($_GET['action'] == 'adminAddArticle'){

        require ('src/view/backend/articleAdditionView.php');
    }


    elseif ($_GET['action'] == 'modifArticle'){ 

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])) {

                $adminController = new AdminController();
                $data = $adminController->modifArticle($_GET['id'], $_POST['title'], $_POST['content']);

            }

            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {

            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    
    elseif ($_GET['action'] == 'additionArticle') {


        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $adminController = new AdminController();
            $data = $adminController->addArticles($_POST['title'], $_POST['content']);
        }

        else {

             echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }

    elseif ($_GET['action'] == 'moderateComment') {

        if (!empty($_GET['commentId']) && !empty($_GET['moderation'])) {

            $adminController = new AdminController();
            $moderatedComment = $adminController->moderateComments($_GET['commentId'], $_GET['moderation']);

        }

        else {

            echo 'Erreur : le message n\'a pas été modéré !!!';
        }
    }

    
}

else {

    $articleController = new ArticleController();
    $data = $articleController->listArticles();

}