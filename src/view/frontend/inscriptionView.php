<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>Connexion Administration</title>

        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/gsdk.css" rel="stylesheet"/> 
        <link href="src/public/css/style.css" rel="stylesheet" /> 

          <!--     Font Awesome     -->
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

    </head>
        
    <body>
            
            <header class="container-fluid header-other-pages"> 

                <?php require ('src/view/templates/_nav.php'); ?>  

                
                <div>
                    <h1>Inscription</h1>
                </div>
            </header>

            <main class="container-fluid" >
                            
                <div class="row">
                    <div class="col-xs-12 subdivision">
                        <h3>C'est par ici que ça se passe</h3>
                    </div>
                </div>


                <div class="row connection" id="connection">

                    <form class="col-xs-10 col-xs-push-1 comment-form" method="post" action="index.php?action=inscription">

                        <div class="form-group">
                            <label for="login">Identifiant </label><br/>
                            <input type="text" name="login" id="login" required>
                        </div>
                              
                        <div class="form-group">
                            <label for="pass">Mot de passe </label><br/>
                            <input type="password" name="pass" id="password" required>
                        </div>

                        <div class="form-group">
                            <label for="passBis">Répétez votre mot de passe </label><br/>
                            <input type="password" name="passBis" id="passwordBis" required>
                        </div>

                        <div>
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                        
                </div>  
            </main>
           
            <?php require ('src/view/templates/_footer.php'); ?> 
        

        

        