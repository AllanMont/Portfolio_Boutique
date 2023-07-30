<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Modification des informations</h1>
        </div>
    </div>
</header>
<center>
    <?php
    if(isset($_SESSION['login_admin'])){
        $utilisateur = [$_SESSION['login_admin']];
        $utilisateur = GestionUser::getInfoUserByLogin($utilisateur[0]);
    }
    elseif (isset($_SESSION['login_user'])){
        $utilisateur = [$_SESSION['login_user']];
        $utilisateur = GestionUser::getInfoUserByLogin($utilisateur[0]);
    }


    ?>
    <section class="page-section about-sectionlm w">
        <div
            style="width: 90%;padding-left:10px;  padding-top:10px; padding-bottom:10px;border: 3px solid black;background: black; text-align:center">
            <article id="utilisateurs">
                <center>
                    <form method="post" action="index.php?controleur=admin&action=afficherMesInfos">
                        <table>
                                    <?php
                                if($utilisateur->isAdmin==true){
                                    echo('<tr>
                                    <td> Id : </td>
                                    <td>
                                        <input type="text" name="idUtilisateur" value="'.$utilisateur->id.'" readonly>
                                    </td>
                                </tr>');
                                }
                            ?>
                            <!-- Login Utilisateur -->
                            <tr>
                                <td> Login : </td>
                                <!-- input avec le login de l'utilisateur déjà saisi -->
                                <td>
                                    <input type="text" name="loginUtilisateur" value="<?php echo $utilisateur->login?>"
                                        size="30" required>
                                </td>
                            </tr>

                            <!-- Email Utilisateur -->
                            <tr>
                                <td> Mot de passe : </td>
                                <!-- input pour le passe de l'utilisateur -->
                                <td>
                                    <input type="password" name="passeUtilisateur" size="30" required>
                                </td>
                            </tr>

                            <!-- Email Utilisateur -->
                            <tr>
                                <td> Email : </td>
                                <!-- input pour l'email de l'utilisateur -->
                                <td>
                                    <input type="text" name="emailUtilisateur" value="<?php echo $utilisateur->email?>"
                                        size="30" required>
                                </td>
                            </tr>

                            <!-- Type Compte -->
                            <tr>
                                <td> Type du compte : </td>
                                <?php 
                                if($utilisateur->isAdmin==true){
                                    echo("<td style='padding-left:50px;'> Administrateur </td>");
                                }
                                else{
                                    echo("<td style='padding-left:50px;'> Utilisateur </td>");
                                }
                                    ?>
                            </tr>

                            <!-- Boutons Reset+Valider -->
                            <table>
                                <tr>
                                    <td>
                                        
                                        <input type="reset" value="Reinitialiser">
                                        <input type="submit" name="modifierUtilisateur" value="Modifier">
                                    </td>
                                </tr>
                            </table>
                        </table>
                    </form>
                </center>
        </div>


<?php
//Si le bouton submit est appuyé
if(isset($_POST['modifierUtilisateur'])){
    //On récupère les données du formulaire
    if(isset($_POST['loginUtilisateur'])){
        $login = $_POST['loginUtilisateur'];
    }
    if(isset($_POST['passeUtilisateur'])){
        $passe = sha1($_POST['passeUtilisateur']);
    }
    if(isset($_POST['emailUtilisateur'])){
        $email = $_POST['emailUtilisateur'];
    }
    $id = $utilisateur->id;

    //On vérifie que les champs ne sont pas vides
    if(!empty($login) && !empty($passe) && !empty($email)){
        //On vérifie que le login et l'email ne sont pas déjà utilisés
        if(GestionUser::verifLogin($login,$id)==true && GestionUser::verifEmail($email,$id)==true)
        echo("<script>alert(\"L'email et le login sont déjà utilisés\")</script>");
        //On vérifie que le login n'est pas déjà utilisé
        else if(GestionUser::verifLogin($login,$id)==true)
            echo("<script>alert(\"Le login est déjà utilisé\")</script>");
        //On vérifie que l'email n'est pas déjà utilisé
        else if(GestionUser::verifEmail($email,$id)==true)
            echo("<script>alert(\"L'email est déjà utilisé\")</script>");
        else{
            //On modifie les données de l'utilisateur
            GestionUser::modifierUtilisateur($id, $login, $passe, $email);
            echo("<script>alert(\"Les modifications ont bien été prises en compte\")</script>");
            //Si l'utilisateur est un admin, on modifie sa session avec le login inséré dans le formulaire
            if(isset($_SESSION['login_admin'])){
                $_SESSION['login_admin']=$login;
            }
            //Si l'utilisateur est un utilisateur, on modifie sa session avec le login inséré dans le formulaire
            elseif (isset($_SESSION['login_user'])){
                $_SESSION['login_user']=$login;	
            }
            //Raffraichissement de la page
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    //Si tout les champs de sont pas complétés /(impossible avec les required)
    else{
        echo("<script>alert(\"Veuillez remplir tous les champs\")</script>");
    }
}
?>
        </article>
        </div>

    <br /><br /><br /><br /><br /><br /><br /><br /><br />