                        <?php
//Config MYSQL
                        $utilisateur = "";
                        $passe = "";
                        $serveur = "localhost";
                        $base = "tpjqueryajax";
//Connexion à la base
                        try {
                            $pdoCnxBase = new PDO('mysql:host=' . $serveur . ';dbname=' . $base, $utilisateur, $passe);
                            $pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $pdoCnxBase->query("SET CHARACTER SET utf8");
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        ?>