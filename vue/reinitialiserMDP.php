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
    <div id="reinitialiserMDP">
        <h2>Mot de passe oublié</h2>
        <!-- Formulaire de connexion -->
        <form action="" method="POST" id="form">
            
            <label for="">Email : &nbsp;</label>
            <input type="email" name="emailReset" placeholder="Entrez votre email" id="emailReset" required/><br>
    
            <button type="submit" id="bouttonConnecter">Valider</button>

        </form>
    </div>
    
<?php require 'includes/footer.php'; ?>
    </body>
</html>
