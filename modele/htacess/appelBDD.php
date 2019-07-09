<?php 
class appelBDD{ 
//On se connecte a la base de donnée 
            public function dbConnect(){
                try{
                    $bdd = new PDO('mysql:host=localhost;dbname=w67xbo_schoolsG;charset=utf8','w67xbo_schoolsG','w67xbo_schoolsG');
                    //$bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8','root','');
                }
                catch(Exception $e){
                     die('Erreur : '.$e->getMessage());
                } 
                
                return $bdd;
            }
}
