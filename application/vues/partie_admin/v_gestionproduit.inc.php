<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Gestion des produits</h1>
        </div>
    </div>
</header>
<center>
    <section class="page-section about-sectionlm w">
        <div
            style="width: 90%;padding-left:10px;padding-right:10px;    padding-top:10px; padding-bottom:10px;border: 3px solid black;border-radius: 50px;background: rgba(18, 70, 63 , .4);text-align:center">
            <aside>

                <form method="post" action="index.php?controleur=admin&action=afficherAdminProduits"
                    style="margin: auto;padding:20px;">
                    <fieldset
                        style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);;height: 175px">
                        <legend>Renommer Produit</legend>

                        <label for="categorie">Produit :</label>
                        <select name="lesProduitsRenommage" id="lesProduits">
                            <?php
                            $lesProduits = GestionBoutique::getLesProduitsEtCategorieEtMarque();
                            
                            
                            foreach ($lesProduits as $unProduit) {
                                ?>
                            <option value="<?php echo $unProduit->idProd;  ?>"><?php echo $unProduit->libelleMarque . ' ' . $unProduit->modele; ?>
                            </option>
                            <?php } ?>

                        </select>
                        <br />
                        <label for="tb_renommage">Renommer en : </label> <input type="text" name="tb_renommage" />
                        <br />
                        <input type="submit" value="Renommer" />
                    </fieldset>
                </form>


                <form method="post" action="index.php?controleur=admin&action=afficherAdminProduits"
                    style="margin: auto;padding:20px;">
                    <fieldset
                        style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);height: 125px">
                        <legend>Supprimer Produit</legend>
                        <label for="categorie">Produit :</label>
                        <select name="lesProduitsSupprimer" id="lesProduits">
                            <?php
                            $lesProduits = GestionBoutique::getLesProduitsEtCategorieEtMarque();
                            foreach ($lesProduits as $unProduit) {
                                ?>
                            <option value="<?php echo $unProduit->idProd; ?>"><?php echo $unProduit->libelleMarque . ' ' . $unProduit->modele; ?></option>
                            <?php } ?>
                        </select>
                        <br />
                        <input type="submit" value="Supprimer" />
                    </fieldset>
                </form>




                <form method="post" action="index.php?controleur=admin&action=afficherAdminProduits"
                    style="margin: auto;padding:20px;">
                    <fieldset
                        style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);height: 285px">
                        <legend>Ajouter Produit</legend>
                        <center>
                            <table>
                                <!-- Marque -->
                                <tr>
                                    <td><label>Marque : </label></td>
                                    <td><select name="tb_ajoutProduitMarque">
                                            <?php
                                            $lesMarques = GestionBoutique::getLesMarques();
                                            foreach ($lesMarques as $uneMarque) {
                                                ?>
                                            <option value="<?php echo $uneMarque->id; ?>"><?php echo $uneMarque->libelleMarque; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <!-- Modele -->
                                <tr>
                                    <td><label>Modele : </label></td>
                                    <td><input type="text" name="tb_ajoutProduitModele" /><br /></td>
                                </tr>
                                <!-- DateSortie -->
                                <tr>
                                    <td><label>Date de sortie : </label></td>
                                    <td><input type="text" name="tb_ajoutProduitDate" placeholder="Année"/><br /></td>
                                </tr>
                                <!-- Prix -->
                                <tr>
                                    <td><label>Prix : </label></td>
                                    <td><input type="text" name="tb_ajoutProduitPrix" placeholder="€"/></td>
                                </tr>
                                <!-- Image -->
                                <tr>
                                    <td><label>Image : </label></td>
                                    <td><input type="text" name="tb_ajoutProduitImg" placeholder="Url" /></td>
                                </tr>
                                <!-- Categorie -->
                                <tr>
                                    <td><label for="categorie">Catégorie :</label></td>
                                    <td>
                                        <select name="lesProduitsAjouterCat" id="lesCategories">
                                            <?php
                                            $lesCategories = GestionBoutique::getLesCategories();
                                            foreach ($lesCategories as $uneCategorie) {
                                                ?>
                                            <option value="<?php echo $uneCategorie->id; ?>">
                                                <?php echo $uneCategorie->libelleCat; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                        </center>
                        <br />
                        <input type="submit" value="Ajouter" />
                    </fieldset>
                </form>

                <?php
                if (isset($_POST['lesProduitsAjouterCat'])) {
                    $maxIdProduit = GestionBoutique::selectMaxIdProduit();
                    GestionBoutique::ajouterProduit($maxIdProduit + 1, $_POST['tb_ajoutProduitModele'], $_POST['tb_ajoutProduitDate'], $_POST['tb_ajoutProduitPrix'],$_POST['tb_ajoutProduitImg'],  $_POST['tb_ajoutProduitMarque'], $_POST['lesProduitsAjouterCat']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                if (isset($_POST['lesProduitsSupprimer'])) {
                    GestionBoutique::supprimerProduit($_POST['lesProduitsSupprimer']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                if (isset($_POST['lesProduitsRenommage'])) {
                    GestionBoutique::renommerProduit($_POST['lesProduitsRenommage'], $_POST['tb_renommage']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                ?>
            </aside>
        </div>