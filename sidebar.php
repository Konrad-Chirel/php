<div class="sidebar-nav pt-4"  data-simplebar="true" >
            
            <!--navigation-->
            <ul class="metismenu" id="menu">
              <li>
                <a href="app.php">
                  <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                  </div>
                  <div class="menu-title">Accueil</div>
                </a>
              </li>
              <li >
                <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                  </div>
                  <div class="menu-title">Menu</div>
                </a>
                <ul>
                <?php
                                        $getRolesAdministrateur=$sql->getRolesAdministrateur($_SESSION['id']);
                                        while ($getRolesAdministrateurs = $getRolesAdministrateur->fetch()) {
                                            # code...
                                            echo('
                                                <li><a href="'.$getRolesAdministrateurs['page'].'">'.$getRolesAdministrateurs['intituler'].'</a></li>
                                            ');
                                        }
                                    ?> 
                 
                </ul>
              </li>
             <!--end navigation-->
             <li>
                <a href="profile.php">
                  <div class="parent-icon"><span class="material-symbols-outlined">account_circle</span>
                  </div>
                  <div class="menu-title">Profil</div>
                </a>
              </li>
              <li>
                <a href="logout.php">
                  <div class="parent-icon"><span class="material-symbols-outlined">logout</span>
                  </div>
                  <div class="menu-title">Déconnexion</div>
                </a>
              </li>
             
</aside>
   <!--end sidebar-->