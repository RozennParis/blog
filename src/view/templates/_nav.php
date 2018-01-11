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
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                    <li><a class="navbar-brand" href="index.php">Accueil</a></li>
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
                <ul class="nav navbar-nav navbar-right"  >
                    <li><a class="btn btn-default btn-round" role="button" href="index.php?action=connectionAccess">Connexion</a></li>
                    <!--<li><a class="btn btn-default btn-round" role="button" href="index.php?action=inscriptionAccess">Inscription</a></li> -->
                </ul>
            <?php
            }
            ?>

            </div><!-- /.navbar-collapse -->

          </div> 
        </nav>




                                                  