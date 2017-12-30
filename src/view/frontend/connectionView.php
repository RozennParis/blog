<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion Administration</title>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
        <!--<link href="src/public/css/dashboard.css" rel="stylesheet" />-->
        <link href="src/public/css/gsdk.css"/ rel="stylesheet">
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/gsdk.css"/ rel="stylesheet">
        <link href="src/public/get-shit-done-1.4.1/get-shit-done-1.4.1/assets/css/demo.css" rel="stylesheet" /> 
        
        <!--     Font Awesome     -->
        <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

        <link href="src/public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>
        <div class="row">
            <h1>Connexion</h1>


            <form method="post" action="index.php?action=connection">

                <p><label for="pseudo">Pseudo </label> <input type="text" name="pseudo" required></p>
                <p><label for="password">Mot de passe </label><input type="password" name="password" required></p>
               
                <p><input type="submit" value="Envoyer"></p>

            </form>
        </div>
</body>
</html>