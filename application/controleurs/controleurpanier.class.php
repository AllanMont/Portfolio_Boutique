<?php
require_once Chemins::MODELES . 'panier.class.php';
class ControleurPanier {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php';    
    }

    public function getPanier() {
         Panier::getProduits();
    }

    public function getNbProduits() {
        Panier::getNbProduits();
   }
    
    
    
}

?>