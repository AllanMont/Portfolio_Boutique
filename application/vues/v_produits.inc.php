<section>
    <script>
    function myFunction(chosen, idProd) {

        document.location.href = 'index.php?controleur=boutique&action=ajouterPanier&idProduit=' + idProd + '&qte=' + chosen;
        alert('Produit ajouté au panier');

    }
    </script>
    <?php
    //Si il ya une marque dans l'url
    if (isset($_GET['marque'])) {
        $marque = $_GET['marque'];
        $lesProduits = GestionBoutique::getLesProduitsByMarqueOrderByPrixDesc($marque);
    } else {
        $lesProduits = GestionBoutique::getLesProduitsEtCategorieEtMarque();
    }
    foreach ($lesProduits as $unProduit) {
    ?>
    <article id="produit">
        <table>
            <tr style="border: 1px solid white;">
                <td style="padding: 30px">
                    <img src="<?php echo $unProduit->image;?>" alt="Image <?php echo $unProduit->modele?>"  style="height:94px; width:112px;"/>
                </td>
                <td>
                    <h3><?php echo $unProduit->libelleMarque?></h3>
                </td>
                <td style="width: 1200px">
                    <center>
                        <aside>
                            <h1><?php echo VariablesGlobales::$libelleMarque;?> </h1>
                            <h1><?php echo $unProduit->modele;?></h1>
                            <h3><?php echo $unProduit->dateSortie;?></h3>
                </td>
                <td>
                    <h3><?php echo $unProduit->prix;?>€</h3>
                </td>
                <td style="width: 1800px;">
                    <h3><?php echo $unProduit->description;?></h3>
                </td>
                <td style="width: 1000px; height: 100px; text-align:right">
                    <form onChange="myFunction(this.options[this.selectedIndex].value,<?php
                                    echo ($unProduit->idProd)?>)">
                        <select name="quantite" onChange="myFunction(this.options[this.selectedIndex].value,<?php
                                    echo ($unProduit->idProd)?>)">
                            <option selected> 0 </option>
                            <option > 1 </option>
                            <option> 2 </option>
                            <option> 3 </option>
                            <option> 4 </option>
                            <option> 5 </option>
                        </select>
                        <input type="image" src="public/images/ajouter_panier.png" alt="Submit" width="100" height="80">
                    </form>
                    </aside>
                </td> 
                <!-- <td style="width: 1000px; height: 100px; text-align:right">
                    <form method="post" action="index.php?controleur=admin&action=ajouterPanier&idProduit=<?php echo $unProduit->idProd ?>&qte=<?php echo $_POST['quantiteAjoutProd']?>">
                        <select name="quantiteAjoutProd">
                            <option selected disabled> 0 </option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                        </select>
                        <input type="image" src="public/images/ajouter_panier.png" alt="Submit" width="100" height="80">
                    </form>
                    </aside>
                </td> -->
                </center>
            </tr>
            <table>
    </article>
    <?php
    }
    ?>
</section>