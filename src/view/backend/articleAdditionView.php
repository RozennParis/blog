<!DOCTYPE html>
<html>

<head>
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


        <h1>Nouveau chapitre</h1>
       

        <form method="post" action="index.php?action=additionArticle"> <!-- attention, adresse à modifier par la suite-->

            <p><input class="textarea" type="text" name="title" placeholder="Titre" required></p>
            <p><textarea id="textarea" name="content" required></textarea></p>
            <p><input type="submit" value="Valider"></p>

        </form>
    </div>       
</body>

</html>