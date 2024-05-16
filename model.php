<?php
session_start();

class model{
        private function access(){
      
            $db=new PDO('mysql:host=localhost;dbname=auth','root','');
          return $db;
        }
 
 /**
 * 
 *  Roles,Gestion users,historique de connexion
 * cette fonction me recupère toutes les informations relatives au nom d'utilisateur et au mot de passe
 *  que j'aurais renseigné si ce nom d'utilisateur et ce mot de passe correspondent a ceux de la base de données
 *en gros cela fait une verification du mot de passe et du nom d'utilisateur que tu as rentré en paramètres
 */
         public function login($username, $password){
            $db=$this->access();
            try{
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $requestLogin=$db->prepare('SELECT * FROM admin WHERE username=? AND password =?');
                $requestLogin->execute(array($username, $password));
                return $requestLogin;
                }
                catch(PDOException $e){

                echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        } 
        //historique connexion:Cette fonction enregistre l'historique des connexions.
        // Elle prend deux paramètres : $in_out (indiquant l'entrée ou la sortie:connexion ou deconnexion) et
        // $admin (identifiant de l'administrateur). 
        //Elle insère ces informations dans la table "historique_connexion". 
        //En cas d'erreur, elle affiche une alerte.
        public function historique_connexion($in_out, $admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $historique_connexion=$db->prepare('INSERT INTO historique_connexion (in_out, admin) VALUES(?,?)');
            $historique_connexion->execute(array($in_out, $admin));
            return $historique_connexion;
            }
            catch(PDOException $e){

            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
/*Cette fonction récupère la liste de l'historique des connexions avec les noms d'utilisateurs
correspondants. Elle effectue une requête SQL pour récupérer les données de la table "historique_connexion"
 et de la table "admin" en utilisant une jointure entre les deux tables par les identifiants associés.*/
        public function historique_connexion_liste(){
            $db=$this->access();
            try{
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $historique_connexion_liste=$db->prepare('SELECT admin.id, admin.username, in_out, historique_connexion.date FROM historique_connexion, admin WHERE historique_connexion.admin = admin.id ');
                $historique_connexion_liste->execute(array());
                return $historique_connexion_liste;
            }
            catch(PDOException $e){
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
/*Cette fonction récupère la liste des administrateurs à partir de la table "admin".*/ 
        public function admin_liste(){
            $db=$this->access();
            try{
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $admin_liste=$db->prepare('SELECT * FROM admin');
                $admin_liste->execute(array());
                return $admin_liste;
                }
                catch(PDOException $e){

                echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }

       
//Cette fonction ajoute une relation entre un administrateur et un compte administrateur(attribue des roles) dans la table "gestion_roles".        
//Le compte_admin represente le role du compte : Il ya trois roles 1,2et 3 associés a chaque admin.
//Donc je selectionne un role il l'ajoute a ma table gestion_role en plus de l'identifiant du compte associé  
         public function role_compte_admin_add($admin, $compte_admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_add=$db->prepare('INSERT INTO gestion_roles (admin, compte_admin) VALUES(?,?)');
            $role_compte_admin_add->execute(array($admin, $compte_admin));
            return $role_compte_admin_add;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
/*Recupere la listes des roles associes a l'identiant du compte entré en paramètre*/         
        public function role_compte_admin_user_liste($admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_user_liste=$db->prepare('SELECT compte_admin FROM gestion_roles WHERE admin=?');
            $role_compte_admin_user_liste->execute(array($admin));
            return $role_compte_admin_user_liste;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
/** Retire des enregistrements de la table 'gestion_roles'.Seuls les enregistrements ayant la valeur de la colonne 
 * 'admin' égal a celle fournie dans la variable '$admin' et ou la colonne 'compte_admin' n'est pas nulle seront supprimés */        
        public function role_compte_admin_user_del($admin){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $role_compte_admin_user_del=$db->prepare('DELETE FROM gestion_roles WHERE admin=? AND compte_admin IS NOT NULL');
            $role_compte_admin_user_del->execute(array($admin));
            return $role_compte_admin_user_del;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
      


 
        
        
         //liste du module compte_admin
/**Cette fonction récupère la liste des rôles disponibles pour les comptes administrateurs à partir de la table "roles_compte_admin". */         
        public function roles_compte_admin_liste(){
            $db=$this->access();
           try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $roles_compte_admin_liste=$db->prepare('SELECT * FROM roles_compte_admin WHERE visible = ?');
            $roles_compte_admin_liste->execute(array(1));
            return $roles_compte_admin_liste;
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }
        
      

                  //utilisateur
/**Cette fonction récupère la liste des utilisateurs depuis la table "admin". */                  
      
  public function utilisateur(){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $utilisateur=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin');
    $utilisateur->execute(array());
    return $utilisateur;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

/**Cette fonction récupère les informations d'un utilisateur spécifique en utilisant son identifiant */    
        public function un_utilisateur($id){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $un_utilisateur=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin WHERE admin.id = ?');
           $un_utilisateur->execute(array($id));
            return $un_utilisateur;
            }
            catch(PDOException $e){

            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }


/**Selectionne tous les informations relatives au nom d'utilisteur entré.Grace a la fonction rowcount et 'if' on verifie 
 * le nombre de resultats retournés par cette requete.Si ele nombre de resultats est nul alors on ajoute le nom
 * d'utilisateur et le mot de passe .Sinon ca veut dire que le nom d'utilisateur est deja utilisée et on affiche
 * le message "cenom d'utilisateur est deja pris
 */
        public function compte_utilisateur_ajouter($username,$password){
            $db=$this->access();
            try{
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //unicité
            $id_unique=$db->prepare('SELECT * FROM admin WHERE username=?');
            $id_unique->execute(array($username));
        
            $result_id_unique = $id_unique->rowCount();
            if($result_id_unique == 0){
                //ajout du compte
                $ajout_compte_utilisateur = $db->prepare('INSERT INTO admin (username, password) VALUES(?,?)');
                $ajout_compte_utilisateur->execute(array($username,$password));
                return $ajout_compte_utilisateur;
            }else {
                # code...
                echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
            }
            
            }
            catch(PDOException $e){
        
            echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
            }
        }


/**Verifie si le nom d'utilisateur spécifié existe deja dans la base de données a l'exception de l'id fourni(qui represente mon id d'utilisateur)
 * ('id <> ?') .donc prend en cmpte les noms d'utilisateurs existant d'autres personnes.Me donne la possibilité
 * de garder le meme nom et le meme mot de passe ou de  modifier mon nom de maniere unique et mon mot de passe
 * Si aucun resultat n'est trouvé cela signifie que le nom d'utilisateur est unique et la requete 
 * UPDATE est utilisée pour modifier l'utilisateur avec les nouvelles valeurs. 
  */
     public function compte_utilisateur_modifier($username,$password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //unicité
    $id_unique=$db->prepare('SELECT * FROM admin WHERE username=? AND id <> ?');
    $id_unique->execute(array($username,$id));

    $result_id_unique = $id_unique->rowCount();
    if($result_id_unique == 0){
        //modification du compte
        $compte_utilisateur_modifier = $db->prepare('UPDATE admin SET username=?, password=? WHERE id=?');
        $compte_utilisateur_modifier->execute(array($username,$password,$id));
        return $compte_utilisateur_modifier;
    }else {
        # code...
        echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
    }
    
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

  
    //Bloquer un compte:Ces fonctions modifient l'état de visibilité d'un compte administrateur en fonction des paramètres passés
    public function bloquer_compte_rh($actif,$slug){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bloquer_compte=$db->prepare('UPDATE admin SET visible=? WHERE id=?');
    $bloquer_compte->execute(array($actif, $slug));
    return $bloquer_compte;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

    //Debloquer un compte:Ces fonctions modifient l'état de visibilité d'un compte administrateur en fonction des paramètres passés
    public function debloquer_compte_rh($actif,$slug){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $debloquer_compte=$db->prepare('UPDATE admin SET visible=? WHERE id=?');
    $debloquer_compte->execute(array($actif, $slug));
    return $debloquer_compte;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

// fin utilisateur

// modification de profil
public function profil_modifier($username,$new_password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //unicité
    $id_unique=$db->prepare('SELECT * FROM admin WHERE username=? AND id <> ?');
    $id_unique->execute(array($username,$id));

    $result_id_unique = $id_unique->rowCount();
    if($result_id_unique == 0){
        $profil_modifier = $db->prepare('UPDATE admin SET username=?, password=? WHERE id=?');
        $profil_modifier->execute(array($username,$new_password,$id));
        return $profil_modifier;
    }else {
        # code...
        echo "<script>alert(\"Ce nom d'utilisateur existe déjà  .\")</script>";  
    }
    
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}
/** la récupération des informations d'un profil spécifique,  */
public function un_profil($id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $un_profil=$db->prepare('SELECT admin.username, admin.date, admin.id, admin.password, admin.visible FROM admin WHERE admin.id = ?');
   $un_profil->execute(array($id));
    return $un_profil;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}

/**Verifie un mot de passe .si en selectionnant le mot de passe et l'id et que cela renvoie un resultat alors le mot de passe est verifié */
public function verif_mdp($new_password,$id){
    $db=$this->access();
    try{
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $verif_mdp=$db->prepare('SELECT admin.* FROM admin WHERE password=? AND id = ?');
   $verif_mdp->execute(array($new_password,$id));
    return $verif_mdp;
    }
    catch(PDOException $e){

    echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
}


/**Cette fonction récupère les rôles associés à un administrateur spécifique à partir des tables "roles_compte_admin" et "gestion_roles". */
public function getRolesAdministrateur($id){
    $db=$this->access();
    try{
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $getRolesAdministrateur=$db->prepare('SELECT roles_compte_admin.intituler, roles_compte_admin.page FROM roles_compte_admin WHERE roles_compte_admin.id IN (SELECT compte_admin FROM gestion_roles WHERE admin = ? ) ');
        $getRolesAdministrateur->execute(array($id));
        return $getRolesAdministrateur;
        }
        catch(PDOException $e){

        echo "<script>alert(\"Erreur:".$e->getMessage()."   .\")</script>";  
    }
  }
   
}
?>
