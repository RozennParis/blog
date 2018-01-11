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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        
        <title>BSA - chapitre <?= $article->getId(); ?></title>

        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/gsdk.css" rel="stylesheet"/> 
        <link href="src/public/css/style.css" rel="stylesheet" /> 

          <!--     Font Awesome     -->
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

    </head>
        
    <body>

        <header class="container-fluid header-other-pages"> 

            <?php require ('src/view/templates/_nav.php'); ?>  

            <div>
                <h1 ><?= $article->getArticleNumber() . ' - ' . $article->getTitle(); ?></h1>
                <h5><em><?= $article->getDateCreation(); ?></em></h5>
                
            </div>
        </header>

        <main class="container-fluid main"> 

                <div class="row">

                    <!-- display article's content -->
                    <div class="col-xs-12 subdivision">
                        <h3>Un peu de lecture</h3>
                    </div>


                    <div class="col-xs-10 col-xs-push-1">
                        <div class="comments">
                           <p><?= nl2br($article->getContent()); ?></p>
                           <!--<p>blablabla</p>-->
                        </div>
                    </div>
    
                    <!-- display comments -->
                    <div class="col-xs-12 subdivision">
                        <h3>Commentaires</h3>
                    </div>
        


                    <div class="col-xs-10 col-xs-push-1">
                        <?php
                        
                        if ($comments == NULL)
                        {
                        ?>
                            <div class="comments">
                                <p><?= 'Il n\'y a pas encore de commentaires.'; ?></p>
                            </div>

                        <?php
                        } else {

                            foreach ($comments as $commentGrp)
                            {   
                        
                        ?>
                                <div class="comments">
                        <?php
                                foreach($commentGrp as $comment)
                                {
             
                                    if ($comment->getParentId() !=0) 
                                    { 

                                        
                        ?>          
                                    <div class="answer">
                                        <p><strong><?= htmlspecialchars($comment->getAuthor()); ?></strong> le <?= $comment->getCommentDate(); ?></p>
                                        <p><?= nl2br(htmlspecialchars($comment->getComment())); ?></p>

                                                
                        <?php
                        
                                        if ($comment->getModerationStatus() !=2)
                                        {  
                        ?>
                                            <form method="post" action="index.php?action=alertComment&amp;id=<?= $article->getId(); ?>&amp;commentId=<?= $comment->getId(); ?>&amp;alert=1">
                                                <button type="submit" name="alert">Signaler</button>
                                            </form>
                        <?php

                                        }       
                        ?>
                                    </div>
                                    
                                       
                        <?php
                                
                                } else {
                        ?>      <div class="comment">
                                        <div >
                                            <p><strong><?= htmlspecialchars($comment->getAuthor()); ?></strong> le <?= htmlspecialchars($comment->getCommentDate()); ?></p>
                                            <p><?= nl2br(htmlspecialchars($comment->getComment())); ?></p>
                                        </div>  

                                        <div class="panel-group" id="accordion<?= $comment->getId();?>" aria-multiselectable="false">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" id="headingOne">
                                                    <button data-toggle="collapse" data-parent="#accordion<?= $comment->getId(); ?>" href= "#collapse<?= $comment->getId(); ?>" aria-expanded="false" aria-controls="collapseOne">Répondre</button>  
                        <?php
                        
                                                    if ($comment->getModerationStatus() !=2) 
                                                    {  
                        ?>
                                                        <form method="post" action="index.php?action=alertComment&amp;id=<?= $article->getId(); ?>&amp;commentId=<?= $comment->getId(); ?>&amp;alert=1">
                                                            <button type="submit" name="alert">Signaler</button>
                                                        </form>
                        <?php

                                                    }       
                        ?>

                                                </div>
                                        


                                                <div id="collapse<?= $comment->getId(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">

                                                        <form  method="post" action="index.php?action=addComment&amp;id=<?= $article->getId(); ?>&amp;parentId=<?= $comment->getId(); ?>">

                                                                
                                                            <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
                                                            <p><textarea id="answer" name="comment" placeholder="Saisissez votre réponse ici" required></textarea></p>
                                                            <button type="submit" name="answer">Envoyer la réponse</button>
                                                                    
                                                        </form>

                                                        
                                                    </div>
                                                </div>           
                                            </div>
                                        </div>
                                    </div>
                        <?php    
                                }
                      
                            }
                        
                        ?>
                            </div> 
                            
                        <?php
                        }
                    }
                        ?>
                            
                    </div>
                    
               
                    <!-- display form to add a comment -->
                    <div class="col-xs-12 subdivision">
                        <h3>Exprimez-vous !!!</h3>
                    </div>
        
                    <div class="col-xs-10 col-xs-push-1 ">

                        <form class="comment-form" method="post" action="index.php?action=addComment&amp;id=<?= $article->getId(); ?>&amp;parentId=0&amp;chapitre=<?= $article->getArticleNumber(); ?>">

                            <p>Laissez un message ;-)</p>
                            <p><input class="author" type="text" name="author" placeholder="Votre nom" required></p>
                            <p><textarea id="comment" name="comment" placeholder="Saisissez votre commentaire ici" required></textarea></p>
                            <p><input type="submit" value="Envoyer"></p>

                        </form>
                    </div>
                </div>
            
        </main>
        <?php require ('src/view/templates/_footer.php'); ?>  
    