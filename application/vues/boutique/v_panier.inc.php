<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Mon Panier</h1>
        </div>
    </div>
</header>
<center>
    <section class="page-section about-sectionlm w">
        <?php
                    Panier::initialiser();
                    $lesProduitsPanier = Panier::getProduits();
                    if (count($lesProduitsPanier) == 0) {
                        echo '<h2>Votre panier est vide</h2>';
                    } else {
                        ?>
        <div
            style="width: 90%;padding-left:10px;  padding-top:10px; padding-bottom:10px;border: 3px solid black;background: black; text-align:center">
            <article id="produit">
                <table>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Produit
                        </td>
                        <td>
                            Quantitée
                        </td>
                        <td>
                            Prix
                        </td>
                        <td>
                            Retirer du panier
                        </td>
                    </tr>
                    <?php
            foreach($lesProduitsPanier as $unProduitPanier=>$value){
                $leProduit = GestionBoutique::getProduitById($unProduitPanier);
                ?>
                    <tr style="border: 1px solid white;">
                        <script>
                        function myFunction(chosen, idProd) {

                            document.location.href = 'index.php?controleur=boutique&action=modifQteProduit&idProduit=' +
                                idProd + '&qte=' + chosen;
                            console.log(chosen);
                        }
                        </script>



                        <td>
                            <img src="<?php echo $leProduit->image;?>" alt="photo" style="height:94px; width:112px;" />
                        </td>
                        <td style="width: 1200px">
                            <h1><?php echo($leProduit->modele);?> </h1>
                        </td>
                        <td style="width: 1200px">
                            <form>
                                <select name="quantite" onChange="myFunction(this.options[this.selectedIndex].value,<?php
                                    echo ($leProduit->idProd)?>)">
                                    <option <?php if(Panier::getQteByProduit($unProduitPanier)==1){ ?> selected
                                        <?php }; ?>> 1 </option>
                                    <option <?php if(Panier::getQteByProduit($unProduitPanier)==2){ ?> selected
                                        <?php }; ?>> 2 </option>
                                    <option <?php if(Panier::getQteByProduit($unProduitPanier)==3){ ?> selected
                                        <?php }; ?>> 3 </option>
                                    <option <?php if(Panier::getQteByProduit($unProduitPanier)==4){ ?> selected
                                        <?php }; ?>> 4 </option>
                                    <option <?php if(Panier::getQteByProduit($unProduitPanier)==5){ ?> selected
                                        <?php }; ?>> 5 </option>
                                </select>

                            </form>
                            <!-- <h3><?php echo Panier::getQteByProduit($unProduitPanier);?></h3> -->
                        </td>
                        <td style="width: 1200px">
                            <h3><?php echo (Panier::getPrixByQteProduit($unProduitPanier));?></h3>
                        </td>
                        <td style="width: 1000px; height: 100px; text-align:right">
                            <a href="index.php?controleur=boutique&action=supprimerProdDuPanier&idProduit=<?php echo($leProduit->idProd)?>"
                                id="produitPanier">
                                <center>
                                    <img src="<?php echo CHEMINS::IMAGES?>supprimer_du_panier.png" title="Ajouter au panier"
                                        style="width: 100px; height: 80px; padding-right: 30px;" />
                                </center>
                            </a>
                        </td>

                    </tr>

                    <?php
                    }
                    ?>

                    <tr>
                        <td colspan="5">
                            Prix total : <?php echo Panier::getPrixTotal();?>€
                        </td>

                    </tr>
                    <table>
        </div>
        
        </article>
        </div>
    </section>
    <?php
            }
            ?>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />