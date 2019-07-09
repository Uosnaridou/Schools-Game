<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Tiny MCE</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="img/png" href="img/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="test TinyMCE" />
    <title>School's Games</title>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=pplpfrfm3q8bgegvqny4d9k3n28ui70j60zslovmiwedvgvz"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode: "textareas",
            forced_root_block: false,
            force_br_newlines: true,
            force_p_newlines: false
        });

    </script>
</head>

<?php require 'includes/header.php'; ?>

<body>
    <!--Formulaire pour modifier un article -->
    <div id="rebord">
        <h2>Modifier un article</h2>
    </div>
    <img src="img/modifier.png" id="logoModifier" />

    <?php
        while ($donnees = $rep->fetch())
		{
    ?>

    <form method="post" name="Editer" id="formNvx" action="">

        <div id="champ">
            <!-- On reafiche les informations de l'article dans le formulaire -->
            <label> Titre: </label>
            <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($donnees['titre'])?>" required/><br />

            <label>Date:</label>
            <input type="date" name="date" id="titre" value="<?php echo  htmlspecialchars($donnees['date'])?>" required/><br />
            
            <label>Matériel:</label>
            <input type="text" name="materiel" id="matos" value="<?php echo htmlspecialchars($donnees['matériel'])?>" required/><br />

            <div id="choixCategorie">
                <!--Pour selectionner la catégorie de l'article -->
                <div id="joueurs">
                    <label for="categorie">Nombres de joueurs</label>
                    <select name="joueurs" id="categorie">
                        <option value="0">Jeux tout seul</option>
                        <option value="1">Jeux a deux</option>
                        <option value="2">Jeux a plus de deux</option>
                    </select>
                </div>

                <div id="temps">
                    <label for="categorie">Temps du jeux</label>
                    <select name="temps" id="categorie">
                        <option value="1">Jeux 1h ou moins</option>
                        <option value="2">Jeux 1h ou plus</option>
                    </select>
                </div>
            </div>

        </div>

        <div id='tinymce'>
            <!--On recupere le message et on le met dans le champ du pluging tinycme-->
            <textarea name="message"><?php echo htmlspecialchars($donnees['message'])?></textarea><br /><br />

        </div>


        <div id="twoButton">
            <input name="Submit" type="submit" value="Enregistré" id="envoyez" />&nbsp;
            <a href="index.php?u=admin" id="retour">Retour</a>
        </div>

    </form>

    <?php
		}
        $rep->closeCursor();
	?>
<?php require 'includes/footer.php'; ?>
    </body>
</html>