<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School's Games</title>

</head>


                                
<body>
<?php require 'includes/header.php'; ?>

    
        <a href="index.php">Retour à la liste des articles</a>

    <?php

//On affiche les données de l'articles qui etaient enregistrée dans la bdd
while ($donnees = $req->fetch())
{
?>
<div id="articles">
    <?php $id = $donnees['id'];?>
   <p id='id' style="display:none"> <?php echo $donnees['id']?><p>

    <h3>
        <?php  echo htmlspecialchars($donnees['titre']);?>
    </h3>
    <p>Date:
        <?php $date = $donnees['date'];
                echo date('d-m-Y', strtotime($date));
                ?>
    </p>
    <?php echo '<img src="img/' . $donnees['photo'] . '" id="photo"/>'?>
    <p>Matériel :
        <?php echo $donnees['matériel']?>
    </p>
    <p>Explication :
        <?php echo nl2br(htmlspecialchars($donnees['message']));?>
    </p>

    </div>
    <?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>

        <div id="espaceCommentaire">
        <h2>Espace commentaire</h2>
        <?php
          //On crée un formulaire pour pouvoir poster un commentaires sous l'articles SEULEMENT si la personne est connecter au site
         if(isset ($_SESSION['pseudo']) && isset($_SESSION['password'])){
            
            echo '<form method="post" action="" id="form" >';
            echo 'Pseudo : ' . '<input type="text" name="pseudo" id="champPseudo" value="' . $_SESSION['pseudo'] . '" required />';
             echo 'Message : ' .'<textarea name="messages" id="messages" required="required"></textarea>' . '<br />';
            echo '<input type="submit" id="submit"/>';
            echo '</form>';
    }else{
             echo '<p>' . 'Vous devez être connecté pour poster un commentaire' . '</p>'; //message d'information pour avertir qu'il faut etre connecter pour pouvoir poster un commentaire
         }
?>

    </div>
    
    <div id="affichageCommentaires">
    
    
    </div>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/ajax.js"></script>
</body>
<?php require 'includes/footer.php'; ?>
</html>
