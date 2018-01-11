
<!-- vue de la page d'administration générale, renvoie vers "interface" TinyMCE pour l'ajout, la modif ou la suppression d'un article/chapitre

 - liste des chapitres
 - liste des commentaires en attente de modération
 - commentaires signalés 
 -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administration</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="src/public/css/dashboard.css" rel="stylesheet" />
        
    </head>
         
    <body>

        <header> 
            
        </header>

        <?php require ('src/view/templates/_navAdmin.php'); ?>   

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Tableau de bord</h1>

                    <div class="row placeholders"></div>
                    <h2 class="sub-header">Les derniers articles</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">N°chapitre</th>
                                    <th scope="col">Titre</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                        <?php
                        foreach ($articles as $article)
                        {
                        ?>
                                <tr>  
                                    <td scope="row"><?php echo $article->getArticleNumber();?></td>
                                    <td><?php echo $article->getTitle();?></td>
                                </tr>
                        <?php
                        }
                        ?>
                                
                            </tbody>
                        </table>
                    </div>


                    <h2 class="sub-header">Les derniers commentaires</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">N°commentaire</th>
                                    <th scope="col">Chapitre concerné</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Contenu</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                                foreach ($comments as $comment)
                                {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($comment->getId());?></td>
                                    <td><?php echo htmlspecialchars($comment->getConcernedArticle());?></td>
                                    <td><?php echo htmlspecialchars($comment->getAuthor());?></td>
                                    <td><?php echo htmlspecialchars($comment->getComment());?></td>
                                    <td><?php echo htmlspecialchars($comment->getCommentDate());?></td>
                                </tr>
                                <?php
                                }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
</html>