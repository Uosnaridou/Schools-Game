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
    <!--Page d'accueil-->
    <?php require 'includes/header.php'; ?>

    <div id="rebord">
        <h2>Liste des idées de jeux</h2>
    </div>
    <img src="img/liste1.png" id="logoListe" />

    <?php
//On affiche l'article
while ($donnees = $rep->fetch())
{
?>
    <div id="idee_article">

        <h3>
            <?php  echo htmlspecialchars($donnees['titre']);?>
        </h3>

        <p>Matériel :
            <?php echo htmlspecialchars($donnees['materiel'])?>
        </p>

        <p>Explication :
            <?php echo nl2br(htmlspecialchars($donnees['message']));?>
        </p>

        <a href="index.php?a=supp_idee&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Supprimer</a>
        <!--lien pour supprimer -->

    </div>
    <?php
        } // Fin de la boucle des commentaires
        $rep->closeCursor();
    ?>

    <a href="index.php?u=admin" id="back">Retour</a>

    <?php require 'includes/footer.php'; ?>
</body>

</html>
