<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Envoi d'un message par formulaire</title>
</head>

<body>
    <?php

    $retour = mail('allan.mont34@gmail.com', $_POST['Subject'], $_POST['Message'], "From: ". $_POST['Email']);
    if ($retour){
        mail('allan.mont34@gmail.com', $_POST['Subject'], $_POST['Message'], "From: ". $_POST['Email']);
        echo '<p>Votre message a bien été envoyé.</p>';
    }

    ?>
</body>
</html>