<?php
require_once __DIR__ . '/auth/AuthMiddleware.php';
$auth = auth();
$currentUser = $auth->getCurrentUser();
?>

<div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
   <div class="row gx-0 align-items-center">
      <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
         <div class="d-flex flex-wrap">
            <a href="#" class="text-muted small me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Canada, Ontario Sudbury</a>
            <a href="mailto:info.cameroungrandsudbury@gmail.com" class="text-muted small me-0"><i class="fas fa-envelope text-primary me-2"></i>info.cameroungrandsudbury@gmail.com</a>
         </div>
      </div>
      <div class="col-lg-4 text-center text-lg-end">
         <div class="d-inline-flex align-items-center" style="height: 45px;">
            <?php if ($currentUser): ?>
               <div class="top-menus" style="display: flex;">
                  <?php if ($currentUser['is_admin']): ?>
                     <a href="auth/register.php"><small style="white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-user-plus text-primary me-2"></i>Nouvel utilisateur</small></a>
                     <a href="users_list.php"><small style="white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-users text-primary me-2"></i>Utilisateurs</small></a>
                  <?php endif; ?>
                  
                  <a href="auth/logout.php"><small style="white-space: nowrap;" class="me-3 text-dark"><i class="fa fa-sign-out-alt text-primary me-2"></i>Déconnexion</small></a>

                  <div class="dropdown">
                     <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                        <small><?= htmlspecialchars($currentUser['name']) ?></small>
                     </a>
                     <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> Mon Profil</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Messages</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Paramètres</a>
                        <a href="auth/logout.php" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Déconnexion</a>
                     </div>
                  </div>
               </div>
            <?php else: ?>
               <div class="top-menus" style="display: flex;">
                  <a href="auth/login.php"><small class="me-3 text-dark"><i class="fa fa-sign-in-alt text-primary me-2"></i>Connexion</small></a>
                  <a href="auth/register.php"><small class="me-3 text-dark"><i class="fa fa-user-plus text-primary me-2"></i>Inscription</small></a>
               </div>
            <?php endif; ?>
   </div>
</div>

<!-- Modal pour la liste des utilisateurs (pour les admins) -->
<?php if ($currentUser && $currentUser['is_admin']): ?>
<div class="modal fade" id="userslist" tabindex="-1" aria-labelledby="userslistLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg p-4">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="userslistLabel">Liste des Utilisateurs</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div style="max-height: 400px; overflow-y: auto;">
               <table class="table table-responsive-lg table-bordered">
                  <thead class="table">
                     <tr>
                        <th>#</th>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Date d'inscription</th>
                        <th>Dernière connexion</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     require_once __DIR__ . '/auth/User.php';
                     $userModel = new User();
                     $users = $userModel->getAllUsers();
                     $c = 1;
                     foreach ($users as $userData) {
                     ?>
                        <tr>
                           <td><?= $c ?></td>
                           <td><?= htmlspecialchars($userData["first_name"] . ' ' . $userData["last_name"]) ?></td>
                           <td><?= htmlspecialchars($userData["email"]) ?></td>
                           <td>
                              <span class="badge bg-<?= $userData['role'] === 'admin' ? 'danger' : 'primary' ?>">
                                 <?= ucfirst($userData['role']) ?>
                              </span>
                           </td>
                           <td>
                              <span class="badge bg-<?= $userData['is_active'] ? 'success' : 'secondary' ?>">
                                 <?= $userData['is_active'] ? 'Actif' : 'Inactif' ?>
                              </span>
                              <?php if (!$userData['email_verified']): ?>
                                 <span class="badge bg-warning">Email non vérifié</span>
                              <?php endif; ?>
                           </td>
                           <td><?= date('d/m/Y', strtotime($userData["created_at"])) ?></td>
                           <td><?= $userData["last_login"] ? date('d/m/Y H:i', strtotime($userData["last_login"])) : 'Jamais' ?></td>
                        </tr>
                     <?php
                        $c++;
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
         </div>
      </div>
   </div>
</div>
<?php endif; ?>

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