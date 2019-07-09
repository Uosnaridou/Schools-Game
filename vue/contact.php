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

     <h2>Formulaire de contact</h2>

    <div id="NousContacter">
        <form action="" method="post">
            
            <label>Nom: (Obligatoire)</label>
             <input type="text" name="name" size="30" maxlength="60" value="" required/><br><br>
            <label>Adresse Email: (Obligatoire)</label>
            <input type="email" name="email" size="30" maxlength="80" value="" required/><br><br>
            <label>Sujet: (Obligatoire)</label>
             <input type="text" name="sujet" size="30" maxlength="80" value="" required/><br><br>
            <label>Message: (Obligatoire)</label>
            <textarea name="comments"></textarea><br><br>
        
            <input type='checkbox' name='case' value='on' required>
            En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées dans le but de communiquer occasionnellement les lettres d'informations de School's Games.<br><br>

            <input type="submit" name="submit" id="bouttonContact" value="Envoyer"/>
        </form>
    </div>

<?php require 'includes/footer.php'; ?>
    </body>
</html>
