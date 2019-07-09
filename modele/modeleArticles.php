<?php
include 'htacess/appelBDD.php';
class articles extends appelBDD{//on hérite du modèle qui se connecte la bdd
    
    
        public function pageAccueil(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet
            $rep = $bdd->prepare('SELECT * FROM `articles` WHERE brouillon = 0 ORDER BY date DESC LIMIT 2');
            $rep->execute();
            return $rep;
        }
    
            
        public function listeBillet(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet
            $rep = $bdd->prepare('SELECT * FROM articles WHERE brouillon = 0');
            $rep->execute();
            return $rep;
        }
    
    
        public function billet($id_article){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet
            $req = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
            $req->execute(array($id_article));
            return $req;
        }
    
        public function afficheBrouillon(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet
            $req = $bdd->prepare('SELECT * FROM articles WHERE brouillon = 1');
            $req->execute();
            return $req;
        }
    
        public function affichageProposition(){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            // Récupération du billet
            $rep = $bdd->prepare('SELECT * FROM idee_article');
            $rep->execute();
            return $rep;
        }
    
        public function supprimerIdee($article_id){
            $bdd = $this->dbConnect(); //appel la fonction de connexion a la bdd                       
            $reponse = $bdd->prepare('DELETE FROM `idee_article` WHERE id = ?');//On supprime
            $reponse->execute(array($article_id));
            return $reponse;
        }

        public function ajoutCommentaire($article_id,$pseudo,$commentaire){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            //On insere dans la base de données le pseudo poster et le commentaire dans le table commentaires
            $reponse = $bdd->prepare('INSERT INTO commentaire(pseudo, commentaire, id_article) VALUES(:pseudo, :commentaire, :id_article)');
            $reponse->execute(array(
                'id_article' => $article_id,
                'pseudo' => $pseudo,
                'commentaire' => $commentaire
            ));
            return $reponse; 
        } 
    
    
        public function dernierJeux(){ 
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            $reponse = $bdd->prepare('select * from articles where id >= all ( select id from articles order by id desc )'); 
            $reponse->execute();
            return $reponse;
        }
    
    
        public function nouveauArticle($photo,$titre,$date,$materiel,$joueurs,$temps,$formulaire, $brouillon){
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            $photo;        
            $insertion = $bdd->prepare('INSERT INTO articles(titre, date, matériel, nbx_joueurs, temps_jeux, message, photo, brouillon) VALUES (:titre, :date, :materiel, :joueurs, :temps, :formulaire, :photo, :brouillon)');
            $insertion->execute(array(
                'titre' => $titre,
                'date' => $date,
                'materiel' => $materiel,
                'joueurs' => $joueurs,
                'temps' => $temps,
                'formulaire' => $formulaire,
                'photo' => $photo,
                'brouillon' => $brouillon
            ));
        }
    
    
        public function modifierArticle($id_article, $titre, $date, $materiel, $joueurs , $temps , $message){
            $titre;
            $date;
            $materiel;
            $joueurs;
            $temps;
            $message;
            $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
            $reponse = $bdd->prepare("UPDATE `articles` SET `titre`= '" . $titre . "' , `date`= '" . $date . "' , `matériel`= '" . $materiel . "' , `nbx_joueurs`= '" . $joueurs . "' , `temps_jeux`= '" . $temps . "' , `message`= '" . $message . "' WHERE id = ?");//On modifie
            $reponse->execute(array($id_article));
            return $reponse;
        }
    
    
        public function supprimerArticle($article_id){
            $bdd = $this->dbConnect(); //appel la fonction de connexion a la bdd                       
            $reponse = $bdd->prepare('DELETE FROM `articles` WHERE id = ?');//On supprime
            $reponse->execute(array($article_id));
            return $reponse;
        }

}