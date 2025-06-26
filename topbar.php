<?php
session_start();
// Assure-toi de démarrer la session
include('login/config.php');
?>

<div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
   <div class="row gx-0 align-items-center">
      <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
         <div class="d-flex flex-wrap">
            <a href="#" class="text-muted small me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Canada,Ontario Sudbury</a>
            <!--<a href="tel:+01234567890" class="text-muted small me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+1(343)204-0650</a>-->
            <!--<a href="mailto:example@gmail.com" class="text-muted small me-0"><i class="fas fa-envelope text-primary me-2"></i>aecgs.elections2025@gmail.com</a>-->
            <a href="mailto:example@gmail.com" class="text-muted small me-0"><i class="fas fa-envelope text-primary me-2"></i>info.cameroungrandsudbury@gmail.com</a>
         </div>
      </div>
      <div class="col-lg-4 text-center text-lg-end">
         <div class="d-inline-flex align-items-center" style="height: 45px;">
            <?php
            if (isset($_SESSION['username'])) {
               $username = $_SESSION['username'];
               $sl = $conn->query("SELECT * FROM all_users WHERE name = '$username'");
               $ros = $sl->fetch_assoc();

               if ($_SESSION["acctype"] == "AD"): ?>
                  <div class="top-menus" style="display: flex;">
                     <!-- Afficher Register et Login si l'utilisateur n'est pas connecté -->
                     <a href="login/register_user.php"><small style="    white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-user-plus text-primary me-2"></i>New user</small></a>
                     <a href="login/logout.php"><small style="    white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-sign-out-alt text-primary me-2"></i>Logout</small></a>
                     <a href="javascript:0;" data-bs-toggle="modal" data-bs-target="#userslist"><small style="    white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-users text-primary me-2"></i>Users List</small></a>


                     <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                           <small>
                              <?php echo htmlspecialchars($_SESSION["username"]); ?>
                           </small>
                        </a>
                        <div class="dropdown-menu rounded">
                           <a <?php if ($ros["cn"] == 0) { ?>href="login/profile.php" <?php } else { ?> href="javascript:void();" data-bs-toggle="modal" data-bs-target="#profile" <?php } ?> class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                           <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                           <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                           <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                        </div>
                     </div>
                  </div>
         </div>
      </div>




      <div class="modal fade" id="userslist" tabindex="-1" aria-labelledby="addSpecialitiesLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg p-4">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="addSpecialitiesLabel">Liste des Utilisateurs</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
   <div style="max-height: 400px; overflow-y: auto;">
      <table class="table table-responsive-lg table-bordered">
         <thead class="table">
            <tr>
               <th>#</th>
               <th>Nom et prénoms</th>
               <th>Civilité</th>
               <th>Email</th>
               <th>Date de naissance</th>
               <th>Situation matrimoniale</th>
               <th>Nombre d'enfants</th>
               <th>Adresse</th>
               <th>Profession</th>
               <th>Photo de profil</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $req = $conn->query("SELECT * FROM all_users WHERE acctype = 'US'");
            $c = 1;
            while ($res = $req->fetch_assoc()) {
            ?>
               <tr>
                  <td><?php echo $c ?></td>
                  <td><?php echo $res["name"] ?></td>
                  <td><?php echo $res["civ"] ?></td>
                  <td><?php echo $res["email"] ?></td>
                  <td><?php echo $res["dob"] ?></td>
                  <td><?php echo $res["sit"] ?></td>
                  <td><?php echo $res["cn"] ?></td>
                  <td><?php echo $res["adresse"] ?></td>
                  <td><?php echo $res["prof"] ?></td>
                  <td>
                     <?php if (!empty($res["profile"])): ?>
                        <img src="<?php echo $res["profile"]; ?>" alt="Photo de profil" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                     <?php else: ?>
                        <p>Aucune image</p>
                     <?php endif; ?>
                  </td>
                  <td><a href="?delete=<?php echo $res['email'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
               </tr>
            <?php
               $c++;
            }
            ?>
         </tbody>
      </table>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
   </div>
</div>

            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>

<?php else: ?>
   <a href="login/logout.php"><small class="me-3 text-dark"><i class="fa fa-sign-out-alt text-primary me-2"></i>Logout</small></a>
   <!-- Afficher le nom de l'utilisateur si connecté -->
   <div class='dropdown'>
      <a href='#' class='dropdown-toggle text-dark' data-bs-toggle='dropdown'>
         <small>
            <?php echo htmlspecialchars($username);
                  // Affiche le nom de l'utilisateur
            ?>
         </small>
      </a>
      <div class='dropdown-menu rounded'>
         <a href='login/profile.php' class='dropdown-item'><i class='fas fa-user-alt me-2'></i> My Profile</a>
         <a href='#' class='dropdown-item'><i class='fas fa-comment-alt me-2'></i> Inbox</a>
         <a href='#' class='dropdown-item'><i class='fas fa-bell me-2'></i> Notifications</a>
         <a href='#' class='dropdown-item'><i class='fas fa-cog me-2'></i> Account Settings</a>
         <a href='login/logout.php' class='dropdown-item'><i class='fas fa-power-off me-2'></i> Log Out</a>
      </div>
   </div>
<?php endif;
            } else {
?>
<a href="login/auth.php"><small class="me-3 text-dark"><i class="fa fa-sign-out-alt text-primary me-2"></i>Login</small></a>
<?php
            }
