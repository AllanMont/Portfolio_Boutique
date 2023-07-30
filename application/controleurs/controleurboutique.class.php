<?php
require_once Chemins::MODELES . 'panier.class.php';
class ControleurBoutique {

    public function __construct() {
    }

    public function ajouterPanier() {
        Panier::ajouterProduit($_GET['idProduit'], $_GET['qte']);
        header("Location:index.php?controleur=principal&action=afficherBoutique");
    }
         
    public function supprimerProdDuPanier(){
        Panier::retirerProduit($_GET['idProduit']);
        header("Location:index.php?controleur=principal&action=afficherPanier");
    }

    public function modifQteProduit(){
        Panier::modifierQteProduit($_GET['idProduit'], $_GET['qte']);
        header("Location:index.php?controleur=principal&action=afficherPanier");
    }
    
}
?>