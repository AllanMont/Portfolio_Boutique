        <nav class="navbar navbar-expand-lg navbar-light fixed-top about-" id="mainNav">
            <div class="container">
                <?php
                    if (isset($_SESSION['login_admin'])){
                        echo('<a class="navbar-brand js-scroll-trigger nav-link" href="#page-top"> Bienvenue '.$_SESSION['login_admin'].'</a>');
                    }
                    elseif (isset($_SESSION['login_user'])){
                        echo('<a class="navbar-brand js-scroll-trigger nav-link" href="#page-top"> Bienvenue '.$_SESSION['login_user'].'</a>');
                    }
                    else{
                        echo('<a class="navbar-brand js-scroll-trigger nav-link" href="#page-top">Boutique</a>');
                    }
                ?>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php
                    if(isset($_GET['action'])){
                        $action = $_GET['action'];
                        if ($action == 'afficherPanier'){
                            echo('<li class="nav-item">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherBoutique">Boutique</a></li>
                            </li>');
                        }
                        else if($action == 'afficherBoutique'){
                            if(isset($_SESSION['login_admin']) || isset($_SESSION['login_user'])){
                                echo('<li class="nav-item">
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherPanier">Panier</a></li>
                                </li>');
                            }
                            else{
                                echo('<li class="nav-item">
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=admin&action=afficherIndexAdmin">Connexion</a></li>
                                </li>');
                            }
                        }
                        else{
                            echo('<li class="nav-item">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherBoutique">Boutique</a></li>
                            </li>');
                            if(isset($_SESSION['login_admin']) || isset($_SESSION['login_user'])){
                            echo('<li class="nav-item">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherPanier">Panier</a></li>
                            </li>');
                            }
                        }
                    }
                    else{
                        echo('<li class="nav-item">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherBoutique">Boutique</a></li>
                        </li>');
                        if(isset($_SESSION['login_admin']) || isset($_SESSION['login_user'])){
                        echo('<li class="nav-item">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?controleur=principal&action=afficherPanier">Panier</a></li>
                        </li>');
                        }
                    }

                    ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Portfolio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>