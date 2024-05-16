<?php

    include('model.php');
    $sql=new model;
    if (empty($_SESSION['id'])) {
	
        header('location:login.php');
    }
    if (isset($_GET['utm']) && !empty($_GET['utm']) ) {
        # code...
        $_SESSION['user_id'] = $_GET['utm'];

        
    }
    if (isset($_POST['compte_admin'])) {
      
        $role_compte_admin=$_POST['role_compte_admin'];
                    # supprimer les anciens roles avant ajout
                    $role_compte_admin_user_del=$sql->role_compte_admin_user_del($_SESSION['user_id']);
        for ($i=0; $i < sizeof($role_compte_admin) ; $i++) { 
            $role_compte_admin_add=$sql->role_compte_admin_add($_SESSION['user_id'], $role_compte_admin[$i]);
        }
        $error_message = "Rôles attribués."; // Définir le message d'alerte
    }
    //recuperer roles du user pour compte_admin
    $role_compte_admin_user_liste=$sql->role_compte_admin_user_liste($_SESSION['user_id']);
    $role_compte_admin_user_listes = $role_compte_admin_user_liste->fetchAll();
    $configurations_compte_admin = [];
    foreach ($role_compte_admin_user_listes as $key_compte_admin => $value_compte_admin) {
        $configurations_compte_admin[] = $value_compte_admin[0];
    }

?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roksyn - Bootstrap 5 Admin Template</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>
    <!--Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <link href="assets/css/semi-dark-theme.css" rel="stylesheet">
    <link href="assets/css/minimal-theme.css" rel="stylesheet">
    <link href="assets/css/shadow-theme.css" rel="stylesheet">
     
  </head>
  <body>

  <?php require_once('header.php'); ?>
     <!--start sidebar-->
      <aside class="sidebar-wrapper">
          <div class="sidebar-header">
            <div class="logo-icon">
              <img src="assets/images/logo-icon.png" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
              <h5 class="mb-0"> <?= $_SESSION['username'] ?> </h5>
            </div>
            <div class="sidebar-close ">
              <span class="material-symbols-outlined">close</span>
            </div>
          </div>
         <?php require_once('sidebar.php'); ?>


    <!--start main content-->
     <main class="page-content">
        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> Gestion  des comptes administrateurs</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
           <div class="container-fluid ">
           <?php if (isset($error_message) && !empty($error_message)) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $error_message; ?>
    </div>
    <script>
        // Code JavaScript pour faire disparaître l'alerte après 5 secondes
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000); // 5000 millisecondes = 5 secondes
    </script>
<?php endif; ?>


           <div class="row align-items-center">
                <div class="col-md-6 ">
           
                </div>
               
            </div>


               
				<hr>
				<div class="card">
                    
                <form action="" method="post">
                <div class="card-header">
                                    <h6 class="card-title mt-2">Gestion des comptes administrateur</h6>
                                </div>
					<div class="card-body">
						
                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <h6 class="mt-4">Veuillez appuyer l'interrupteur en laisant la couleur bleue active devant les différents droits que vous souhaitez attribuer à cet utilisateur</h6>
                                            <?php
                                            $roles_compte_admin_liste=$sql->roles_compte_admin_liste();
                                            while ($roles_compte_admin_listes = $roles_compte_admin_liste->fetch()) {
                                                echo('
                                                    <div class="form-check form-switch">
 <input class="form-check-input"' . ( in_array($roles_compte_admin_listes['id'], $configurations_compte_admin) ? 'checked' : null ) . ' name="role_compte_admin[]" value="'.$roles_compte_admin_listes['id'].'" type="checkbox" id="flexSwitchCheckDefault" />
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">'.$roles_compte_admin_listes['intituler'].'</label>
                                                    </div>
                                                ');
                                            }
                                            ?>

                                        </div>
                                    </div>
						</div>
                        <div class="text-center">

<input type="submit" name="compte_admin" class="btn btn-primary" value="Attribuer"> 
</div>
</form></br>
					</div>
				</div>
			

				
						</div>
					</div>
				</div>

     </main>
     <!--end main content-->
 

    <!--start overlay-->
      <div class="overlay btn-toggle-menu"></div>
    <!--end overlay-->

    <!-- Search Modal -->
    <div class="modal" id="exampleModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header gap-2">
            <div class="position-relative popup-search w-100">
              <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
              <span class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>
            <button type="button" class="btn-close d-xl-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="search-list">
                 <p class="mb-1">Html Templates</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2"><i class="bi bi-filetype-html fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-award fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-box2-heart fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-camera-video fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Web Designe Company</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-chat-right-text fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cloud-arrow-down fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-columns-gap fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-collection-play fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Software Development</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cup-hot fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-droplet fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-exclamation-triangle fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-eye fs-5"></i>eCommerce Html Templates</a>
                 </div>
                 <p class="mb-1 mt-3">Online Shoping Portals</p>
                 <div class="list-group">
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-facebook fs-5"></i>Best Html Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-flower2 fs-5"></i>Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-geo-alt fs-5"></i>Responsive Html5 Templates</a>
                    <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-github fs-5"></i>eCommerce Html Templates</a>
                 </div>
              </div>
          </div>
        </div>
      </div>
    </div>


    <!--start theme customization-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="ThemeCustomizer" aria-labelledby="ThemeCustomizerLable">
		<div class="offcanvas-header border-bottom">
		  <h5 class="offcanvas-title" id="ThemeCustomizerLable">Theme Customizer</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
		  <h6 class="mb-0">Theme Variation</h6>
		  <hr>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
			<label class="form-check-label" for="LightTheme">Light</label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2" checked="">
			<label class="form-check-label" for="DarkTheme">Dark</label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
			<label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
		  </div>
		  <hr>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
			<label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
		  </div>
		  <div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="ShadowTheme" value="option4">
			<label class="form-check-label" for="ShadowTheme">Shadow Theme</label>
		  </div>
		 
		</div>
	  </div>
	  <!--end theme customization-->

   <!--plugins-->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
   <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
   <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
   <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
   <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	 <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	 </script>
	 <script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	 </script>

    <!--BS Scripts-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>