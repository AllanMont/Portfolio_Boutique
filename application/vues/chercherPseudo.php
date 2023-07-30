<?php
                        require_once MODELES . 'connexionBase.php';
// Récupération du pseudo posté
                        $pseudoSaisi = $_POST['pseudo'];
// Recherche du pseudo dans la base (nombre de tuples renvoyés)
                        $requete = "select count(*) as nbResultats from tpseudos where pseudo like
'" . $pseudoSaisi . "'";
                        $pdoStResults = $pdoCnxBase->prepare($requete);
                        $pdoStResults->execute();
                        $resultat = $pdoStResults->fetch(PDO::FETCH_OBJ);
// Fermeture de la base
                        $pdoStResults->closeCursor();
//Affichage du résultat (traité par le code du formulaire : va renseigner le
//paramètre reponse de mon success)
                        echo $resultat->nbResultats;
                        ?>
?>