?>
</div>
</div>
</div>
</div>

<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="addSpecialitiesLabel" aria-hidden="true">
   <div class="modal-dialog p-4">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addSpecialitiesLabel">Mon Profil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="d-flex w-100 m-2">
                  <div class="form-group w-25 " style="padding-right:1rem;">
                     <select name="civ" class="form-control" id="">
                        <option <?php if ($ros["civ"] == "Mr.") {
                                    echo "selected";
                                 } ?> value="Mr.">Mr.</option>
                        <option <?php if ($ros["civ"] == "Mme.") {
                                    echo "selected";
                                 } ?> value="Mme.">Mme.</option>
                        <option <?php if ($ros["civ"] == "Mlle.") {
                                    echo "selected";
                                 } ?> value="Mlle.">Mlle.</option>
                     </select>
                  </div>
                  <div class="form-group w-75">
                     <input type="text" name="name" class="form-control" value="<?php echo $ros["name"] ?>" placeholder="Nom et prénoms" required>
                  </div>
               </div>
               <input type="text" value="<?php echo $ros["dob"] ?>" name="dob" class="form-control m-2">
               <div class="form-group">
                  <select name="sit" id="civil" class="form-control m-2" style="padding-right:0 !important;">
                     <option <?php if ($ros["sit"] == "Marié(e)") {
                                 echo "selected";
                              } ?> value="Marié(e)">Marié(e)</option>
                     <option <?php if ($ros["sit"] == "Célibataire") {
                                 echo "selected";
                              } ?> value="Célibataire">Célibataire</option>
                  </select>
               </div>
               <input type="text" value="<?php echo $ros["cn"] ?>" name="dob" class="form-control m-2">
               <input type="text" value="<?php echo $ros["adresse"] ?>" name="dob" class="form-control m-2">
               <input type="text" value="<?php echo $ros["prof"] ?>" name="dob" class="form-control m-2">
               <button type="button" class="btn btn-success m-2" id="la">Photo de Profil</button>
               <input type="file" accept="images/*" name="photo" hidden id="photo">
               <script>
                  document.getElementById('la').addEventListener('click', function() {
                     const fileInput = document.getElementById('photo');
                     if (fileInput) {
                        fileInput.click();
                     }
                  });
               </script>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-success" name="upd" data-bs-dismiss="modal">Enregistrer</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php
if (isset($_POST["upd"])) {
   // Connexion à la base de données (remplacez par vos propres détails)



   // Récupération des données du formulaire
   $civ = $conn->real_escape_string($_POST['civ']);
   $name = $conn->real_escape_string($_POST['name']);
   $dob = $conn->real_escape_string($_POST['dob']);
   $sit = $conn->real_escape_string($_POST['sit']);
   $cn = $conn->real_escape_string($_POST['cn']);
   $adresse = $conn->real_escape_string($_POST['adresse']);
   $prof = $conn->real_escape_string($_POST['prof']);

   // Gestion du fichier photo de profil
   if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      $profile = $_FILES['photo']['name'];
      $tmp = $_FILES['photo']['tmp_name'];

      // Obtenir l'extension du fichier
      $ext = pathinfo($profile, PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png'];

      if (in_array(strtolower($ext), $allowedExtensions)) {
         // Nom unique pour éviter les collisions
         $profile = uniqid() . '.' . $ext;

         // Déplacement du fichier vers le dossier photo/
         move_uploaded_file($tmp, 'photo/' . $profile);
      } else {
         echo "Extension de fichier non autorisée.";
         exit;
      }
   } else {
      $profile = $ros["photo"]; // Si aucune photo n'est soumise
   }

   // Mettre à jour la base de données
   $sql = "UPDATE all_users SET civ = ?, nom = ?, dob = ?, sit = ?, cn = ?, adresse = ?, prof = ?, profile = ? WHERE id = ?";
   $stmt = $conn->prepare($sql);

   if ($stmt) {
      $userId = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
      $stmt->bind_param('ssssssssi', $civ, $name, $dob, $sit, $cn, $adresse, $prof, $profile, $_SESSION["user_id"]);

      if ($stmt->execute()) {
         echo "<script>alert('Profil mis à jour avec succès.'); window.location.href = 'index.php';</script>";
      } else {
         echo "Erreur : " . $stmt->error;
      }

      $stmt->close();
   } else {
      echo "Erreur de préparation de la requête : " . $conn->error;
   }

   $conn->close();
}
?>