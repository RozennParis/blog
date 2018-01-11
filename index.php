<?php

session_start();

ini_set('display_errors', '1');
error_reporting(E_ALL); 


require 'vendor/autoload.php';

use \blog\controller\frontend\ArticleController;
use \blog\controller\frontend\ConnectionController;
use \blog\controller\backend\AdminController;


if (isset($_GET['action'])) {


    // --------- FrontEnd --------- //


    if ($_GET['action'] == 'listArticles') {

        if (isset($_GET['page'])) 
        {
            $articleController = new ArticleController();
            $data = $articleController->listArticles($_GET['page']);
        } 
        else 
        {
            $articleController = new ArticleController();
            $data = $articleController->listArticles(1);
        }

       
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
                $addedComment = $articleController->addComments($_GET['id'], $_GET['parentId'], $_GET['chapitre'],$_POST['author'], $_POST['comment']);
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

    // <--------- Connection / Deconnection / Inscription ---------> //

    elseif ($_GET['action'] == 'connectionAccess'){

        $connectionController = new ConnectionController();
        $data = $connectionController->accesstoAdmin();
    }


    elseif ($_GET['action'] == 'connection'){

       
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

            $connectionController = new ConnectionController();
            $connection = $connectionController->openAdmin($_POST['pseudo'], $_POST['password']);


            if (isset($_SESSION['pseudo'])) { 
            $adminController = new AdminController();
            $data = $adminController->listAdmin();
            }
        }
        else 
        {
            echo 'Merci de remplir tous les champs';
        }  
    } 

    elseif ($_GET['action'] == 'disconnection'){

        $connectionController = new ConnectionController();
        $data = $connectionController->closeAdmin();
    }


    elseif ($_GET['action'] == 'inscriptionAccess'){

        $connectionController = new ConnectionController();
        $data = $connectionController->accesstoInscription();
    }

    elseif ($_GET['action'] == 'inscription'){

        if (!empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['passBis'])) {
            $connectionController = new ConnectionController();
            $data = $connectionController->addMember($_POST['login'], $_POST['pass'], $_POST['passBis']);
        }
    }


    // <--------- BackEnd ---------> //

    // <----- display ----->
    elseif ($_GET['action'] == 'adminView'){

        //if (isset($_SESSION['pseudo'])) {
            $adminController = new AdminController();
            $data = $adminController->listAdmin();
        /*}

        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }*/
    }


    elseif ($_GET['action'] == 'adminArticles'){


        if (isset($_SESSION['pseudo'])) {
            $adminController = new AdminController();
            $data = $adminController->showAllArticles();
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
    }

    elseif ($_GET['action'] == 'adminArticle'){ 
        
        if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {

                $adminController = new AdminController();
                $data = $adminController->showArticle($_GET['id']);
            }
            else {

                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
    }


    elseif ($_GET['action'] == 'adminComments'){

        if (isset($_SESSION['pseudo'])) {
            $adminController = new AdminController();
            $data = $adminController->showAllComments();
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
    }

    elseif ($_GET['action'] == 'adminAddArticle'){

        if (isset($_SESSION['pseudo'])) {

            require ('src/view/backend/articleAdditionView.php');
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
        
    }

     // <----- modification / deletion/ addition / moderation ----->
    elseif ($_GET['action'] == 'modifArticle'){ 

       if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {

                if (isset($_POST['number']) && !empty($_POST['number']) && isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])) {

                    $adminController = new AdminController();
                    $data = $adminController->modifArticle($_GET['id'], $_POST['number'], $_POST['title'], $_POST['content']);

                }

                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {

                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }

    }


    elseif ($_GET['action'] == 'deleteArticle'){ 

       if (isset($_SESSION['pseudo'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                $adminController = new AdminController();
                $data = $adminController->deleteArticle($_GET['id']); 
            }
            else {

                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }

    }

    
    elseif ($_GET['action'] == 'additionArticle') {

        if (isset($_SESSION['pseudo'])) {

            if (!empty($_POST['number']) &&!empty($_POST['title']) && !empty($_POST['content'])) {

                $adminController = new AdminController();
                $data = $adminController->addArticles($_POST['number'], $_POST['title'], $_POST['content']);
            }

            else {

                 echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
         else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
    }

    elseif ($_GET['action'] == 'moderateComment') {

        if (isset($_SESSION['pseudo'])) {   
            if (!empty($_GET['commentId']) && !empty($_GET['moderation'])) {

                $adminController = new AdminController();
                $moderatedComment = $adminController->moderateComments($_GET['commentId'], $_GET['moderation']);
            }
            else {
                echo 'Erreur : le message n\'a pas été modéré !!!';
            }
        }
        else {
            echo 'Veuillez vous connecter pour accéder à l\'administration du blog';
        }
    }
}

else {

    if (isset($_GET['page'])) 
        {
            $articleController = new ArticleController();
            $data = $articleController->listArticles($_GET['page']);
        } 
        else 
        {
            $articleController = new ArticleController();
            $data = $articleController->listArticles(1);
        }

}