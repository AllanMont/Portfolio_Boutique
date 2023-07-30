        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center" id="lm">
                    <h1 class="mx-auto my-0 text-uppercase">Ma Boutique</h1>
                </div>
            </div>
        </header>

        <?php
            if(isset($_GET['deconnexion']) && $_GET['deconnexion']==true){
                echo '<script>alert("Vous avez modifié votre compte, vous avez donc été deconncté")</script>';
            }
        ?>
        <center>
            <section class="page-section about-sectionlm w">
                <!-- FOREACH MARCHE PAS DANS LE HREF -->
                <table>
                    <tr>
                        <?php 
                        foreach (VariablesGlobales::$lesMarques as $uneMarque) {
                            ?>
                        <td style="padding: 50px">
                            <a href="index.php?controleur=principal&action=afficherBoutique&marque=<?php echo $uneMarque->libelleMarque ?> ">
                                <h2 class="text-white-50 mx-auto mt-2 mb-5"> <?php echo $uneMarque->libelleMarque;?>
                                </h2>
                            </a>
                        </td>
                        <?php
                         }

                        $categorie = (!isset($_REQUEST['categorie'])) ? '' : $_REQUEST['categorie'];
                        $marque = (!isset($_REQUEST['marque'])) ? '' : $_REQUEST['marque'];
                        require_once Chemins::CONTROLEURS . 'controleurproduit.class.php';
                        $controleurProduits = new ControleurProduits();
                        ?>
                        
                </table>
                <div style="width: 90%;padding-left:10px;  padding-top:10px; padding-bottom:10px;border: 3px solid black;background: black; text-align:center">
                    <?php 

                    //if pas de Categorie et pas de Marque
                    if ($categorie == '' && $marque == '') {
                        $controleurProduits->afficherToutLesProduitsDesCategories();
                    } 
                    //if Catégorie mais pas de marque
                    else if ($categorie != '' && $marque == '') {
                        $controleurProduits->afficherProduitDeLaCat($categorie);
                    } 
                    //if pas de Categorie mais une marque
                    else if ($categorie == '' && $marque != '') {
                        $controleurProduits->afficherMarque($marque);
                    }


                    ?>
                </div>
            </section>
                <br /><br /><br /><br /><br /><br /><br /><br /><br />