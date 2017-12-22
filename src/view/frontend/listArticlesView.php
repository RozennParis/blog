<?php
?>

<!-- page d'accueil qui affiche les extraits des chapitres : 6 par "page"
 ordre à définir, du plus récent au plus vieux ou le 1er chapitre >>> le plus récent pour respecter l'ordre de lecture -->


<!-- Affichage -->



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Billet simple pour l'Alaska</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="src/public/css/dashboard.css" rel="stylesheet" />
        <link href="src/public/css/gsdk.css"/ rel="stylesheet">
        <link href="src/public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>

        <header class="container-fluid"> 

            <div>
                <h1>Billet simple pour l'Alaska</h1>
                <h3>Jean Forteroche</h3>
            </div>
        </header>

        <nav class="navbar navbar-inverse navbar-static-top" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toogle" type="button" data-toogle="collapse" data-target="#bs-example-navbar-collapse1" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"> Accueil </a>
                      <a class="" href="#"> Chapitres </a>
                      <a class="" href="#"> A propos </a>
                </div>

            
        <?php
            if (isset($_SESSION['pseudo'])) {
        ?>
                <div class=" navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="navbar-brand" href="index.php?action=adminView">Administration</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chapitres <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?action=adminArticles"> Tous les chapitres</a></li>
                                <li><a href="index.php?action=adminAddArticle"> Ajouter un chapitre</a></li>
                            </ul>
                        </li>
                        <li><a class="" href="index.php?action=adminComments"> Commentaires</a></li>

                        <li><a class="btn btn-default btn-round" role="button" href="index.php?action=disconnection"><button>Déconnexion</button></a></li>
                    </ul>
                </div>

        <?php
            }
            else {
        ?>
                <div class=" navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn btn-default btn-round" role="button" href="index.php?action=connectionAccess">Connexion</a></li>
                        <!--<li><a href="index.php?action=inscriptionAccess"><button>Inscription</button></a></li>-->
                    </ul>
                </div>
        <?php
            }
        ?>    
        </nav>

        <section class="row">
            <?php

            
            foreach ($articles as $article)
            {
            ?>
            <article class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php echo 'Chapitre ' . $article->getArticleNumber() . ' : ' . $article->getTitle(); ?>
                        </h3>   
                        <!--<h5><em><?php echo $article->getDateCreation(); ?></em></h5>-->
                        
                        <p><?php echo nl2br($article->getContent()); ?></p>
                        <p><a class="btn btn-default" role="button" href="index.php?action=article&id=<?php echo $article->getId(); ?>">En lire plus</a></p>
                    </div>
                </div>
            </article>
            <?php
            }

            for ($i=1; $i<=$numberOfPages ;$i++)
            {
            ?>
            <a href="<?php echo 'index.php?page=' . $i ?>"><?php echo $i ?> ></a>
            <?php
            }
            ?>

            <aside class="col-sm-4">
            <?php
                foreach ($articles as $article)
                {     
            ?>

                <p><a class="" role="" href="index.php?action=article&id=<?php echo $article->getId(); ?>"><?php echo 'Chapitre ' . $article->getArticleNumber() . ' : ' . $article->getTitle(); ?></a></p>
            <?php
                }
            ?>
            </aside>


        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/js/jquery-ui-1.10.4.custom.min.js"></script>
    </body>

    <footer>
    </footer>
</html>