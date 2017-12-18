<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion Administration</title>
	 <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
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