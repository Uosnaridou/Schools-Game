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
    <!--Liste des articles existant-->
    <div id="rebord">
        <h2>Liste des articles</h2>
    </div>
    <img src="img/liste1.png" id="logoListe" />

    <?php
        while ($donnees = $reponse->fetch()){
    ?>
    <div id="lesJeux">
        <?php  echo htmlspecialchars($donnees['titre']); // On affiche le titre des articles ?>
        <a href="index.php?a=modif&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Modifier</a><!--lien pour modifier -->
        <a href="index.php?a=supp&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Supprimer</a><!--lien pour supprimer -->
    </div>

    <?php
		}
        $reponse->closeCursor();
	?>

    <a href="index.php?u=admin" id="back">Retour</a>

<?php require 'includes/footer.php'; ?>
    </body>
</html>