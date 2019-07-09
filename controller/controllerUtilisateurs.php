<?php
class controllerAdmin{
    
        public function inscription(){
            require 'modele/modeleUtilisateurs.php';
            $inscrit = new admin();
            
            if ($_POST) {
                if(!empty($_POST['case'])){
                    //On vérifie que les champs du formulaire ont bien etaient posté
                    if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass_confirm'])){
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $email = htmlspecialchars($_POST['email']);
                        $reponse = $inscrit->connexion($pseudo,$email);//vérifie qu'il n'existe pas deja un compte avec ce pseudo ou cette email
                        $resultat = $reponse->fetch();
                        if ($resultat){
                            echo 'Il existe deja un compte avec ce pseudo ou cette email';
                        }else{ 
                            $email = htmlspecialchars($_POST['email']);//On récupère l'email
                            $email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);//On crée un chaîne de caractère pour vérifié le format de l'email
                            if($email_check != 1){//Si le format n'est pas bon on affiche un message
                            echo "<p>Merci d'entrer une email valide.</p>";
                            }else{//si le format est bon
                            //On récupère le mot de passe et la confirmation du mot de passe
                                $pass = $_POST['pass'];
                                $pass_confirm = $_POST['pass_confirm'];
                                if ( $pass == $pass_confirm ){//Si les deux sont les même 
                                    $pseudo = htmlspecialchars($_POST['pseudo']);
                                    $email = htmlspecialchars($_POST['email']);    
                                    $pass_hache = password_hash($pass, PASSWORD_DEFAULT);//On hache le mot de passe
                                    $req = $inscrit->inscription($pseudo,$pass_hache,$email);
                                    header ('location: index.php?u=connexion');//Redirige vers la vue de connexion
                                }else{
                                    echo 'Les mots de passe ne correspondent pas !';//Sinon on indique que les mot de passe ne corresponde pas
                                }
                            } 
                        }
                    }
                }else{
                   echo 'Vous devez accepter les termes et conditions';
                }
            }
            require 'vue/inscription.php';//Si aucun champs n'a été poster on affiche la vue d'inscription
        }
    
    
        public function connexion(){
            require 'modele/modeleUtilisateurs.php';
            $connecte = new admin();
            if($_POST){//On vérifie que les informations on etaient posté        
                if (isset($_POST['pseudo'])){//Si le champ pseudo a été posté
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $email = htmlspecialchars($_POST['pseudo']);
                }
                
                $reponse = $connecte->connexion($pseudo,$email);
                $resultat = $reponse->fetch();
                $pwd_valide = $resultat['password'];//On récupère le mdp de la base de donnée  
                $isPasswordCorrect = password_verify(htmlspecialchars($_POST['password']), $pwd_valide);//On vérifie si le mdp de la bdd et le mdp posté correspondent
                if (!$resultat){//Si les pseudo ne sont pas pareil
                    echo 'Mauvais identifiant!';
                }else{//Si les pseudo sont pareil
                    if ($isPasswordCorrect) {//Si les deux mots de passe correspondent
                        $_SESSION['id'] = $resultat['id'];//crée des sessions
                        $_SESSION['pseudo'] = $pseudo;
                        if (isset($_POST['souvenir'])){
                            $expire = time() + 365*24*3600;
                            setcookie('pseudo', $_SESSION['pseudo'], $expire); 
                        }
                        $_SESSION['password'] = htmlspecialchars($_POST['password']);
                        $user_id = $_SESSION['id'];
                        if($user_id == 1){//Si l'utilisateur possède l'id 1 dans la bdd (id de l'administrateur)
                            header ('location: index.php?u=admin');//Redirige vue de l'administrateur
                        }else{
                            header ('location: index.php?u=compte&users=' . $resultat['id']. ''); //Sinon on redirige vue d'un utilisateur
                        }
                    }else {//si rien ne correspond
                        echo 'Mauvais mot de passe !';
                    }
                }
            } 
            require 'vue/connexion.php';//Si aucun champs n'a été poster on require la vue de connexion
        }
    
        public function mdpOublier(){
            require 'modele/modeleUtilisateurs.php';
            $mdp = new admin();
            if($_POST){//Si les champs ont étaient posté
                if (isset($_POST['emailReset'])){//Si l'email à etais posté
                    $email = htmlspecialchars($_POST['emailReset']);//récupère l'email
                    $reponse = $mdp->reinitialiserMdp($email);//j'appel ma fonction
                    $resultat = $reponse->fetch();
                    $id_u = $resultat['id'];//Récupère l'id de l'utilisateur
                    $destinataire = $_POST['emailReset'];
                    $sujet = 'Réinitiliser le mot de passe';
                    $body = "Pour réinitialiser votre mot de passe, cliquez sur ce lien: http://schoolsgames.allanfulkerson.fr/index.php?u=nouveauMdp&users=" . $id_u . "";
                    $header = "From: {$_POST['emailReset']}";
                    mail( $destinataire, $sujet , $body, $header );//Fonction mail
                    echo 'Votre mail a bien été envoyez';
                    header ('location: index.php?u=connexion');
                }else{
                    echo 'aucun compte possède cette email';
                }
           } 
            require 'vue/reinitialiserMDP.php';
        }
    
        public function nouveauMdp(){
            require 'modele/modeleUtilisateurs.php';
            $modifier = new admin();
            if(!empty($_POST)){//Si les champs on etaient posté
                $modif_mdp = htmlspecialchars($_POST['modif_mdp']);//récupère le mdp
                $confirm_mdp = htmlspecialchars($_POST['confirm_mdp']);//récupère la confirmation du mdp
                if ($modif_mdp == $confirm_mdp){// Si ils correspondent
                    $modif_hache =  password_hash($modif_mdp, PASSWORD_DEFAULT);//hache le mdp
                    $id_users = htmlspecialchars($_GET['users']);//récupère l'url 'users'
                    $reponse = $modifier->modif_mdp($id_users,$modif_mdp,$confirm_mdp,$modif_hache);
                     header ('location: index.php?u=connexion');
                }else{
                    echo 'Les deux mots de passe ne correspondent pas !';
                }
            }
            require 'vue/nouveauMDP.php';
        }
    
    
        public function deconnection(){
            session_destroy ();//on detruit notre session
            header ('location: index.php');// On redirige le visiteur vers la page d'accueil
        }
    
    
        public function admin(){
            if(isset ($_SESSION['pseudo']) && isset($_SESSION['password'])){
                require 'vue/admin.php';
            }
        }
    
    
        public function compte(){
            require 'modele/modeleUtilisateurs.php';
            $modifier = new admin();
            if(!empty($_POST['valider'])){//Si les champs on etaient posté
                $modif_mdp = htmlspecialchars($_POST['modif_mdp']);//récupère le mdp
                $confirm_mdp = htmlspecialchars($_POST['confirm_mdp']);//récupère la confirmation du mdp
               if ($modif_mdp == $confirm_mdp){// Si ils correspondent
                    $modif_hache =  password_hash($modif_mdp, PASSWORD_DEFAULT);//hache le mdp
                    $id_users = htmlspecialchars($_GET['users']);//récupère l'url 'users'
                    $reponse = $modifier->modif_mdp($id_users,$modif_mdp,$confirm_mdp,$modif_hache);
                    echo 'Votre mot de passe à bien été modifié';
                }else{
                    echo 'Les deux mots de passe ne correspondent pas !';
                }
            }
            
            if(!empty($_POST['valider_idee'])){
                if (isset($_POST['idee_titre']) && isset($_POST['idee_materiel']) && isset($_POST['idee_message'])){   
                    $titre = $_POST['idee_titre'];
                    $materiel = $_POST['idee_materiel'];
                    $message = $_POST['idee_message'];
                    $insert = $modifier->proposition($titre,$materiel,$message);
                    echo "Votre idée a bien été envoyée a l'admnistrateur";
                }
            }

            require 'vue/monCompte.php';
        }
   
}