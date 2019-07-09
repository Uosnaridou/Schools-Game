<?php
while ($donnees = $reponse->fetch())
{ //On affiche les commentaire
?>
    <div id="lesCommentaires">
        <p><strong>
            <?php echo htmlspecialchars($donnees['pseudo']); ?></strong></p>
        <p>
            <?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
            <a href="index.php?c=ajoutSignalement&commentaire=<?php echo htmlspecialchars($donnees['id']); ?>"><!-- Lien pour signaler un commentaire-->
            <img src="img/signaler.png" id="signalement" />
            </a> </p>
        <div id="rebordComments">
        </div>
    </div>
<?php
} // Fin de la boucle des commentaires
$reponse->closeCursor();
?>