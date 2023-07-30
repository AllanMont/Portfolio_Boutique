<header class="masthead" >
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Gestion des catégories</h1>
        </div>
    </div>
</header>
<center>
    <section class="page-section about-sectionlm w" >
        <div style="width: 90%;padding-left:10px;padding-right:10px;    padding-top:10px; padding-bottom:10px;border: 3px solid black;border-radius: 50px;background: rgba(18, 70, 63 , .4);text-align:center"> 
            <aside>

                <form method="post" action="" style="margin: auto;padding:20px;">
                    <fieldset style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);;height: 175px">
                        <legend>Renommer Catégorie</legend>
                        <label for="categorie">Catégorie :</label>
                        <select name="lesCategoriesRenommage" id="lesCategories">
                            <?php
                            $lesCategories = GestionBoutique::getLesCategories();
                            foreach ($lesCategories as $uneCategorie) {
                                ?>
                                <option value="<?php echo $uneCategorie->id; ?>"><?php echo $uneCategorie->libelleCat; ?></option>
                            <?php } ?>
                        </select>
                        <br/>
                        <label for="tb_renommage">Renommer en : </label> <input type="text" name="tb_renommage"/>
                        <br/>
                        <input type="submit" value="Renommer" />
                    </fieldset>
                </form>

                <form method="post" action="index.php?controleur=admin&action=afficherAdminCategories" style="margin: auto;padding:20px;">
                    <fieldset style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);height: 125px">
                        <legend>Supprimer Catégorie</legend>
                        <label for="categorie">Catégorie :</label>
                        <select name="lesCategoriesSupprimer" id="lesCategories">
                            <?php
                            $lesCategories = GestionBoutique::getLesCategories();
                            foreach ($lesCategories as $uneCategorie) {
                                ?>
                                <option value="<?php echo $uneCategorie->id; ?>"><?php echo $uneCategorie->libelleCat; ?></option>
                            <?php } ?>
                        </select>
                        <br/>
                        <input type="submit" value="Supprimer" />
                    </fieldset>
                </form>

                <form method="post" action="index.php?controleur=admin&action=afficherAdminCategories" style="margin: auto;padding:20px;">
                    <fieldset style="border: solid 1px black;border-radius: 30px;box-shadow: 0px 5px 5px black;background: rgba(18, 70, 63 , .4);height: 125px">
                        <legend>Ajouter Catégorie</legend>
                        <label>Nom Catégorie : </label>   <input type="text" name="tb_ajoutCategorie"/>
                        <br/>
                        <input type="submit" value="Ajouter" />
                    </fieldset>
                </form>

                <?php
                if (isset($_POST['tb_ajoutCategorie'])) {
                    $maxIdCategorie = GestionBoutique::selectMaxIdCategorie();
                    GestionBoutique::ajouterCategorie($maxIdCategorie + 1, $_POST['tb_ajoutCategorie']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                if (isset($_POST['lesCategoriesSupprimer'])) {
                    GestionBoutique::supprimerCategorie($_POST['lesCategoriesSupprimer']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                if (isset($_POST['lesCategoriesRenommage'])) {
                    GestionBoutique::renommerCategorie($_POST['lesCategoriesRenommage'], $_POST['tb_renommage']);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                ?>
            </aside>
        </div>
