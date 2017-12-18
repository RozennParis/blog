
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
        <link href="src/public/css/dashboard.css" rel="stylesheet" />
        <script src="vendor/tinymce/tinymce/tinymce.min.js" type="text/javascript"></script>

        <script>
            tinymce.init({
                selector: 'textarea#textarea',
                language: 'fr_FR',

                theme: 'modern',
                width: 900,
                height: 300,
                plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor code'
                 ],
                content_css: 'css/content.css',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | code',
                advlist_bullet_styles: 'square',
                advlist_number_styles: 'lower-alpha,lower-roman,upper-alpha,upper-roman'

            });
        </script>
    </head>
        
    <body>

        <header> 
            
        </header>

        <nav class="navbar navbar-inverse navbar-fixed-top" >

            <div class="container-fluid">
                <div class="navbar-header">
                    <a  class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?action=deconnexion"><button>Déconnexion</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a class="" href="index.php?action=adminView">Tableau de bord</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chapitres <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?action=adminArticles"> Tous les chapitres</a></li>
                                <li><a href="index.php?action=adminAddArticle"> Ajouter un chapitre</a></li>
                            </ul>
                        </li>
                        <li><a class="" href="index.php?action=adminComments"> Commentaires</a></li>
                    </ul>
                </div> 

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                
                    <h1 class="page-header">Modification de l'article</h1>

                    <div class="row placeholders"></div>
                    <div class="table-responsive">

                        <form method="post" action="index.php?action=modifArticle&amp;id=<?= $article->getId() ?>"> 

                            <p><input  type="text" name="number" required value="<?php echo htmlspecialchars($article->getArticleNumber());?>"></p>
                            <p><input  type="text" name="title" required value="<?php echo htmlspecialchars($article->getTitle());?>"></p>
                            <p><textarea  id="textarea" name="content"  required><?php echo htmlspecialchars($article->getContent());?></textarea></p>
                            <p><input type="submit" value="Valider la modification"></p>

                        </form>
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