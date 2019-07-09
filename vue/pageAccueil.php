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
    <div id="slides"><!--Slider-->
        <ul>
            <li class="slide showing">
                <img src="img/banniere.png" alt="slider 1" id="img1" class="img" />
            </li>
            <li class="slide">
                <img src="img/carte.png" alt="slider 2" id="img2" class="img" />
            </li>
            <li class="slide">
                <img src="img/manette.png" alt="slider 3" id="img3" class="img" />
            </li>
        </ul>
    </div>

    <h2>Derniers articles publiés</h2>
    <div id="regroup">
        <div id="listeArticles">
            <!-- On affiche les deux dernier articles de la bdd-->
            <?php 
                while ($donnees = $rep -> fetch()) 
		      {
            ?>
            <div class="articles">
                <h3>
                    <?php  echo htmlspecialchars($donnees['titre']);?>
                </h3>
                <?php echo '<img src="img/' . htmlspecialchars($donnees['photo']) . '" alt="image jeu" class="photo"/>'?>
                <p>Date:
                    <?php $date = htmlspecialchars($donnees['date']);
                echo date('d-m-Y', strtotime($date));
                    ?>
                </p>
                <p>Explication:
                    <?php  echo htmlspecialchars($donnees['message']);?>
                </p>
                <em class="lien"><a href="index.php?a=billet&articles=<?php echo htmlspecialchars($donnees['id']); ?>">Lire la suite</a></em>

                <br /><br /><br /><br /><br />

            </div>
            <?php
		  }
        ?>
        </div>
        <section>
            <!--lien vers la page a propo-->
            <div id="popular">
                <h4>À propos</h4>
                <a href="index.php?a=propo">

                    <div id="preview">
                        <p>School's Games</p>
                    </div>
                </a>
            </div>

            <!--Lien vers la page dernier article publié-->
            <div id="last">
                <h4>Dernier jeu publié</h4>
                <?php    
        	while ($donnees = $reponse -> fetch()) 
		{
            ?>
                <a href="index.php?a=billet&articles=<?php echo htmlspecialchars($donnees['id']); ?>">
                    <div id="previewArticle">
                        <!--On affiche seulement le titre et la photo du dernier article-->
                        <h5>
                            <?php  echo htmlspecialchars($donnees['titre']);?>
                        </h5>

                        <?php echo '<img src="img/' . htmlspecialchars($donnees['photo']) . '" alt="image jeu" id="previewPhoto"/>'?>

                    </div>
                </a>
                <?php } ?>
            </div>
        </section>
    </div>
<?php require 'includes/footer.php'; ?>
    <script src="js/slider.js"></script>
</body>
</html>
