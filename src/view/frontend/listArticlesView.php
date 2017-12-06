

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
    </head>
        
    <body>

        <header> 

            <div class="row">
                <h1>Billet simple pour l'Alaska</h1>
            </div>
        </header>

        <nav class="navbar navbar-inverse" >
            <div class="container">
                <div class"navbar-header">
                  <a class="navbar-brand" href="#">Accueil</a>
                  <a class="navbar-brand" href="#">Chapitres</a>
                  <a class="navbar-brand" href="#">autre</a>
                  <a class="navbar-brand" href="#">autre</a>
                
            </div>
        </nav>

        <div>
            <?php


            foreach ($articles as $article)
            {
            ?>
            <div class="col-lg-4">
                <h3>
                    <?php echo 'Chapitre ' . htmlspecialchars($article['id']) . ' : ' . htmlspecialchars($article['title']); ?>
                </h3>   
                <h5><em><?php echo $article['date_creation_fr']; ?></em></h5>
                
                
                <p>
                <?php
                echo nl2br(htmlspecialchars($article['content']));
                ?>
                <br />
                <em><a href="index.php?action=article&id=<?php echo $article['id'] ?>"><button>En lire plus</button></a></em>
                </p>
            </div>
            <?php
            }
            ?>
        </div>
    </body>

    <footer>
        <a href="index.php?action=connexion"><button>Connexion</button></a>

        <form method="post" action="index.php?action=connexion">

                <p><label for="pseudo">Pseudo </label> <input type="text" name="pseudo"></p>
                <p><label for="password">Mot de passe </label><input type="password" name="password"></p>
               
                <p><input type="submit" value="Envoyer"></p>

            </form>

    </footer>
</html>