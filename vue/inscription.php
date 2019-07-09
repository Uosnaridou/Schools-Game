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
    <?php require 'includes/header.php'; ?>

    <div id="choixInscription">
        <!-- Formulaire d'inscription -->
        <div id="inscription">
            <h2>S'inscrire</h2>
            <form action="" method="POST">

                <label for="">Pseudo : &nbsp;</label>
                <input type="text" name="pseudo" id="champPseudo" required/><br><br>

                <label for="">Email : &nbsp;</label>
                <input type="email" name="email" id="champPseudo" required/><br><br>

                <label for="">Mot de passe : &nbsp;</label>
                <input type="password" name="pass" id="champPseudo" required/><br><br>

                <label for="">Confirmer le mot de passe : &nbsp;</label>
                <input type="password" name="pass_confirm" id="champPseudo" required/><br><br>
                
                <input type='checkbox' name='case' value='on' required>
                En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées dans le but de communiquer occasionnellement les lettres d'informations de School's Games.<br><br>

                <button type="submit" id="bouttonInscription">Valider</button>

            </form>
            
            
        </div>
    </div>
<?php require 'includes/footer.php'; ?>
    </body>
</html>
