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
    <!--Page de l'administrateur-->
    <div id="rebord">
        <h2>Espace administrateur</h2>
    </div>

    <img src="img/cadenas.png" id="cadenas" />

    <div id="regroupChoice">

        <div id="nvx">
            <!-- lien pour crée un nouvel article -->
            <a href="index.php?a=nouveauArticle">Nouvel article</a>
        </div><br />

        <div id="modifier">
            <!-- lien pour modifier ou supprimer un article -->
            <a href="index.php?a=listeArticles">Modifier ou supprimer un article</a>
        </div><br />

        <div id="brouillon">
            <!-- lien pour afficher les articles enregistré en brouillons -->
            <a href="index.php?a=listeBrouillon">Voir vos brouillons</a>
        </div><br />

        <div id="liste_proposition">
            <!-- lien pour afficher les idées de jeux des utilisateurs -->
            <a href="index.php?a=proposition">Voir les propositions des utilisateurs</a>
        </div><br />

        <div id="signaler">
            <!-- lien pour voir les commentaire qui ont etaient signaler -->
            <a href="index.php?c=commentaireSignaler">Commentaires signalés</a>
        </div>

    </div><br />

    <?php require 'includes/footer.php'; ?>
</body>

</html>
