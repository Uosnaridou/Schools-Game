<?php
class controllerCommentaires{
    
        private function objet(){//Fonction privé qui appel le bon modele et crée un objet 
            require 'modele/modeleCommentaires.php';
            $post = new commentaires;
            return $post;
        }
    
        public function listeCommentaires(){//On appel la bonne fonction et require la vue souhaitée
            $post = $this->objet();
            $reponse = $post->commentaireSignaler();
            require 'vue/commentairesSignaler.php';
        }
    
        
        public function supprimerCommentaireSignaler(){//On appel la bonne fonction et on require la vue souhaitée
            $post = $this->objet();
            $id_article = htmlspecialchars($_GET['articles']);//On récupère l'url 'articles'
            $reponse = $post->supprimerCommentaire($id_article);
            $reponse = $post->commentaireSignaler();
            require 'vue/commentairesSignaler.php';
        }
    
    
        public function afficherCommentaire(){//On appel la bonne fonction et on require la vue souhaitée
            $post = $this->objet();
            $id_article = htmlspecialchars($_GET['id_article']);//On récupère l'url 'id_article'
            $reponse = $post->afficheCommentaire($id_article);
            require 'vue/commentaires.php';
        }
    
    
        public function ajoutSignalement(){//On appel la bonne fonction et on require la vue souhaitée
            $post = $this->objet();
            $id_commentaire = htmlspecialchars($_GET['commentaire']);//On récupère l'url 'commentaire'
            $reponse = $post->ajoutSignalement($id_commentaire);
            header('Location: index.php');       
        }
    
        public function restaurerSignalement(){
            $post = $this->objet();
            $id_commentaire = htmlspecialchars($_GET['commentaire']);//On récupère l'url 'commentaire'
            $reponse = $post->restaurerSignalement($id_commentaire);
            require 'vue/commentairesSignaler.php';
        }
    
}