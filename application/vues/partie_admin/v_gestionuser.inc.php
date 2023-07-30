<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Gestion Utilisateurs</h1>
        </div>
    </div>
</header>
<center>
    
    <section class="page-section about-sectionlm w">
        <?php
                    $lesUtilisateurs = GestionUser::getLesUtilisateurs();
                    $idUtilisateurAdmin = GestionUser::getInfoUserByLogin($_SESSION['login_admin'])->id;
                        ?>
        <div
            style="width: 90%;padding-left:10px;  padding-top:10px; padding-bottom:10px;border: 3px solid black;background: black; text-align:center">
            <article id="utilisateurs">
                <table>
                    <tr>
                        <td>
                            Id
                        </td>
                        <td>
                            Login
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Admin
                        </td>
                        <td>
                            Supprimer Utilisateur
                        </td>
                    </tr>
                    <?php
            foreach($lesUtilisateurs as $unUtilisateur){
                ?>
                    <tr style="border: 1px solid white;">
                        <td>
                            <h1><?php echo $unUtilisateur->id?></h1>
                        </td>
                        <td style="width: 1200px">
                            <h1><?php echo $unUtilisateur->login;?> </h1>
                        </td>
                        <td style="width: 1200px">
                            <?php echo $unUtilisateur->email;?></h3>
                        </td>
                        <td style="width: 1200px">
                            <?php
                            if($unUtilisateur->isAdmin==true){
                                ?>
                            <a href="index.php?controleur=admin&action=AdminToUtilisateur&idUtilisateur=<?php echo($unUtilisateur->id)?>&idUtilisateurAdmin=<?php echo($idUtilisateurAdmin)?>">
                                <img src="<?php echo CHEMINS::ICONES?>check.png" title="isAdmin"
                                    style="width: 80px; height: 50px; padding-right: 30px;" />
                            </a>
                            <?php
                            }
                            else{
                                ?>
                            <a href="index.php?controleur=admin&action=UtilisateurToAdmin&idUtilisateur=<?php echo($unUtilisateur->id)?>&idUtilisateurAdmin=<?php echo($idUtilisateurAdmin)?>">
                                <img src="<?php echo CHEMINS::ICONES?>cross.png" title="isAdmin"
                                    style="width: 80px; height: 50px; padding-right: 30px;" />
                            </a>
                            <?php
                            }
                        ?>
                        </td>
                        <td style="width: 1000px; height: 100px; text-align:right">
                            <a href="index.php?controleur=admin&action=supprimerUtilisateur&idUtilisateur=<?php echo($unUtilisateur->id)?>&idUtilisateurAdmin=<?php echo($idUtilisateurAdmin)?>"
                                id="utilisateur">
                                <center>
                                    <img src="<?php echo CHEMINS::ICONES?>delete.png" title="isAdmin"
                                        style="width: 80px; height: 50px; padding-right: 30px;" />
                                </center>
                            </a>
                        </td>

                    </tr>
                    <?php
                    }
                    ?>
                    <table>
        </div>

        </article>
        </div>
    </section>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />