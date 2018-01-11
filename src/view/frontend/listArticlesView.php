
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

      
    <div class="container-fluid" id="wrapper">

          
        <div class="col-xs-12 col-md-4">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="carousel-page">
                            <img class="img-responsive" src="src/public/images/garrett-parker-247225.jpg" alt="bras de rivière en Alaska">
                        </div>
                    </div>

                    <div class="item">
                        <div class="carousel-page">
                            <img class="img-responsive" src="src/public/images/brown-bears-2119560_1920.jpg" alt="ours bruns">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-page">
                            <img class="img-responsive" src="src/public/images/chugach-national-forest-1622635_1920.jpg" alt="Forêt nationale de Chugach">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-page">
                            <img class="img-responsive" src="src/public/images/alaska-wilderness-sky-aurora-borealis-41004.jpeg" alt="aurore boréale">
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

    
            <article>
                <div class="presentation">
                    <div class="thumbnail">
                        <h4>A propos</h4>
                        <p class="center">Passionné depuis toujours par les grands espaces, c'est tout naturellement que Jean a posé ses valises au coeur du Wild. C'est là qu'il puise l'inspiration pour écrire ses oeuvres. </p>
                    </div>
                </div>
            </article>
           
        </div>

        <div class="col-xs-12 col-md-8">
            <div class="row ">
                <?php
                foreach ($articles as $article)
                {
                ?>
                    <article class="col-xs-12 col-md-10 col-md-push-1">

                        <div class="thumbnail">
                            <div class="row">
                                <div id="date" class="col-xs-1">
                                    <h6><?php echo $article->getDateCreation(); ?></h6>
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
        
    <?php require ('src/view/templates/_footer.php'); ?>  
    