<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administration</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
        <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>

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
            'save table contextmenu directionality emoticons template paste textcolor'
             ],
            content_css: 'css/content.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'

        });
    </script>
    </script>
    </head>
        
    <body>

        <header> 

            <div class="row">
                <h1>Administration</h1>
            </div>
        </header>

        <nav class="navbar navbar-inverse nav-stacked" >
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a class="navbar-brand" href="index.php">Accueil</a></li>
                    <li><a class="navbar-brand" href="index.php?action=adminView">Tableau de bord</a></li>
                    <li><a class="navbar-brand">Chapitres</a></li>
                        <ul>
                            <li><a href="index.php?action=adminArticles"> Tous les chapitres</a></li>
                            <li><a href="index.php?action=adminAddArticle"> Ajouter un chapitre</a></li>
                        </ul>
                    <li><a class="navbar-brand" href="index.php?action=adminComments"> Commentaires</a></li>
                </ul>
            </div>
        </nav> 


        <h2>Modification de l'article</h2>

        <form method="post" action="index.php?action=modifArticle&amp;id=<?= $article['id'] ?>"> 

            <p><input  type="text" name="title" required value="<?php echo htmlspecialchars($article['title']);?>"</p>
            <p><textarea id="textarea" name="content" required><?php echo htmlspecialchars($article['content']);?></textarea></p>
            <p><input type="submit" value="Valider la modification"></p>

        </form>
    

        
    </body>

    <footer>
        <a href="index.php?action=deconnexion"><button>Déconnexion</button></a>

    </footer>
</html>