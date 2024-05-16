<?php


include('model.php');
$sql = new model;

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (empty($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de modification du Profil</title>
    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <!--Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <script>
        // Fonction pour masquer les messages d'erreur après 5 secondes
        function hideErrorMessage() {
            var errorMessages = document.querySelectorAll('.alert-danger');
            errorMessages.forEach(function(errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000); // Masquer après 5 secondes
            });
        }
        // Appel de la fonction lors du chargement de la page
        window.onload = function() {
            hideErrorMessage();
        };
    </script>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card border-3">
                    <div class="card-body p-5">
                    <?php 
                            if(isset($_SESSION['err_password'])) {
                              echo '<div class="alert alert-danger" role="alert">' . $_SESSION['err_password'] . '</div>';
                              $_SESSION['err_passwords'] = null; // Remplace unset
                          }
                           ?>
                        <img src="assets/images/logo-icon.png" class="mb-4" width="45" alt="">

                        <h4 class="fw-bold">Générer un nouveau mot de passe</h4>
                        <p class="mb-0">Nous avons reçu votre demande de réinitialisation de mot de passe. Veuillez entrer votre nouveau mot de passe !</p>
                        <div class="form-body mt-4">
                            <!-- Affichage des messages d'erreur -->
                           <?php 
                            if(isset($_SESSION['error_username'])) {
                              echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_username'] . '</div>';
                              $_SESSION['error_username'] = null; // Remplace unset
                          }
                           ?>
                           
                         
                            <form class="row g-3" enctype="multipart/form-data" method="post" action="verification_profil.php">
                                <div class="col-12">
                                    <label class="form-label">Nom d'utilisateur</label>
                                    <input type="text" name="username" class="form-control" value="<?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '' ?>" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="col-12">
                               <?php 
                                if(isset($_SESSION['error_password'])) {
                                  echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_password'] . '</div>';
                                  $_SESSION['error_password'] = null; // Remplace unset
                              }
                               ?>
                               
                                    <label class="form-label">Ancien mot de passe</label>
                                    <input type="password" name="password" class="form-control" placeholder="Ancien mot de passe">
                                </div>
                                <div class="col-12">
                               <?php 
                              if(isset($_SESSION['error_new_password'])) {
                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_new_password'] . '</div>';
                                $_SESSION['error_new_password'] = null; // Remplace unset
                            }
                               ?>
                       
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input type="password" name="new_password" class="form-control" placeholder="Nouveau mot de passe">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <input type="submit" name="update" class="btn btn-primary" value="Modifier">
                                        <a href="app.php" class="btn btn-light">Retour</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
