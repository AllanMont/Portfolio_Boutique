<?php

session_start();

ob_start();


require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::MODELES . 'gestion_user.class.php';
require_once Chemins::CONFIGS . 'variables_globales.class.php';

require_once Chemins::CONTROLEURS . 'controleurprincipal.class.php';
require_once Chemins::CONTROLEURS . 'controleuradmin.class.php';
require_once Chemins::CONTROLEURS . 'controleurboutique.class.php';
require_once Chemins::CONTROLEURS . 'controleurcategorie.class.php';
require_once Chemins::CONTROLEURS . 'controleurmarque.class.php';

$controleurMarques = new ControleurMarques();
$controleurMarques->afficherMarque();
$controleurCategories = new ControleurCategories();
$controleurCategories->afficherCat();



if (isset($_COOKIE['login_admin']))
    $_SESSION['login_admin'] = $_COOKIE['login_admin'];


    if (!isset($_REQUEST['controleur'])) {
      require Chemins::VUES_PERMANENTES . 'v_head.inc.php';
      require Chemins::VUES_INDEX . 'v_navbar.inc.php';
      require Chemins::VUES_INDEX . 'v_accueil.inc.php';
      require Chemins::VUES_INDEX . 'v_presentation.inc.php';
      require Chemins::VUES_INDEX . 'v_competences.inc.php';
      require Chemins::VUES_INDEX . 'v_experience.inc.php';
      require Chemins::VUES_INDEX . 'v_projets.inc.php';
      require Chemins::VUES_INDEX . 'v_documents.inc.php';
      require Chemins::VUES_PERMANENTES . 'v_footer.inc.php';
    } else {
      require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
        $action = ($_REQUEST['action']);
    
        $classeControleur = 'controleur' . ($_REQUEST['controleur']);
        $fichierControleur = $classeControleur . ".class.php"; 
        require_once(Chemins::CONTROLEURS.$fichierControleur);
        $objetControleur = new $classeControleur(); 
        $objetControleur->$action();
    }
?>