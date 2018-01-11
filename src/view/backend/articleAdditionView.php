

<!DOCTYPE html>
<html>

    <head>
        
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

        <?php require ('src/view/templates/_navAdmin.php'); ?>   

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                
                    <h1 class="page-header">Nouveau chapitre</h1>

                    <div class="row placeholders"></div>

                    <div class="table-responsive">

                        <form method="post" action="index.php?action=additionArticle"> 

                            <p><input class="textarea" type="text" name="number" placeholder="N° de chapitre"></p>
                            <p><input class="textarea" type="text" name="title" placeholder="Titre"></p>
                            <p><textarea id="textarea" name="content" ></textarea></p>
                            <p><input type="submit" name="addition" value="Valider"></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>     
</body>

</html>