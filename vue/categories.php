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
    <div id="rebord">
    </div>
    <br />
    <img src="img/fleche.gif" id="fleche">

    <?php    
        //On affiche l'article
		while ($donnees = $reponse -> fetch()) 
		{
    ?>
    
    <div class="articles">

        <h3>
            <?php  echo htmlspecialchars($donnees['titre']);?>
        </h3>
        
        <p>Date:
            <?php echo htmlspecialchars($donnees['date'])?>
        </p>
        
        <?php echo '<img src="img/' . htmlspecialchars($donnees['photo']) . '" alt="image jeu" class="photo"/>'?>
        
        <p>Explication:
            <?php echo nl2br(htmlspecialchars($donnees['message']));?>...</p>
        <em class="lien"><a href="index.php?a=billet&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Lire la suite</a></em>
        <br /><br /><br /><br /><br />

    </div>

    <?php
		}
    ?>
<?php require 'includes/footer.php'; ?>
    </body>
</html>