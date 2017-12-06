

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administration Commentaires</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    </head>
        
    <body>

        <header> 

            <div class="row">
                <h1>Commentaires</h1>
            </div>
        </header>

        <nav class="navbar navbar-inverse nav-stacked" >
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a class="navbar-brand" href="index.php?action=adminView">Accueil administration</a></li>
                    <li><a class="navbar-brand">Chapitres</a></li>
                        <ul>
                            <li><a href="index.php?action=adminArticles"> Tous les chapitres</a></li>
                            <li><a href="index.php?action=adminAddArticle"> Ajouter un chapitre</a></li>
                        </ul>
                    <li><a class="navbar-brand" href="index.php?action=adminComments"> Commentaires</a></li>
                </ul>
            </div>
        </nav> 


        <h2>Les articles signalés, à modérer</h2>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N°commentaire</th>
                    <th scope="col">Chapitre concerné</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Modération</th>
                </tr>
            </thead>

            <tbody>
                
        <?php

        foreach ($comments as $comment)
        {
            if (!$comment['alert']== 0)
            {
        ?>
                <tr>  
                    <td scope="row"><?php echo htmlspecialchars($comment['id']);?></td>
                    <td><?php echo htmlspecialchars($comment['article_id']);?></td>
                    <td><?php echo htmlspecialchars($comment['comment']);?></td>
                    <td><a href="#"><button>Modérer</button></a>

                </tr>
        <?php
            }
        }
        ?>
                
            </tbody>
        </table>

        <h2>Tous Les articles</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N°commentaire</th>
                    <th scope="col">Chapitre concerné</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Date</th>
                    <th scope="col">Modération</th>
                </tr>
            </thead>

            <tbody>
                
                <?php
                foreach ($comments as $comment)
                {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['id']);?></td>
                    <td><?php echo htmlspecialchars($comment['article_id']);?></td>
                    <td><?php echo htmlspecialchars($comment['author']);?></td>
                    <td><?php echo htmlspecialchars($comment['comment']);?></td>
                    <td><?php echo htmlspecialchars($comment['comment_date_fr']);?></td>
                    <td><a href="#"><button>Modérer</button></a>
                </tr>
                <?php
                }
                ?>
                
            </tbody>
        </table>
        

        <h2>Articles modérés</h2>

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
                    if ($comment['moderation_status'] == 1)
                    {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['id']);?></td>
                    <td><?php echo htmlspecialchars($comment['article_id']);?></td>
                    <td><?php echo htmlspecialchars($comment['author']);?></td>
                    <td><?php echo htmlspecialchars($comment['comment']);?></td>
                    <td><?php echo htmlspecialchars($comment['comment_date_fr']);?></td>
                    
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </body>

    <footer>
        <a href="index.php?action=deconnexion"><button>Déconnexion</button></a>

    </footer>
</html>