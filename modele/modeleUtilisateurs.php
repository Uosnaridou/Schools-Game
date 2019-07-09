<?php
include 'htacess/appelBDD.php';
class admin extends appelBDD{//on hérite du modèle qui se connecte la bdd
    

            
            public function inscription($pseudo,$pass_hache,$email){
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $req = $bdd->prepare('INSERT INTO users(pseudo, password, email, date) VALUES(:pseudo, :pass, :email, CURDATE())');//On insert dans la bdd
                $req->execute(array(
                    'pseudo' => $pseudo,
                    'pass' => $pass_hache,
                    'email' => $email
                ));
            }
            
            
            public function connexion($pseudo,$email){
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $pseudo;
                $reponse = $bdd->prepare('SELECT id, password FROM users WHERE pseudo = :pseudo OR email = :email');//On selectionne
                $reponse->execute(array(
                    'pseudo' => $pseudo,
                    'email' => $email
                ));
                return $reponse;     
            }
    
            public function proposition($titre,$materiel,$message){
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $req = $bdd->prepare('INSERT INTO idee_article(titre, materiel, message) VALUES(:titre, :materiel, :message)');//On insert dans la bdd
                $req->execute(array(
                    'titre' => $titre,
                    'materiel' => $materiel,
                    'message' => $message
                ));
            }
            
            public function reinitialiserMdp($email){
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $email;
                $reponse = $bdd->prepare('SELECT * FROM users WHERE email = :email');//On selectionne
                $reponse->execute(array(
                    'email' => $email
                ));
                return $reponse;     
            }
    
            public function recup(){
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $reponse = $bdd->prepare('SELECT * FROM users');//On selectionne
                $reponse->execute();
                return $reponse;
            }
    
    
            public function modif_mdp($id_users,$modif_mdp,$confirm_mdp,$modif_hache){
                $modif_mdp;
                $confirm_mdp;
                $modif_hache;
                $bdd = $this->dbConnect();//appel la fonction de connexion a la bdd
                $reponse = $bdd->prepare("UPDATE `users` SET `password`= '" . $modif_hache  . "' WHERE `id`= ?");//On modifie 
                $reponse->execute(array($id_users));
                return $reponse;
            }
    
}