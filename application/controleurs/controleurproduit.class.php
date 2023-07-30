<?php

class ControleurProduits {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php';    
    }

    public function afficherCat($libelleCategorie) {
        VariablesGlobales::$libelleCategorie = $libelleCategorie;
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorie($libelleCategorie);
        require Chemins::VUES . 'v_produits.inc.php';        
    }

    public function afficherMarque($libelleMarque) {
        VariablesGlobales::$libelleMarque = $libelleMarque;
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByMarqueOrderByPrixDesc($libelleMarque);
        require Chemins::VUES . 'v_produits.inc.php';        
    }

    public function afficherProduits() {
        VariablesGlobales::$lesProduits = GestionBoutique::getToutLesProduitsDesCategories();
        require Chemins::VUES . 'v_produits.inc.php';        
    }

    public function afficherToutLesProduitsDesCategories() {
        VariablesGlobales::$lesProduits = GestionBoutique::getToutLesProduitsDesCategories();
        require Chemins::VUES . 'v_produits.inc.php';        
    }

    public function afficherProduitDeLaCat($cat) {
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorieOrderByPrixDesc($cat);
        require Chemins::VUES . 'v_produits.inc.php';        
    }

    public function afficherLesMarquesDeCategorie($libelleCategorie) {
        VariablesGlobales::$libelleCategorie = $libelleCategorie;
        VariablesGlobales::$lesMarques = GestionBoutique::getLesMarquesByCategorie($libelleCategorie);    
    }
    
}

?>