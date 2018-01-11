 

    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
       <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Billet simple pour l'Alaska</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!--<link href="src/public/css/dashboard.css" rel="stylesheet" />-->
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/gsdk.css" rel="stylesheet"/>
        <link href="src/public/css/style.css" rel="stylesheet" />
        <!--     Font Awesome     -->
    
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

        
    </head>
        
    <body>

        <header class="container-fluid homepage"> 

        <?php require ('src/view/templates/_nav.php'); ?>          

            <div class="title ">
                <h1>Billet simple pour l'Alaska</h1>
                <h3>Jean Forteroche</h3>
            </div>
        </header>

          <section class="container-fluid">
            <!--<div class="row">-->
               <div class="col-xs-12">
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
                                                <?php echo 'Chapitre ' . $article->getArticleNumber() ; ?><br/>
                                                <?php echo $article->getTitle(); ?>
                                            </h4>   
                                                
                                                
                                            <p><?php echo $article->getContent(); ?></p>

                                            <p class="center"><a class="btn btn-default btn-round" href="index.php?action=article&id=<?php echo $article->getId(); ?>">En lire plus</a></p>
                                        </div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>
                   </div>
                </div>
            
                <div class="col-xs-12 center">
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
            </div>
        </section>

    <?php require ('src/view/templates/_footer.php'); ?> 