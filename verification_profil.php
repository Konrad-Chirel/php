<?php

include('model.php');
$sql = new model;

if(isset($_POST['update'])) {
    // Vérification du nom d'utilisateur
    if (!empty($_POST['username'])) {
        if (trim($_POST['username'] == "")) {
            $_SESSION['error_username'] = "Caractères alphanumériques uniquement";
        } else {
            $username = htmlspecialchars($_POST['username']);
        }
    } else {
        $_SESSION['error_username'] = "Le champ nom d'utilisateur est obligatoire";
    }

    // Vérification de l'ancien mot de passe
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    } else {
        $_SESSION['error_password'] = "Le champ ancien mot de passe est obligatoire";
    }

    // Vérification du nouveau mot de passe
    if (!empty($_POST['new_password'])) {
        $new_password = htmlspecialchars($_POST['new_password']);
    } else {
        $_SESSION['error_new_password'] = "Le champ nouveau mot de passe est obligatoire";
    }


    // Si toutes les vérifications sont passées, procéder à la mise à jour du profil
    if (isset($username, $password, $new_password) && $password === $_SESSION['password']) {
        // Votre logique de mise à jour de profil ici
        $profil_modifier = $sql->profil_modifier($username, $_SESSION['password'],$_SESSION['id']);

        // Si la modification du profil est réussie
        if ($profil_modifier) {
            // Affichage d'un message d'alerte JavaScript
            echo "<script>alert('Le profil a été modifié avec succès.');</script>";
            // Redirection vers app.php après 2 secondes
            echo "<script>window.setTimeout(function(){ window.location.href = 'app.php'; }, 0000);</script>";
            exit(); // Arrêt du script
        } else {
          
   
            // Si la modification du profil échoue
            // Affichage d'un message d'alerte JavaScript
            echo "<script>alert('Erreur lors de la modification du profil.');</script>";
            // Redirection vers profile.php après 2 secondes
            echo "<script>window.setTimeout(function(){ window.location.href = 'profile.php'; }, 0000);</script>";
            exit(); // Arrêt du script
        }
    } else {
        $error_passwords = "L'ancien mot de passe est incorrect";
        // Redirection vers la page profile.php si une vérification échoue
        header("Location: profile.php");
        exit();
    }
}

?>
