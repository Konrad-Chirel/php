<?php 
 include('model.php');
 $sql=new model;
 if (empty($_SESSION['id'])) {
     # code...
     header('location:login.php');
 }



 ?>

 
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Administrateur</title>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <!-- loader-->
	  <link href="assets/css/pace.min.css" rel="stylesheet">
	  <script src="assets/js/pace.min.js"></script>
    <!--Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <link href="assets/css/semi-dark-theme.css" rel="stylesheet">
    <link href="assets/css/minimal-theme.css" rel="stylesheet">
    <link href="assets/css/shadow-theme.css" rel="stylesheet">
     
  </head>
  <body>

    <!--start header-->
     <header class="top-header">
      <nav class="navbar navbar-expand justify-content-between">
          <div class="btn-toggle-menu">
            <span class="material-symbols-outlined">menu</span>
          </div>
         
            <ul class="navbar-nav top-right-menu gap-2">
             
              <li class="nav-item dark-mode">
                <a class="nav-link dark-mode-icon" href="javascript:;"><span class="material-symbols-outlined">dark_mode</span></a>
              </li>
              <li class="nav-item dropdown dropdown-large ">
              <a class="nav-link" href="profile.php"><i class="fa fa-user-circle  "></i></a>
               
              </li >

              <li class="nav-item dropdown dropdown-large">
                
              <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt fa-sm"></i></a>
                 
                        
                    
                   
              </li>








              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <div class="position-relative">
                    <span class="notify-badge">2</span>
                    <span class="material-symbols-outlined">
                      notifications_none
                      </span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                  <a href="javascript:;">
                    <div class="msg-header">
                      <p class="msg-header-title text-uppercase text-center"><strong><?php echo($_SESSION['username']); ?></strong></p>
                    
                    </div>
                  </a>
                  <div class="header-notifications-list">
                   
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="notify text-danger border">
                          <span class="material-symbols-outlined">
                            account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="msg-name">Profile</h5>
                    
                        </div>
                      </div>
                    </a>
                    
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="notify text-info border">
                          <span class="material-symbols-outlined">
                            logout
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h5 class="msg-name">Deconnexion</h5>
                          
                        </div>
                      </div>
                    </a>
                </div>
                  <a href="javascript:;">
                    <div class="text-center msg-footer">Fermer tout</div>
                  </a>
                </div>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="offcanvas" href="#ThemeCustomizer"><span class="material-symbols-outlined">
                 settings
                 </span></a>
              </li>
            </ul>
       </nav>
     </header>
     <!--end header-->


     <!--start sidebar-->
      <aside class="sidebar-wrapper">
          <div class="sidebar-header">
            <div class="logo-icon">
              <img src="assets/images/logo-icon.png" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
              <h5 class="mb-0">Roksyn</h5>
            </div>
            <div class="sidebar-close ">
              <span class="material-symbols-outlined">close</span>
            </div>
          </div>
          <div class="sidebar-nav" data-simplebar="true">
            
              <!--navigation-->
              <ul class="metismenu" id="menu">
                <li>
                  <a href="index.html">
                    <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                    </div>
                    <div class="menu-title">Dashboard</div>
                  </a>
                </li>
                <li>
                  <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                    </div>
                    <div class="menu-title">Menu</div>
                  </a>
                  <ul>
                    <li> <a href="app-emailbox.html"><span class="material-symbols-outlined">arrow_right</span>Gestoin des utilisateurs</a>
                    </li>
                    <li> <a href="app-chat-box.html"><span class="material-symbols-outlined">arrow_right</span>Attribuer un role</a>
                    </li>
                    <li> <a href="app-file-manager.html"><span class="material-symbols-outlined">arrow_right</span>Hstorique de connexion</a>
                    </li>
                    <li> <a href="app-contact-list.html"><span class="material-symbols-outlined">arrow_right</span>Contatcs</a>
                    </li>
                    <li> <a href="app-to-do.html"><span class="material-symbols-outlined">arrow_right</span>Todo List</a>
                    </li>
                    <li> <a href="app-invoice.html"><span class="material-symbols-outlined">arrow_right</span>Invoice</a>
                    </li>
                    <li> <a href="app-fullcalender.html"><span class="material-symbols-outlined">arrow_right</span>Calendar</a>
                    </li>
                  </ul>
                </li>
                <li class="menu-label">UI Elements</li>
                <li>
                  <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><span class="material-symbols-outlined">widgets</span>
                    </div>
                    <div class="menu-title">Widgets</div>
                  </a>
                  <ul>
                    <li> <a href="widget-data.html"><span class="material-symbols-outlined">arrow_right</span>Data Widget</a>
                    </li>
                    <li> <a href="widget-static.html"><span class="material-symbols-outlined">arrow_right</span>Widget Static</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <div class="menu-title">eCommerce</div>
                  </a>
                  <ul>
                    <li> <a href="ecommerce-add-product.html"><span class="material-symbols-outlined">arrow_right</span>Add Product</a>
                    </li>
                    <li> <a href="ecommerce-products.html"><span class="material-symbols-outlined">arrow_right</span>Products</a>
                    </li>
                    <li> <a href="ecommerce-customers.html"><span class="material-symbols-outlined">arrow_right</span>Customers</a>
                    </li>
                    <li> <a href="ecommerce-customer-details.html"><span class="material-symbols-outlined">arrow_right</span>Customer Details</a>
                    </li>
                    <li> <a href="ecommerce-orders.html"><span class="material-symbols-outlined">arrow_right</span>Orders</a>
                    </li>
                    <li> <a href="ecommerce-customer-details.html"><span class="material-symbols-outlined">arrow_right</span>Order Details</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">redeem</span>
                    </div>
                    <div class="menu-title">Components</div>
                  </a>
                  <ul>
                    <li> <a href="component-alerts.html"><span class="material-symbols-outlined">arrow_right</span>Alerts</a>
                    </li>
                    <li> <a href="component-accordions.html"><span class="material-symbols-outlined">arrow_right</span>Accordions</a>
                    </li>
                    <li> <a href="component-badges.html"><span class="material-symbols-outlined">arrow_right</span>Badges</a>
                    </li>
                    <li> <a href="component-buttons.html"><span class="material-symbols-outlined">arrow_right</span>Buttons</a>
                    </li>
                    <li> <a href="component-cards.html"><span class="material-symbols-outlined">arrow_right</span>Cards</a>
                    </li>
                    <li> <a href="component-lightbox.html"><span class="material-symbols-outlined">arrow_right</span>Lightbox</a>
                    </li>
                    <li> <a href="component-carousels.html"><span class="material-symbols-outlined">arrow_right</span>Carousels</a>
                    </li>
                    <li> <a href="component-list-groups.html"><span class="material-symbols-outlined">arrow_right</span>List Groups</a>
                    </li>
                    <li> <a href="component-media-object.html"><span class="material-symbols-outlined">arrow_right</span>Media Objects</a>
                    </li>
                    <li> <a href="component-modals.html"><span class="material-symbols-outlined">arrow_right</span>Modals</a>
                    </li>
                    <li> <a href="component-navs-tabs.html"><span class="material-symbols-outlined">arrow_right</span>Navs & Tabs</a>
                    </li>
                    <li> <a href="component-paginations.html"><span class="material-symbols-outlined">arrow_right</span>Pagination</a>
                    </li>
                    <li> <a href="component-popovers-tooltips.html"><span class="material-symbols-outlined">arrow_right</span>Popovers & Tooltips</a>
                    </li>
                    <li> <a href="component-progress-bars.html"><span class="material-symbols-outlined">arrow_right</span>Progress</a>
                    </li>
                    <li> <a href="component-spinners.html"><span class="material-symbols-outlined">arrow_right</span>Spinners</a>
                    </li>
                    <li> <a href="component-notifications.html"><span class="material-symbols-outlined">arrow_right</span>Notifications</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">add_reaction</span>
                    </div>
                    <div class="menu-title">Icons</div>
                  </a>
                  <ul>
                    <li> <a href="icons-line-icons.html"><span class="material-symbols-outlined">arrow_right</span>Line Icons</a>
                    </li>
                    <li> <a href="icons-boxicons.html"><span class="material-symbols-outlined">arrow_right</span>Boxicons</a>
                    </li>
                    <li> <a href="icons-feather-icons.html"><span class="material-symbols-outlined">arrow_right</span>Feather Icons</a>
                    </li>
                  </ul>
                </li>
                <li class="menu-label">Forms & Tables</li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">diamond</span>
                    </div>
                    <div class="menu-title">Forms</div>
                  </a>
                  <ul>
                    <li> <a href="form-elements.html"><span class="material-symbols-outlined">arrow_right</span>Form Elements</a>
                    </li>
                    <li> <a href="form-input-group.html"><span class="material-symbols-outlined">arrow_right</span>Input Groups</a>
                    </li>
                    <li> <a href="form-radios-and-checkboxes.html"><span class="material-symbols-outlined">arrow_right</span>Radios & Checkboxes</a>
                    </li>
                    <li> <a href="form-layouts.html"><span class="material-symbols-outlined">arrow_right</span>Forms Layouts</a>
                    </li>
                    <li> <a href="form-validations.html"><span class="material-symbols-outlined">arrow_right</span>Form Validation</a>
                    </li>
                    <li> <a href="form-wizard.html"><span class="material-symbols-outlined">arrow_right</span>Form Wizard</a>
                    </li>
                    <li> <a href="form-file-upload.html"><span class="material-symbols-outlined">arrow_right</span>File Upload</a>
                    </li>
                    <li> <a href="form-date-time-pickes.html"><span class="material-symbols-outlined">arrow_right</span>Date Pickers</a>
                    </li>
                    <li> <a href="form-select2.html"><span class="material-symbols-outlined">arrow_right</span>Select2</a>
                    </li>
                    <li> <a href="form-repeater.html"><span class="material-symbols-outlined">arrow_right</span>Form Repeater</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">backup_table</span>
                    </div>
                    <div class="menu-title">Tables</div>
                  </a>
                  <ul>
                    <li> <a href="table-basic-table.html"><span class="material-symbols-outlined">arrow_right</span>Basic Table</a>
                    </li>
                    <li> <a href="table-datatable.html"><span class="material-symbols-outlined">arrow_right</span>Data Table</a>
                    </li>
                  </ul>
                </li>
                <li class="menu-label">Pages</li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">lock_open</span>
                    </div>
                    <div class="menu-title">Authentication</div>
                  </a>
                  <ul>
                    <li><a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Basic</a>
                      <ul>
                        <li><a href="auth-basic-login.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Login</a></li>
                        <li><a href="auth-basic-register.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Register</a></li>
                        <li><a href="auth-basic-forgot-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Forgot Password</a></li>
                        <li><a href="auth-basic-reset-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Reset Password</a></li>
                      </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Cover</a>
                      <ul>
                        <li><a href="auth-cover-login.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Login</a></li>
                        <li><a href="auth-cover-reset-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Register</a></li>
                        <li><a href="auth-cover-forgot-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Forgot Password</a></li>
                        <li><a href="auth-cover-reset-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Reset Password</a></li>
                      </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Boxed</a>
                      <ul>
                        <li><a href="auth-boxed-login.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Login</a></li>
                        <li><a href="auth-boxed-register.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Register</a></li>
                        <li><a href="auth-boxed-forgot-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Forgot Password</a></li>
                        <li><a href="auth-boxed-reset-password.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Reset Password</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="user-profile.html">
                    <div class="parent-icon"><span class="material-symbols-outlined">account_circle</span>
                    </div>
                    <div class="menu-title">User Profile</div>
                  </a>
                </li>
                <li>
                  <a href="timeline.html">
                    <div class="parent-icon"><span class="material-symbols-outlined">hotel_class</span>
                    </div>
                    <div class="menu-title">Timeline</div>
                  </a>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">warning</span>
                    </div>
                    <div class="menu-title">Errors</div>
                  </a>
                  <ul>
                    <li> <a href="pages-error-403.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>403 Error</a>
                    </li>
                    <li> <a href="pages-error-404.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>404 Error</a>
                    </li>
                    <li> <a href="pages-error-500.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>500 Error</a>
                    </li>
                    <li> <a href="pages-coming-soon.html" target="_blank"><span class="material-symbols-outlined">arrow_right</span>Coming Soon</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="faq.html">
                    <div class="parent-icon"><span class="material-symbols-outlined">call</span>
                    </div>
                    <div class="menu-title">FAQ</div>
                  </a>
                </li>
                <li>
                  <a href="pricing-table.html">
                    <div class="parent-icon"><span class="material-symbols-outlined">currency_bitcoin</span>
                    </div>
                    <div class="menu-title">Pricing</div>
                  </a>
                </li>
                <li class="menu-label">Charts & Maps</li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">monitoring</span>
                    </div>
                    <div class="menu-title">Charts</div>
                  </a>
                  <ul>
                    <li> <a href="charts-apex.html"><span class="material-symbols-outlined">arrow_right</span>Apex</a>
                    </li>
                    <li> <a href="charts-chartjs.html"><span class="material-symbols-outlined">arrow_right</span>Chartjs</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">distance</span>
                    </div>
                    <div class="menu-title">Maps</div>
                  </a>
                  <ul>
                    <li> <a href="map-google-maps.html"><span class="material-symbols-outlined">arrow_right</span>Google Maps</a>
                    </li>
                    <li> <a href="map-vector-maps.html"><span class="material-symbols-outlined">arrow_right</span>Vector Maps</a>
                    </li>
                  </ul>
                </li>
                <li class="menu-label">Others</li>
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">toc</span>
                    </div>
                    <div class="menu-title">Menu Levels</div>
                  </a>
                  <ul>
                    <li> <a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Level One</a>
                      <ul>
                        <li> <a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Level Two</a>
                          <ul>
                            <li> <a href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Level Three</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">receipt_long</span>
                    </div>
                    <div class="menu-title">Documentation</div>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">shop</span>
                    </div>
                    <div class="menu-title">Support</div>
                  </a>
                </li>
              </ul>
              <!--end navigation-->
           

          </div>
          <div class="sidebar-bottom dropdown dropup-center dropup">
              <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                   <img src="assets/images/avatars/01.png" alt="">
                </div>
                <div class="user-info">
                  <h5 class="mb-0 user-name">Jhon Maxwell</h5>
                  <p class="mb-0 user-designation">UI Engineer</p>
                </div>
              </div>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  account_circle
                  </span><span>Profile</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  tune
                  </span><span>Settings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  dashboard
                  </span><span>Dashboard</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  account_balance
                  </span><span>Earnings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  cloud_download
                  </span><span>Downloads</span></a>
                </li>
                <li>
                  <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  logout
                  </span><span>Logout</span></a>
                </li>
              </ul>
          </div>
     </aside>
     <!--end sidebar-->


    <!--start main content-->
     <main class="page-content">
       <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Espace Administrateur</li>
							</ol>
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->

        <div class="card radius-10">
          <div class="card-header py-3">
               <div class="row align-items-center g-3">
                
                
               </div>
          </div>
        
             
         <div class="card-body">
    
          

        <!--end row-->

        
        <!-- begin invoice-note -->
        <div class="my-3 h2 text-center  align-items-center gap-3 justify-content-center mb-0">
         Bienvenue sur votre page d'accueil M./Mme 
        </div>
      <!-- end invoice-note -->
         </div>

         <div class="card-footer py-3 bg-transparent">
             <p class="text-center mb-2">
              
             
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

    <!--BS Scripts-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>