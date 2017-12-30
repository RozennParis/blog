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
        <!--<link href="src/public/css/dashboard.css" rel="stylesheet" />-->
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/gsdk.css"/ rel="stylesheet">
        <link href="src/public/css/style.css" rel="stylesheet" />
        <!--     Font Awesome     -->
    
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

        
    </head>
        
    <body>

        <header class="container-fluid homepage"> 

        <nav class="navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
              
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">BSA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chapitres <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                <?php 
                            foreach ($chapters as $chapter) 
                            {
                ?>
                                <li><a href="index.php?action=article&id=<?php echo $chapter->getArticleNumber(); ?>"> chapitre <?php echo $chapter->getId(); ?></a></li>
                <?php
                            }
                ?>                     
                        </ul>
                    </li>
                    <li><a href="#">A propos</a></li>
                </ul>

            <?php
            if (isset($_SESSION['pseudo'])) {
            ?> 
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?action=adminView">Administration</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chapitres <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?action=adminArticles"> Tous les chapitres</a></li>
                            <li><a href="index.php?action=adminAddArticle"> Ajouter un chapitre</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="index.php?action=adminComments"> Commentaires</a></li>

                    <li><a class="btn btn-default btn-round" href="index.php?action=disconnection">Déconnexion</a></li>
               </ul>
            <?php 
            }
            else {
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="btn btn-default btn-round" role="button" href="index.php?action=connectionAccess">Connexion</a></li>
                    <!--<li><a class="btn btn-default btn-round" role="button" href="index.php?action=inscriptionAccess">Inscription</a></li>-->  
                </ul>
            <?php
            }
            ?>

            </div><!-- /.navbar-collapse -->

          </div> 
        </nav>
          

            <div class="title">
                <h1>Billet simple pour l'Alaska</h1>
                <h3 class="subtitle">Jean Forteroche</h3>
            </div>
        </header>

        <section class="container-fluid">
            <!--<div class="row">-->
               <div class="col-xs-10 col-xs-push-1">
                    <div class="row ">


                        <?php
                        foreach ($articles as $article)
                        {
                        ?>
                            <article class="col-sm-6 col-md-4 "> <!-- vérifier pour plein écran-->

                                <div class="thumbnail">
                                    <!--<img src="..." alt="...">-->
                                        <div class="row">
                                            <div id="date" class="col-xs-1">
                                                <h6><?php echo $article->getDateCreation(); ?><h6>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <h4 class="center">
                                                <?php echo 'Chapitre ' . $article->getArticleNumber() . ' : ' . $article->getTitle(); ?>
                                            </h4>   
                                                
                                                
                                            <p><?php echo $article->getContent();?></p>

                                            <p class="center"><a class="btn btn-default btn-round" href="index.php?action=article&id=<?php echo $article->getId(); ?>">En lire plus</a></p>
                                        </div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>
                   </div>
                </div>
            </div>
            

            <div class="center">
                <ul class="pagination">
                <?php
                    for ($i=1; $i<=$numbers ;$i++)
                    {
                ?>  
                        <li><a  href="<?php echo 'index.php?page=' . $i ?>"><?php echo $i ?></a></li>
            <?php
                    }
            ?>
                </ul>
           </div>
        </section>

        


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="src/public/js/gsdk-bootstrapswitch.js"></script>
        <script src="src/public/js/get-shit-done.js"></script>
        <!--<script src="src/public/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
        <script src="src/public/js/custom.js"></script>-->
    </body>

    <footer>

    </footer>
</html>