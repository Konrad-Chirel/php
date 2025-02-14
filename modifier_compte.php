<?php 
include('model.php');
$sql=new model;
if (empty($_SESSION['id'])) {
    # code...
    header('location:login.php');
}
$_SESSION['modif_username'] = "";
$_SESSION['modif_password'] = "";
if(isset($_GET['mod']) && !empty($_GET['mod']) ){
    $_SESSION['mod']=$_GET['mod'];
    $un_utilisateur= $sql->un_utilisateur($_SESSION['mod']);
    while ($un_utilisateurs = $un_utilisateur->fetch()) {
        $_SESSION['modif_username'] = $un_utilisateurs['username'];
        $_SESSION['modif_password'] = $un_utilisateurs['password'];
       
    }
}
require('verification_compte.php');


?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de modification du compte</title>

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
     
  </head>
  <body>


    <!--authentication-->

     <div class="container my-5">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
            <div class="card border-3">
              <div class="card-body p-5">
                  <img src="assets/images/logo-icon.png" class="mb-4" width="45" alt="">
                  <h4 class="fw-bold">Genrate New Password</h4>
                  <p class="mb-0">We received your reset password request. Please enter your new password!</p>
                  <div class="form-body mt-4">
                     <!-- Affichage des messages d'erreur et de succès spécifiques -->
                     <?php if (!empty($_SESSION['error_message']) && !empty($_SESSION['error_type'])): ?>
                      <div class="alert <?php echo $_SESSION['error_type']; ?>" role="alert">
                        <?php echo $_SESSION['error_message']; ?>
                      </div>
                   
                    <?php endif; ?>
                    <!-- Fin de l'affichage des messages -->
										<form class="row g-3"enctype="multipart/form-data" method="post">
											<div class="col-12">
												<label class="form-label">Nom d'utilisateur</label>
												<input type="text" name="username" class="form-control" value="<?php echo($_SESSION['modif_username']); ?>" placeholder="username">
											</div>
                      <div class="col-12">
                        <label class="form-label" >Mot de passe</label>
                        <input type="password" name="password" value="<?php echo($_SESSION['modif_password']); ?>" class="form-control" placeholder="password">
                      </div>
											<div class="col-12">
												<div class="d-grid gap-2">
                            <input type="submit" name="update" class="btn btn-primary" value="Modifier"/>
                           <a href="gestion_compte.php" class="btn btn-light">Back </a>
                        </div>
											</div>
										</form>
									</div>

              </div>
            </div>
           </div>
        </div><!--end row-->
     </div>
      
    <!--authentication-->




    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bi-eye-slash-fill");
            $('#show_hide_password i').removeClass("bi-eye-fill");
          } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bi-eye-slash-fill");
            $('#show_hide_password i').addClass("bi-eye-fill");
          }
        });
      });
    </script>
  
  </body>
</html>