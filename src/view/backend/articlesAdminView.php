
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tous les articles</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
        <link href="src/public/css/dashboard.css" rel="stylesheet" />
        
    </head>
         
    <body>

        <header> 
            
        </header>

        <?php require ('src/view/templates/_navAdmin.php'); ?>  
        
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                    <h1 class="page-header">Les chapitres</h1>

                    <div class="row placeholders"></div>
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
                                        <td><a href="index.php?action=adminArticle&amp;id=<?= $article->getId(); ?>"><?php echo $article->getTitle();?></a></td>
                                        <td><a href="index.php?action=adminArticle&amp;id=<?= $article->getId(); ?>"><button><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                                        <td><a href="index.php?action=deleteArticle&amp;id=<?= $article->getId(); ?>"><button><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>


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