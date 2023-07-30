<header class="masthead" >
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Connexion</h1>
        </div>
    </div>
</header>
<center>
    <section class="page-section about-sectionlm w" >
        <div style="width: 90%;padding-left:10px;padding-right:10px;    padding-top:10px; padding-bottom:10px;border: 3px solid black;border-radius: 50px;background: rgba(18, 70, 63 , .4);text-align:center">

            <section>
                <div class="titre">
                    Administration du site (Accès réservé)
                </div>
                <form method="POST" action="index.php?controleur=admin&action=verifierConnexion">
                    <fieldset>
                        <legend>Identification</legend>

                        <label for="login">Votre login :</label> <input type="text" name="login" id="login" /> <br/>
                        <label for="passe">Votre mot de passe :</label><input type="password" name="passe" id="passe" /><br/>
                        <input type="checkbox" name="connexion_auto" id="connexion_auto" /><label for="connexion_auto" class="enligne"> Connexion automatique </label><br/>

                        <input type="submit" value="Connexion" />
                        </legend>
                    </fieldset>
                </form>
            </section>
        </div>