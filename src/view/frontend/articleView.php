<?php

/* ici page dédiée à l'affichage de l'article avec les commentaires
 
 - chapitre entier sur une page
 - bloc commentaires en dessous avec bouton signaler
 - formulaire de saisie de commentaires avec champ pour pseudo, champ pour texte commentaires et bouton submit
  */
?>

<!DOCTYPE html> <!-- données à modifier -->

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="icon" href=../../favicon.ico>
        <title>Billet simple pour l'Alaska</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    </head>

        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        <p><a href="index.php?action=listArticles">Retour à la page d'accueil</a></p>

        <div class="news">
            <h3><?= htmlspecialchars($article['title']) ?></h3>
            <h5><em><?= $article['date_creation_fr'] ?></em></h5>

            <p> <?= nl2br(htmlspecialchars($article['content'])) ?></p>
        </div>

        <div>


        <h4>Commentaires</h4>

        <?php
        foreach ($comments as $comment)
        {
           
        ?>
           
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            

            <!-- <?php
            foreach ($answers as $answer)
            {
            ?>
                <div>
                    <p><strong><?= htmlspecialchars($answer['author']) ?></strong> le <?= $answer['answer_date_fr'] ?></p>
                    <p><?= nl2br(htmlspecialchars($answer['answer'])) ?></p>
                </div>
            <?php
            }
            ?>-->
            
            <form method="post" action="index.php?action=addComment&amp;id=<?= $article['id'] ?>&amp;parentId=<?= $comment['id'] ?>">

                
                <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
                <p><textarea id="answer" name="answer" placeholder="Saisissez votre réponse ici" required></textarea></p>
                <button type="submit" name="answer">Envoyer la réponse</button>
                    
            </form>
            
            <form>
                <button type="submit" name="alert">Signaler</button>
            </form>-->

        <?php
        }
        ?>
        

        </div>
        <h4>Exprimez-vous !!!</h4>

        <form method="post" action="index.php?action=addComment&amp;id=<?= $article['id'] ?>">

            <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
            <p><textarea id="comment" name="comment" placeholder="Saisissez votre commentaire ici" required></textarea></p>
            <p><input type="submit" value="Envoyer"></p>

        </form>

    </body>
</html> 