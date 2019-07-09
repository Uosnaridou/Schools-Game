<?php
class controllerContact{
    
    public function email(){
       if ($_POST) {
           if(!empty($_POST['case'])){
               if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments']) && !empty($_POST['sujet']) ) {
                   $email = $_POST['email'];
                   $email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);
                        if($email_check != 1){
                            echo "<p>Merci d'entrer une email valide.</p>";
                        }else{ 

                            $destinataire = 'celia.chanabe@gmail.com';

                            $sujet = $_POST['sujet'];

                            $body = "Nom: {$_POST['name']}\n\nMessage: {$_POST['comments']}";

                            $body = wordwrap($body, 70);

                            $header = "From: {$_POST['email']}";

                            mail( $destinataire, $sujet , $body, $header );

                            echo '<p><em>Votre message a été envoyé</em></p>';
                            $_POST = array();
                           }

                }else{
                   echo '<p style="font-weight: bold; color: #C00">Merci de remplir le formulaire en entier</p>';
               }
           }else{
               echo 'Vous devez accepter les termes et conditions';
           }  
        }
        
        require 'vue/contact.php';
    }
}