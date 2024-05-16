<?php 
require('model.php');
$sql = new model;
$error_message = "";

if (isset($_POST['login'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = "Veuillez remplir tous les champs.";
    } else {
        $login = $sql->login($_POST['username'], $_POST['password']);
        if ($login->rowCount() > 0) {
            $logins = $login->fetch();
            $_SESSION['id'] = $logins['id'];
            $_SESSION['username'] = $logins['username'];
            $_SESSION['password'] = $logins['password'];
            $_SESSION['visible'] = $logins['visible'];
            
            if ($_SESSION['visible'] == 1) {
                $in_out="Connexion";
                $historique_connexion = $sql->historique_connexion($in_out, $_SESSION['id']);
                if ($historique_connexion) {
                    header('location:app.php');
                }
            } else {
                $error_message = "Votre compte a été désactivé. Veuillez contacter le service d'administration.";
            }
        } else {
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>




<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Page d'accueil</title>

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

  <div class="mx-3 mx-lg-0">
 
  <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-3">
  <?php if (!empty($error_message)): ?>
    <div id="errorAlert" class="alert alert-danger <?php echo $error_type; ?> alert-dismissible fade show" role="alert">
    <?php echo $error_message; ?>
</div>
      <?php endif; ?>
      <script>
    // Sélectionnez l'élément de l'alerte
    var errorAlert = document.getElementById('errorAlert');

    // Fermez automatiquement l'alerte après 5 secondes
    setTimeout(function(){
        errorAlert.classList.add('fadeOut');
        setTimeout(function(){
            errorAlert.style.display = 'none';
        }, 1000); // Délai supplémentaire pour la transition de fadeOut
    }, 5000); // 5000 millisecondes = 5 secondes
</script>
  <div class="row g-3">







      <div class="col-lg-6 d-flex">
        <div class="card-body p-5 w-100">
          <img src="assets/images/logo-icon.png" class="mb-4" width="45" alt="">
          <h4 class="fw-bold">Get Started Now</h4>
          <p class="mb-0">Enter your credentials to login your account</p>
         
          
          <div class="form-body mt-4">
            <form action="" method="POST"  class="row g-3">
            <div class="form-floating mb-1">
                <input type="text" name ="username" class="form-control" placeholder="Gladys">
                <label>Nom d'utilisateur</label>
                </div>
                <div class="form-floating">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <label>Mot de passe</label>
                </div>
              <div class="col-md-6">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                </div>
              </div>
              <div class="col-md-6 text-end"> <a href="auth-boxed-forgot-password.html">Forgot Password ?</a>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
              </div>
             
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-lg-flex d-none">
        <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center border-3 bg-primary">
          <img src="assets/images/boxed-login.png" class="img-fluid" alt="">
        </div>
      </div>

    </div><!--end row-->
  </div>

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