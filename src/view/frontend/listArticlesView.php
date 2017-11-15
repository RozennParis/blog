

<!-- page d'accueil qui affiche les extraits des chapitres : 6 par "page"
 ordre à définir, du plus récent au plus vieux ou le 1er chapitre >>> le plus récent pour respecter l'ordre de lecture -->


<!-- Affichage -->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="public/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
 
        
        <?php


        foreach ($articles as $article)
        {
        ?>
        <div>
            <h3>
                <?php echo 'Chapitre ' . htmlspecialchars($article['id']) . ' : ' . htmlspecialchars($article['title']); ?>
                <em>le <?php echo $article['date_creation_fr']; ?></em>
            </h3>
            
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
    </body>
</html>