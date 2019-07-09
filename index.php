<?php
class routeur {
    
    function __construct(){
        session_start();//On démarre la session
    }
    

    public function pages(){
        
        if (isset($_GET['a'])) { //Si l'url est "a" on appel le bon controller et les bonne fonction
            require 'controller/controllerArticles.php';
            $post = new controllerArticles();
            
           if ( $_GET['a'] == 'billet'){
                $req = $post->billet();
                
            }else if ( $_GET['a'] == 'dernierJeux'){ 
                $reponse = $post->dernierJeux();
         
            }else if ( $_GET['a'] == 'nouveauArticle'){
                $insert = $post->nvxArticle();         
                  
            }else if ($_GET['a'] == 'listeArticles') {
                $liste = $post->listeBillets();
                
            }else if ($_GET['a'] == 'listeBrouillon') {
                $liste = $post->listeBrouillon();
                
            }else if ($_GET['a'] == 'proposition') {
                $liste = $post->affichageIdee();
                
            }else if ($_GET['a'] == 'supp_idee') {
                $liste = $post->suppIdee();
                
            }else if ($_GET['a'] == 'modif' ) { 
                $reponse = $post->modifier();

            }else if ($_GET['a'] == 'supp' ) { 
                $supp = $post->supprimerBillet();
            
            }else if ($_GET['a'] == 'propo' ) { 
                $aPropo = $post->propo();
            }
           
        }else if(isset($_GET['c'])) {//Si l'url est "c" on appel le bon controller et les bonne fonction
            require 'controller/controllerCommentaires.php';
             $requete = new controllerCommentaires();
           
            if ($_GET['c'] == 'commentaireSignaler' ) { 
                $reponse = $requete->listeCommentaires();

            }else if ($_GET['c'] == 'supprimerSignalement' ) { 
                $reponse = $requete->supprimerCommentaireSignaler();

            }else if($_GET['c'] == 'afficheAjax' ) {  
                $reponse = $requete->afficherCommentaire();
            
            }else if($_GET['c'] == 'ajoutSignalement' ) {  
                $reponse = $requete->ajoutSignalement();
               
            }else if($_GET['c'] == 'restaurer' ) {  
                $reponse = $requete->restaurerSignalement();
            }
                     
        }else if(isset($_GET['contact'])){
            require 'controller/controllerContact.php';
            $appel = new controllerContact(); 
           
            if ($_GET['contact'] == 'contact'){
                $contact = $appel->email();
            }  
           
        }else if(isset($_GET['u'])) {//Si l'url est "u" on appel le bon controller et les bonne fonction
            require 'controller/controllerUtilisateurs.php';
            $post = new controllerAdmin();
           
            if ($_GET['u'] == 'connexion' ) { 
                $connecte = $post->connexion();
               
            }else if($_GET['u'] == 'deconnection' ){
                $deconnecte = $post->deconnection();
               
            } else if($_GET['u'] == 'inscription' ){
                $inscrit = $post->inscription();
               
            } else if($_GET['u'] == 'oublie' ){
                $mdp = $post->mdpOublier();
               
            } else if($_GET['u'] == 'nouveauMdp' ){
                $mdp = $post->nouveauMdp();
               
            } else if($_GET['u'] == 'admin' ){
                $administration = $post->admin();
                      
            } else if($_GET['u'] == 'compte' ){
                $monCompte = $post->compte();
            }
           
        }else if(isset($_GET['categories'])) {//Si l'url est "categories" on appel le bon controller et les bonne fonction
            require 'controller/controllerCategories.php';
            $categorie = new categ();
         
            if ( $_GET['categories'] == 'categorie1' ) {
                $rep = $categorie->categorie1(); 

            }else if ( $_GET['categories'] == 'categorie2' ) {
                $rep = $categorie->categorie2(); 
  
            }else if ( $_GET['categories'] == 'categorie3' ){
                $rep = $categorie->categorie3(); 
    
            }else if($_GET['categories'] == 'categorie4'){
                $rep = $categorie->categorie4();
                
            }else if ( $_GET['categories'] == 'categorietout' ){
                $rep = $categorie->categorietout();   
            }
           
        }else{ 
            require 'controller/controllerArticles.php';
            $post = new controllerArticles();
            $reponse = $post->accueil();//Sinon on appel la fonction de la page d'accueil 
        }

    }
    
}
$appel = new routeur();
$root = $appel->pages();
