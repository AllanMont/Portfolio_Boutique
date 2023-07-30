<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center" id="lm">
            <h1 class="mx-auto my-0 text-uppercase">Inscription</h1>
        </div>
    </div>
</header>
<center>
    <section class="page-section about-sectionlm w">
        <div
            style="width: 90%;padding-left:10px;padding-right:10px;    padding-top:10px; padding-bottom:10px;border: 3px solid black;border-radius: 50px;background: rgba(18, 70, 63 , .4);text-align:center">

            <section>
                <div class="titre" style="padding-bottom:25px;">
                    <h2>
                        Création de votre compte
                    </h2>
                </div>
                <form method="POST" action="index.php?controleur=admin&action=inscriptionUser">
                    <fieldset>
                        <table style="  margin-left: auto; margin-right: auto;">
                            <!-- login -->
                            <tr>
                                <td>
                                    <label for="login">Votre login :</label>
                                </td>
                                <td>
                                    <input type="text" name="login" id="login" />
                                    <br />
                                </td>
                            </tr>
                            <!-- email -->
                            <tr>
                                <td>
                                    <label for="email">Votre mail :</label>
                                </td>
                                <td>
                                    <input type="email" name="email" id="email" /> <br />
                                </td>
                            </tr>
                            <!-- mot de passe -->
                            <tr>
                                <td>
                                    <label for="passe">Votre mot de passe :</label>
                                </td>
                                <td>
                                    <input type="password" name="passe" id="passe" /><br />
                                </td>
                            </tr>
                            <!-- code secret -->
                            <tr>
                                <td>
                                    <label for="isAdmin">Code Secret :</label>

                                <td>
                                    <input type="password" name="isAdmin" id="isAdmin" /> <br />
                                </td>
                            </tr>
                            <!-- Submit Inscription -->
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Inscription" />
                                </td>
                            </tr>
                        </table>
                        </legend>
                    </fieldset>
                </form>
                
            <?php
                if(isset($_GET['erreurlogin'])&& isset($_GET['erreuremail'])){
                    echo '<p style="color:red;">Login et mail déjà utilisé</p>';
                }
                elseif(isset($_GET['erreurlogin'])){
                    echo '<p style="color:red;">Login déjà utilisé</p>';
                }
                elseif(isset($_GET['erreuremail'])){
                    echo '<p style="color:red;">Email déjà utilisé</p>';
                }
            ?>
            </section>
        </div>