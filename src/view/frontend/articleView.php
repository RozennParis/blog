<?php


/* ici page dédiée à l'affichage de l'article avec les commentaires
 
 - chapitre entier sur une page
 - bloc commentaires en dessous avec bouton signaler
 - formulaire de saisie de commentaires avec champ pour pseudo, champ pour texte commentaires et bouton submit
  */
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="icon" href=../../favicon.ico>
        <title>Billet simple pour l'Alaska</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
        <link href="src/public/css/style.css" rel="stylesheet" /> 
    </head>

        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        <p><a href="index.php?action=listArticles">Retour à la page d'accueil</a></p>

        <div class="news">
            <h3><?= $article->getTitle(); ?></h3>
            <h5><em><?= $article->getDateCreation(); ?></em></h5>

            <p> <?= nl2br($article->getContent()); ?></p>
        </div>

        <div>


        <h4>Commentaires</h4>

        <?php

        foreach ($comments as $commentGrp)
        {   
            foreach($commentGrp as $comment){
        ?>
              
        <?php        
                if (array_key_exists('answer',$commentGrp)){

                    if (key($commentGrp) == 'answer'){

                        foreach ($comment as $answer)
                        {
        ?>
                            <div class="answer">
                                <p><strong><?= htmlspecialchars($answer->getAuthor()); ?></strong> le <?= $answer->getCommentDate(); ?></p>
                                <p><?= nl2br(htmlspecialchars($answer->getComment())); ?></p>

                                <form method="post" action="index.php?action=alertComment&amp;id=<?= $article->getId(); ?>&amp;commentId=<?= $answer->getId(); ?>&amp;alert=1">
                                    <button type="submit" name="alert">Signaler</button>
                                </form>
                            </div>

        <?php
                        }
                    } else {
        ?>
                        <p><strong><?= htmlspecialchars($comment->getAuthor()); ?></strong> le <?= htmlspecialchars($comment->getCommentDate()); ?></p>
                        <p><?= nl2br(htmlspecialchars($comment->getComment())); ?></p>
        <?php
                    }
                } else {
        ?>        
                    <p><strong><?= htmlspecialchars($comment->getAuthor()); ?></strong> le <?= htmlspecialchars($comment->getCommentDate()); ?></p>
                    <p><?= nl2br(htmlspecialchars($comment->getComment())); ?></p>
        <?php    
                }
        ?>
        
            <div>
                <form  method="post" action="index.php?action=addComment&amp;id=<?= $article->getId(); ?>&amp;parentId=<?= $comment->getId(); ?>&amp;answer=1">

                    
                    <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
                    <p><textarea id="answer" name="comment" placeholder="Saisissez votre réponse ici" required></textarea></p>
                    <button type="submit" name="answer">Envoyer la réponse</button>
                        
                </form>
                
                <form>
                    <button type="text" name="" onclick="">Répondre</button>
                </form>

                <form method="post" action="index.php?action=alertComment&amp;id=<?= $article->getId(); ?>&amp;commentId=<?= $comment->getId(); ?>&amp;alert=1">
                    <button type="submit" name="alert">Signaler</button>
                </form>

        <?php
            }
        }
        ?>
        

            </div>
        <h4>Exprimez-vous !!!</h4>

        <form method="post" action="index.php?action=addComment&amp;id=<?= $article->getId(); ?>&amp;parentId=0&amp;chapitre=<?= $article->getArticleNumber(); ?>">

            <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
            <p><textarea id="comment" name="comment" placeholder="Saisissez votre commentaire ici" required></textarea></p>
            <p><input type="submit" value="Envoyer"></p>

        </form>

    </body>
</html> 