<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="img/png" href="img/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School's Games</title>

</head>

<body>
    <?php require 'includes/header.php' ?>

     <h2>Nouveau mot de passe</h2>

    <div id="nouveauMDP">
        <form action="" method="post">
            
            <label for="">Nouveau mot de passe</label><br />
            <input type="password" name="modif_mdp" placeholder="Changer de mot de passe" id="mdp" required/><br /><br />

            <label for="">Confirmation du nouveau mot de passe</label><br />
            <input type="password" name="confirm_mdp" placeholder="Confirmation du mot de passe" id='mdp_confirm' required/><br /><br />
        
            <input type="submit" name="submit" id="bouttonContact" value="Envoyer"/>
        </form>
    </div>

<?php require 'includes/footer.php'; ?>
    </body>
</html>
