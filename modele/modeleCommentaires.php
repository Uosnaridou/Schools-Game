<?php
include 'htacess/appelBDD.php';
class commentaires extends appelBDD{//on hérite du modèle qui se connecte la bdd
    
        public function commentaireSignaler(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            //On selectionne tout les commentaires qui ont recus 5 ou plus de signalement
            $reponse = $bdd->prepare("SELECT id, pseudo, commentaire, signalement FROM commentaire WHERE signalement >= '5'");
            $reponse->execute();
            return $reponse;
        }
    
        public function supprimerCommentaire($article_id){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            $reponse = $bdd->prepare('DELETE FROM `commentaire` WHERE id = ?');//Supprime les commentaires
            $reponse->execute(array($article_id));
            return $reponse;  
        }


        public function afficheCommentaire($article_id){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            //On selectionne tout les commentaires qui ont recus 5 ou plus de signalement
            $reponse = $bdd->prepare("SELECT * FROM commentaire WHERE id_article = ? AND signalement <= '5'");
            $reponse->execute(array($article_id));
            return $reponse;
        }
    

        public function ajoutSignalement($id_commentaire){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            //On rajoute 1 au signalemement
            $reponse = $bdd->prepare('UPDATE `commentaire` SET `signalement` = signalement + 1 WHERE id = ?');
            $reponse->execute(array($id_commentaire));
            return $reponse;
        }
    
        public function restaurerSignalement($id_commentaire){
            $bdd = $this->dbConnect();
            $reponse = $bdd->prepare('UPDATE `commentaire` SET `signalement` = 0 WHERE id = ?');
            $reponse->execute(array($id_commentaire));
            return $reponse;
        }
    
}