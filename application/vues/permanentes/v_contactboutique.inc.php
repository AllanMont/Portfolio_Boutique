<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
                <div class="card-body text-center">
                    <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                    <h4 class="text-uppercase m-0 text-black-50">Adresse</h4>
                    <hr class="my-4" />
                    <div class="small text-black-50"><a href="https://goo.gl/maps/TZj2hgztcpN5nd6B8">55 Rue du Faubourg Saint-Honoré, 75008 Paris </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
                <div class="card-body text-center">
                    <i class="fas fa-envelope text-primary mb-2"></i>
                    <h4 class="text-uppercase m-0 text-black-50">E-mail</h4>
                    <hr class="my-4" />
                    <div class="small text-black-50">E-mail : <a href="#!">allan.mont34@gmail.com</a></div>
                    <div class="small text-black-50">Téléphone : <a href="#!">07-89-xx-xx-xx</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
                <div class="card-body text-center">
                    <i class="fas fa-key text-primary mb-2"></i>
                    <h4 class="text-uppercase m-0 text-black-50">Administration</h4>
                    <hr class="my-4"/>
                    
                    <?php
                    if (isset($_SESSION['login_admin'])){
                        ?>
                    <div class="small text-black-50"><a href="index.php?controleur=principal&action=afficherBoutique">Boutique</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherAdminCategories">Gestion des catégories</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherAdminProduits">Gestion des produits</a></div>
                    <!-- <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherAdminCommandes">Gestion des commandes</a></div> -->
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherAdminUtilisateurs">Gestion des utilisateurs</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherMesInfos">Mes informations</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=seDeconnecter">Déconnexion</a></div>
                        <?php
                    }
                    else if (isset($_SESSION['login_user'])){
                        ?>

                    <div class="small text-black-50"><a href="index.php?controleur=principal&action=afficherBoutique">Boutique</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=principal&action=afficherPanier">Panier</a></div>
                    <!-- <div class="small text-black-50"><a href="index.php?controleur=principal&action=afficherCommandes">Mes commandes</a></div> -->
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherMesInfos">Mes informations</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=seDeconnecter">Déconnexion</a></div>
                        <?php
                    }
                    else{
                        ?>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherIndexAdmin">Connexion</a></div>
                    <div class="small text-black-50"><a href="index.php?controleur=admin&action=afficherInscription">Inscription</a></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>