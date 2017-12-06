

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administration</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
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


        <h2>Les articles</h2>


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
                    <td scope="row"><?php echo htmlspecialchars($article['id']);?></td>
                    <td><a href="index.php?action=adminArticle&amp;id=<?= $article['id'] ?>"><?php echo htmlspecialchars($article['title']);?></a></td>
                    <td><a href="index.php?action=adminArticle&amp;id=<?= $article['id'] ?>"><button>Modifier</button></a>

                </tr>
        <?php
        }
        ?>
                
            </tbody>
        </table>


        
    </body>

    <footer>
        <a href="index.php?action=deconnexion"><button>Déconnexion</button></a>

    </footer>
</html>