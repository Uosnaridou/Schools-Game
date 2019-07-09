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
    <!--Page de création d'un article-->
    <div id="rebord">
        <h2>Créer un nouvel article</h2>
    </div>

    <!--Formulaire -->
    <form method="post" action="" id="formNvx" enctype="multipart/form-data">
        <div id="champ">

            <label>Titre de l'article</label>
            <input type="text" name="titre" placeholder="Titre" id="titre" required /><br />

            <label>Date</label>
            <input type="date" name="date" placeholder="Date" id="date" required /><br>

            <label for="photo">Image</label>
            <input type="file" id="selectImg" name="photo" required /><br />

            <label>Matériel</label>
            <input type="text" style="height: 5em;" name="materiel" placeholder="Matériel" id="stuff" required/><br />

            <div id="choixCategorie">
                <!--Pour selectionner dans quel categorie seras cette article -->
                <div id="joueurs">
                    <label for="categorie">Nombres de joueurs</label>
                    <select name="joueurs" id="categorie">
                        <option value="0">Jeu tout seul</option>
                        <option value="1">Jeu à deux</option>
                        <option value="2">Jeu à plus de deux</option>
                    </select>
                </div>

                <div id="temps">
                    <label for="categorie">Temps de jeu</label><br />
                    <select name="temps" id="categorie">
                        <option value="1">Jeu 1h ou moins</option>
                        <option value="2">Jeu 1h ou plus</option>
                    </select>
                </div>
            </div>
        </div>

        <div id='tinymce'>
            <!-- Petit pluging Tinymce pour le champ "message" du formalaire -->
            <textarea name="formulaire" id='tinymce'></textarea>
        </div>

        <div id="twoButton">
            <input name="enregistre" type="submit" value="Enregistrer" id="envoyez" />&nbsp;
          <input name="brouillon" type="submit" value="brouillon" id="envoyez" />&nbsp;
            <a href="index.php?u=admin" id="retour">Retour</a>
        </div>

    </form>

<?php require 'includes/footer.php'; ?>
    </body>
</html>