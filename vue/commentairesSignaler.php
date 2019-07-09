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
    <!--Page qui affiche les commentaires signaler-->
    <div id="rebord">
        <h2>Commentaires signalés</h2>
    </div>
    <img src="img/logoSignaler.png" id="cadenas">

    <?php
      while ($donnees = $reponse -> fetch()) 
		{
    ?>


    <div id="messageSignaler">
        <h6>
            <?php  echo htmlspecialchars($donnees['pseudo']);?>
        </h6>

        <p>
            Message :
            <?php echo nl2br(htmlspecialchars($donnees['commentaire']));?><br />
            Nombre de fois signalé :
            <?php echo htmlspecialchars($donnees['signalement'])?>
        </p>

        <!-- Pour pouvoir supprimer le commentaire -->
        <a href="index.php?c=supprimerSignalement&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Supprimer</a>
        <a href="index.php?c=restaurer&commentaire=<?php echo htmlspecialchars($donnees['id']); ?>">Restaurer</a>
    </div>

    <?php
		}
            $reponse->closeCursor();
    ?>

    <a href="index.php?u=admin" id="back">Retour</a>

<?php require 'includes/footer.php'; ?>
    </body>
</html>