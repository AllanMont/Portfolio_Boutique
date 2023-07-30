<?php

class ControleurPrincipal {

    public function __construct() {
    }

    public function afficherPresentation() {

                        require Chemins::VUES_INDEX . 'v_top.inc.php';
                        require Chemins::VUES_INDEX . 'v_presentation.inc.php';
                        require Chemins::VUES_INDEX . 'v_cv.inc.php';
                        require Chemins::VUES_INDEX . 'v_devpourcentage.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_contact.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_pied.inc.php'; 
    } 

    public function afficherLettreMotivation() {
        require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                        require Chemins::VUES_LETTREMOTIVATION . 'v_top.inc.php';
                        require Chemins::VUES_LETTREMOTIVATION . 'v_lm.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
    } 

    public function afficherProjets() {
        require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                        require Chemins::VUES_LETTREMOTIVATION . 'v_top.inc.php';
                        require Chemins::VUES_LETTREMOTIVATION . 'v_lm.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
    } 

    public function afficherBoutique() {
        require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                        require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                        require Chemins::VUES_BOUTIQUE . 'v_boutique.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
    } 

    public function afficherPanier() {
        require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                        require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                        require Chemins::VUES_BOUTIQUE . 'v_panier.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                        require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
    } 
}
?>