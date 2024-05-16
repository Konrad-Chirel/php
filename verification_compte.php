<?php


$error_message = ""; // Variable pour stocker les messages d'erreur
$error_type = ""; // Variable pour stocker le type d'erreur

if (isset($_GET['bloquer']) && !empty($_GET['bloquer'])) {
    $_SESSION['id_bloque'] = $_GET['bloquer'];
    $bloquer_compte = $sql->bloquer_compte_rh(0, $_SESSION['id_bloque']);
    if ($bloquer_compte) {
        $error_message = "Ce compte a été bloqué.";
        $error_type = "alert-danger";
    } else {
        $error_message = "Erreur lors du blocage du compte.";
        $error_type = "alert-danger";
    }
}

if (isset($_GET['debloquer']) && !empty($_GET['debloquer'])) {
    $_SESSION['id_debloque'] = $_GET['debloquer'];
    $debloquer = $sql->debloquer_compte_rh(1, $_SESSION['id_debloque']);
    if ($debloquer) {
        $error_message = "Ce compte a été débloqué.";
        $error_type = "alert-success";
    } else {
        $error_message = "Erreur lors du déblocage du compte.";
        $error_type = "alert-danger";
    }
}

//Ajout
if (isset($_POST['add'])) {
    // Vérification nom d'utilisateur
    if (!empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
    } else {
        $error_message = "Le champ nom d'utilisateur est obligatoire.";
        $error_type = "alert-danger";
    }

    // Vérification mot de passe
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    } else {
        $error_message = "Le champ mot de passe est obligatoire.";
        $error_type = "alert-danger";
    }

    if (!empty($username) && !empty($password)) {
        $ajout_compte_utilisateur = $sql->compte_utilisateur_ajouter($username, $password);
        if ($ajout_compte_utilisateur) {
            $error_message = "Un nouveau compte vient d'être ajouté.";
            $error_type = "alert-success";
        } else {
            $error_message = "Erreur lors de l'ajout du compte.";
            $error_type = "alert-danger";
        }
    }
}

// Fin ajout

// Modification
if (isset($_POST['update'])) {
    // Vérification nom d'utilisateur
    if (!empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
    } else {
        $error_message = "Le champ nom d'utilisateur est obligatoire.";
        $error_type = "alert-danger";
    }

    // Vérification mot de passe
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    } else {
        $error_message = "Le champ mot de passe est obligatoire.";
        $error_type = "alert-danger";
    }

    if (!empty($username) && !empty($password)) {
        $compte_utilisateur_modifier = $sql->compte_utilisateur_modifier($username, $password, $_SESSION['mod']);
        if ($compte_utilisateur_modifier) {
            $error_message = "Le compte a été modifié avec succès.";
            $error_type = "alert-success";
            // Affichage de l'alerte JavaScript
            echo "<script>alert('$error_message');</script>";
            // Redirection après 2 secondes
            echo "<script>window.setTimeout(function(){ window.location.href = 'gestion_compte.php'; }, 0000);</script>";
            exit(); // Terminer le script
        } else {
            $error_message = "Erreur lors de la modification du compte.";
            $error_type = "alert-danger";
            // Affichage de l'alerte JavaScript
            echo "<script>alert('$error_message');</script>";
        }
    }
}

// Stocker le message d'erreur et son type dans la session
$_SESSION['error_message'] = $error_message;
$_SESSION['error_type'] = $error_type;
?>
