<?php
class controllerArticles{
    
    
        public function accueil(){
            require 'modele/modeleArticles.php';//Appel le bon modele
            $post = new articles;//Crée un nouvel objet
            $rep = $post->pageAccueil();//On appel les bonnes fonctions
            $reponse = $post->dernierJeux();
            require 'vue/pageAccueil.php';//On require la vue souhaité
        }
    
    
        public function billet(){
            require 'modele/modeleArticles.php';
            $infoBillet = new articles;
            $id_article = htmlspecialchars($_GET['articles']);//On récupère l'url 'articles'
            $req = $infoBillet->billet($id_article);
                if (isset($_POST['pseudo']) && isset($_POST['messages'])){//Si les champs pseudo et messages ont etaient posté
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $commentaire = htmlspecialchars($_POST['messages']);
                    $reponse = $infoBillet->ajoutCommentaire($id_article, $pseudo, $commentaire);
                }
            require 'vue/vueBillet.php';
        }
    
        public function listeBrouillon(){
            require 'modele/modeleArticles.php';
            $infoBillet = new articles;
            $req = $infoBillet->afficheBrouillon();
            require 'vue/listeBrouillon.php';
        }
       
        public function affichageIdee(){
            require 'modele/modeleArticles.php';
            $affichage = new articles;
            $rep = $affichage->affichageProposition();
            require 'vue/listeProposition.php';
        }
        
        public function suppIdee(){
            require 'modele/modeleArticles.php';
            $supprimer = new articles;
            $id_article = htmlspecialchars($_GET['articles']);
            $reponse = $supprimer->supprimerIdee($id_article);
            $rep = $supprimer->affichageProposition();
            require 'vue/listeProposition.php';
        }
    
        public function propo(){
            require 'vue/aPropo.php';
        }
    
    
        public function nvxArticle(){
            require 'modele/modeleArticles.php';
            $nvxBillet = new articles;  
            
                    //INSERTION D'UNE IMAGE 
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES['photo']) AND $_FILES['photo']){
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['photo']['size'] <= 3145728){
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png'); 
                    if (in_array($extension_upload, $extensions_autorisees)){
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['photo']['tmp_name'], 'img/images_news/' . $_FILES['photo']['name']);
                    }
                }       
            }   

            if (isset($_POST['titre']) && isset($_POST['date']) && isset($_POST['materiel']) && isset($_POST['joueurs']) && isset($_POST['temps']) && isset($_POST['formulaire'])){   
                $photo = 'images_news/' . $_FILES['photo']['name'];
                $titre = $_POST['titre'];
                $date = $_POST['date'];
                $materiel = $_POST['materiel'];
                $joueurs = $_POST['joueurs'];
                $temps = $_POST['temps'];
                $formulaire = $_POST['formulaire'];
                $photo = $photo;
                if (isset($_POST['brouillon'])){
                    $brouillon = 1;
                }else{
                    $brouillon = 0;
                }
                $insert = $nvxBillet->nouveauArticle($photo,$titre,$date,$materiel,$joueurs,$temps,$formulaire, $brouillon);
                header('Location: index.php');       
            }
        require 'vue/nouveauArticle.php';
        }
        
    
        public function modifier(){
            require 'modele/modeleArticles.php';
            $modifierBillet = new articles;
            $id_article = htmlspecialchars($_GET['articles']);//on récupère l'url 'articles'
            $rep = $modifierBillet->billet($id_article);
        
            if(!empty($_POST)){//Si les informations ont etaient posté on récupère les informations 
                $titre = htmlspecialchars($_POST['titre']); 
                $date = htmlspecialchars($_POST['date']);
                $materiel = htmlspecialchars($_POST['materiel']);
                $joueurs = htmlspecialchars($_POST['joueurs']);
                $temps = htmlspecialchars($_POST['temps']);  
                $message = htmlspecialchars($_POST['message']);
                $reponse = $modifierBillet->modifierArticle($id_article,$titre, $date, $materiel , $joueurs, $temps, $message);//On appel la fonction
                header('Location: index.php'); 
            }else{   
                require 'vue/modifierArticles.php';
            }
        }
    
    
    
        public function listeBillets(){
            require 'modele/modeleArticles.php';
            $liste = new articles;
            $reponse = $liste->listeBillet();
            require 'vue/listeArticles.php';
        }
    
    
        public function supprimerBillet(){
            require 'modele/modeleArticles.php';
            $supprimer = new articles;
            $id_article = htmlspecialchars($_GET['articles']);
            $reponse = $supprimer->supprimerArticle($id_article);
            $reponse = $supprimer->listeBillet();
            require 'vue/listeArticles.php';
        }
      
}