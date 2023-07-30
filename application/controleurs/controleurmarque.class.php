<?php

class ControleurMarques {

    public function __construct() {
    }

    public function afficherMarque() {
        VariablesGlobales::$lesMarques = GestionBoutique::getLesMarques();
       
    }

    public function afficherMarqueDeCateg($categorie) {
        VariablesGlobales::$lesMarques = GestionBoutique::getLesMarquesByCategorie($categorie);
       
    }
}

?>