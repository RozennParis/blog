<?php


require 'vendor/autoload.php';

//use blog\controller\frontend;


if (isset($_GET['action'])) {

    if ($_GET['action'] == 'listArticles') {

        $articleController = new \blog\controller\frontend\ArticleController();
        $data = $articleController->listArticles();
    }

   elseif ($_GET['action'] == 'article'){

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            $articleController = new \blog\controller\frontend\ArticleController();
            $data = $articleController->article($_GET['id']);
            

        }

        else {

            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] == 'addComment') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {


            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $articleController = new \blog\controller\frontend\ArticleController();
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

    /*elseif ($_GET['action'] == 'addAnswer') {

        if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['id']) && $_GET['id'] > 0) {


            if (!empty($_POST['author']) && !empty($_POST['answer'])) {

                $articleController = new \blog\controller\frontend\ArticleController();
                $addedAnswer = $articleController->addAnswers($_GET['id'], $_GET['commentId'], $_POST['author'], $_POST['answer']);

            }

            else {

                echo 'Erreur : tous les champs ne sont pas remplis !';

            }

        }

        else {

            echo 'Erreur : aucun identifiant de billet envoyé';

        }

    }*/

    elseif ($_GET['action'] == 'connexion'){
        
    }

}

else {

    $articleController = new \blog\controller\frontend\ArticleController();
    $data = $articleController->listArticles();

}