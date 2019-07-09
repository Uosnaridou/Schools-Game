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
    <!--Page d'un compte utilisateur-->
    <div id="rebord">
        <h2>Mon compte</h2>
    </div>

    <img src="img/connexion.png" id="cadenas" />
    <?php if(isset ($_SESSION['pseudo']) && isset($_SESSION['password'])){?>
    <p>Bonjour
        <?php echo $_SESSION['pseudo'] ?>
    </p>
    <?php } ?>

    <div id='compte'>

        <!-- Petit formulaire pour pouvoir changer de mot de passe -->
        <div id='change_mdp'>
            <p>Changement de mot de passe</p>
            <form action="" method="post">

                <label for="">Nouveau mot de passe</label><br />
                <input type="password" name="modif_mdp" placeholder="Changer de mot de passe" class="mdp" required /><br /><br />

                <label for="">Confirmation du nouveau mot de passe</label><br />
                <input type="password" name="confirm_mdp" placeholder="Confirmation du mot de passe" class='mdp_confirm' required /><br /><br />

                <input name="valider" type="submit" value="Valider" class="valider" />&nbsp;
            </form>
        </div>

        <div id="proposition">
            <p>Vous pouvez proposer des idées de jeux ici</p>
            <form method="post" action="" id="form_idee" enctype="multipart/form-data">

                <label>Titre de l'article</label>
                <input type="text" name="idee_titre" placeholder="Titre" id="titre" required /><br /><br />


                <label>Matériel</label>
                <input type="text" style="height: 2em;" name="idee_materiel" placeholder="Matériel" id="stuff" required /><br /><br />

                <label>Message</label>
                <textarea name="idee_message" id='textaera_idee'></textarea><br /><br />

                <input name="valider_idee" type="submit" value="Valider" class="valider" />&nbsp;

            </form>
        </div>
    </div>
    <?php require 'includes/footer.php'; ?>
</body>

</html>
