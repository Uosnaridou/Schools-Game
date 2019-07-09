<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="img/png" href="img/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School's Games</title>
</head>

<?php require 'includes/header.php'; ?>


<body>
    <div id="connexion">
        <h2>Se connecter</h2>
        <!-- Formulaire de connexion -->
        <form action="" method="POST" id="form">
            
            <label for="">Pseudo ou email : &nbsp;</label>

            <input type="text" name="pseudo" id="champPseudo" value="<?php if (isset($_COOKIE['pseudo'])){ echo $_COOKIE['pseudo']; }?>" required/><br>
    
            <label for="">Mot de passe : &nbsp;</label>
            <input type="password" name="password" id="champPseudo" required/><br>
            
            <label>Se souvenir de moi ?</label>
            <input type="checkbox" name="souvenir" id="souvenir"/>
            
            <a href="index.php?u=oublie">Mot de passe oublié ?</a>

            <button type="submit" id="bouttonConnecter">Connexion</button>

        </form>
    </div>
    
<?php require 'includes/footer.php'; ?>
    </body>
</html>
