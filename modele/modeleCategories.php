<?php 
include 'htacess/appelBDD.php';
class modeleCategories extends appelBDD{//on hérite du modèle qui se connecte la bdd
    

        public function categorie0(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            //Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT id, titre, date, photo, matériel, message FROM articles WHERE nbx_joueurs = 0 & brouillon = 0');
            $reponse->execute();
            return $reponse;
        }
    
    
        public function categorie1(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT id, titre, date, photo, matériel, message FROM articles WHERE nbx_joueurs = 1 & brouillon = 0');
            $reponse->execute();
            return $reponse;
        }
    
            
        public function categorie2(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT id, titre, date, photo, matériel, message FROM articles WHERE nbx_joueurs = 2 & brouillon = 0');
            $reponse->execute();
            return $reponse;
        }
    
    
        public function categorie3(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT id, titre, date, photo, matériel, message FROM articles WHERE temps_jeux = 1 & brouillon = 0');
            $reponse->execute();
            return $reponse;
        }
    
    
        public function categorie4(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT id, titre, date, photo, matériel, message FROM articles WHERE temps_jeux = 2 & brouillon = 0');
            $reponse->execute();
            return $reponse;
        }
    
    
        public function tout(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet avec un requete préparé
            $reponse = $bdd->prepare('SELECT * FROM articles');
            $reponse->execute();
            return $reponse;
        }  
    
        
}