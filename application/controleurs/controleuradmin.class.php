<?php
class ControleurAdmin {

    public function afficherIndexAdmin() {
        if (isset($_SESSION['login_admin']))
                 {
                 require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                 require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                 require Chemins::VUES_ADMIN . 'v_gestioncategorie.inc.php';
                 require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                 require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
                 }
             else {
                 require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                 require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                 require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
                 require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                 require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
             }      
    }    

    public function afficherInscription() {
        require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
             require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
             require Chemins::VUES_ADMIN . 'v_inscription.inc.php';
             require Chemins::VUES_PERMANENTES . 'v_contact.inc.php';
             require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';   
    }

    public function afficherAdminCategories() {
        if (isset($_SESSION['login_admin'])) {
                            require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                            require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                            require Chemins::VUES_ADMIN . 'v_gestioncategorie.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
                        } else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }
    }

    public function afficherAdminProduits() {
        if (isset($_SESSION['login_admin'])) {
                            require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                            require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                            require Chemins::VUES_ADMIN . 'v_gestionproduit.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
                        } else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }                 
    }

    public function afficherAdminUtilisateurs(){
        if (isset($_SESSION['login_admin'])) {
                            require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                            require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                            require Chemins::VUES_ADMIN . 'v_gestionuser.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
                        } else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }
    }

    public function afficherMesInfos(){
        if (isset($_SESSION['login_admin']) || isset($_SESSION['login_user'])) {
                            require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
                            require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
                            require Chemins::VUES_ADMIN . 'v_mesinfos.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_contactboutique.inc.php';
                            require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
                        } else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }
    }

    public function verifierConnexion() {
        if (isset($_POST['login']) && isset($_POST['passe'])) {
        if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe'])) {
                            $_SESSION['login_admin'] = $_POST['login'];
            
                            if (isset($_POST['connexion_auto']))
                                setcookie('login_admin', $_POST['login'], time() + 7 * 24 * 3600, null, null, false, true); // valable 7 jours 
            
                                header("Location:index.php?controleur=admin&action=afficherAdminCategories");
                        } else if(GestionBoutique::isUserOK($_POST['login'], $_POST['passe'])) {
                            $_SESSION['login_user'] = $_POST['login'];

                            if (isset($_POST['connexion_auto']))
                            setcookie('login_user', $_POST['login'], time() + 7 * 24 * 3600, null, null, false, true); // valable 7 jours 

                            header("Location:index.php?controleur=principal&action=afficherBoutique");
                        }
                        else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }
                    }
                    else if(isset($_GET['login']) && isset($_GET['passe'])){
                        if (GestionBoutique::isAdminOK($_GET['login'], $_GET['passe'])) {
                            $_SESSION['login_admin'] = $_GET['login'];
            
                                header("Location:index.php?controleur=admin&action=afficherAdminCategories");
                        } else if(GestionBoutique::isUserOK($_GET['login'], $_GET['passe'])) {
                            $_SESSION['login_user'] = $_GET['login'];

                            if (isset($_GET['connexion_auto']))
                            setcookie('login_user', $_GET['login'], time() + 7 * 24 * 3600, null, null, false, true); // valable 7 jours 

                            header("Location:index.php?controleur=principal&action=afficherBoutique");
                        }
                        else{
                            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
                        }
                    }
                            
    }

    public function seDeconnecter() {
        // Suppression des variables de session et de la session
            $_SESSION = array();
            session_destroy();

            //suppression du cookie
            setcookie('login_admin', '');

            header("Location:index.php?controleur=principal&action=afficherBoutique");      
    }

    public function seDeconnecterSansRedirection() {
        // Suppression des variables de session et de la session
            $_SESSION = array();
            session_destroy();

            //suppression du cookie
            setcookie('login_admin', '');
    }

    public function supprimerUtilisateur(){
        if (isset($_SESSION['login_admin'])) {
            if (isset($_GET['idUtilisateur'])) {
                if($_GET['idUtilisateur']==$_GET['idUtilisateurAdmin']){
                    GestionUser::supprimerUtilisateur($_GET['idUtilisateur']);
                    self::seDeconnecterSansRedirection();
                    header("Location:index.php?controleur=principal&action=afficherBoutique&deconnexion=true");
                }
                else{
                    GestionUser::supprimerUtilisateur($_GET['idUtilisateur']);
                    header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
                }
            }
            else{
                header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
            }
        } else{
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
        }
    }

    public function AdminToUtilisateur(){
        if (isset($_SESSION['login_admin'])) {
            if (isset($_GET['idUtilisateur'])) {
                if($_GET['idUtilisateur']==$_GET['idUtilisateurAdmin']){
                    GestionUser::AdminToUtilisateur($_GET['idUtilisateur']);
                    self::seDeconnecterSansRedirection();
                    header("Location:index.php?controleur=principal&action=afficherBoutique&deconnexion=true");
                }
                else{
                    GestionUser::AdminToUtilisateur($_GET['idUtilisateur']);
                    header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
                }
            }
            else{
                header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
            }
        } else{
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
        }
    }

    public function UtilisateurToAdmin(){
        if (isset($_SESSION['login_admin'])) {
            if (isset($_GET['idUtilisateur'])) {
                GestionUser::UtilisateurToAdmin($_GET['idUtilisateur']);
                header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
            }
            else{
                header("Location:index.php?controleur=admin&action=afficherAdminUtilisateurs");
            }
        } else{
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php'; 
        }
    }

    public function inscriptionUser(){
        //Verification si les champs sont saisies
        if (isset($_POST['login']) && isset($_POST['passe']) && isset($_POST['email'])) {
            //Verification si le login & mail sont disponibles
            if(!GestionBoutique::isLoginOk($_POST['login']) && !GestionBoutique::isEmailOk($_POST['email'])){
                //crée un nouvel identifiant pour utilisateur
                $id=GestionBoutique::selectMaxIdUtilisateur()+1;
                //Si le code secret correspond avec celui demandé pour être admin
                if(password_verify($_POST['isAdmin'], VariablesGlobales::$isAdminPasse)){
                    GestionBoutique::inscriptionUser($id,$_POST['login'], sha1($_POST['passe']), $_POST['email'],1);
                    header("Location:index.php?controleur=admin&action=verifierConnexion&login=".$_POST['login']."&passe=".$_POST['passe']);
                }
                //Si le code secret ne correspond pas avec celui demandé pour être admin
                else{
                    GestionBoutique::inscriptionUser($id,$_POST['login'], sha1($_POST['passe']), $_POST['email'],0);
                    header("Location:index.php?controleur=admin&action=verifierConnexion&login=".$_POST['login']."&passe=".$_POST['passe']);
                }
            }
            else{
                if(GestionBoutique::isLoginOk($_POST['login']) && GestionBoutique::isEmailOk($_POST['email'])){
                    header("Location:index.php?controleur=admin&action=afficherInscription&erreurlogin&erreuremail");
                }
                else if(GestionBoutique::isLoginOk($_POST['login'])){
                    header("Location:index.php?controleur=admin&action=afficherInscription&erreurlogin");
                }
                else if(GestionBoutique::isEmailOk($_POST['email'])){
                    header("Location:index.php?controleur=admin&action=afficherInscription&erreuremail");
                }
            } 
        } else {
            header("Location:index.php?controleur=admin&action=afficherInscription&erreur=1");
            // require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
            // require Chemins::VUES_BOUTIQUE . 'v_top.inc.php';
            // require Chemins::VUES_ADMIN . 'v_inscription.inc.php';
            // require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';
        }
    }

    

//passe admin = moulin
}
?>