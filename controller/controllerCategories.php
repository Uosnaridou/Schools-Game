<?php
class categ{
    
        private function objet(){//Fonction privé qui appel le modele et crée un nouvel objet
            require 'modele/modeleCategories.php';
            $categorie = new modeleCategories();
            return $categorie;
        }
        
        public function categorietout(){//On appel la bonne fonction et on require la vue souhaitée
            $categorie = $this->objet();
            $reponse = $categorie->tout();        
            require 'vue/categories.php';
        }
    
        public function categorie1(){//On appel la bonne fonction et on require la vue souhaitée
            $categorie = $this->objet();
            $reponse = $categorie->categorie1(); 
            require 'vue/categories.php';
        }
            
        public function categorie2(){//On appel la bonne fonction et on require la vue souhaitée
            $categorie = $this->objet();
            $reponse = $categorie->categorie2(); 
            require 'vue/categories.php';
        }
            
        public function categorie3(){//On appel la bonne fonction et on require la vue souhaitée
            $categorie = $this->objet();
            $reponse = $categorie->categorie3(); 
            require 'vue/categories.php';
        }
            
        public function categorie4(){//On appel la bonne fonction et on require la vue souhaitée
            $categorie = $this->objet();
            $reponse = $categorie->categorie4();
            require 'vue/categories.php';
        } 
    

}
