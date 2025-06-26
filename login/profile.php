<!DOCTYPE html>
<?php
$servername = "mysql.hostinger.com";
$username = "u332279927_aecgs";
$password = "Yoyo2024!";
$dbname = "u332279927_aecgs";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
session_start();
?>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
   <!-- Notyf CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

   <title>AECGS</title>
</head>

<body class="bg-light">
   <div class="container mt-5">
      <!-- Notyf Notifications -->
      <?php if (isset($_GET['status']) && $_GET['status'] === 'error') : ?>
         <script>
            document.addEventListener('DOMContentLoaded', function () {
               var notyf = new Notyf();
               notyf.error('Veuillez vérifier vos informations.');
            });
         </script>
      <?php endif; ?>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'cverify') : ?>
         <script>
            document.addEventListener('DOMContentLoaded', function () {
               var notyf = new Notyf();
               notyf.error('Vous devez confirmer votre adresse email.');
            });
         </script>
      <?php endif; ?>

      <!-- Formulaire d'inscription -->
      <div class="card shadow-sm">
         <div class="card-header bg-primary text-white">
            <h5>Mettre à jour le profil</h5>
         </div>
         <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
               <div class="row mb-3">
                  <div class="col-md-6">
                     <label for="civil" class="form-label">Civilité</label>
                     <select name="civ" id="civil" class="form-select">
                        <option value="Mr.">Mr.</option>
                        <option value="Mme.">Mme.</option>
                        <option value="Mlle.">Mlle.</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label for="nom" class="form-label">Nom</label>
                     <input type="text" name="name" id="nom" value="<?= htmlspecialchars($_SESSION['username']) ?>" class="form-control" required>
                  </div>
               </div>

               <div class="mb-3">
                  <label for="dob" class="form-label">Date de naissance</label>
                  <input type="date" name="dob" id="dob" class="form-control" required>
               </div>

               <div class="mb-3">
                  <label for="sit" class="form-label">Situation Matrimoniale</label>
                  <select name="sit" id="sit" class="form-select">
                     <option value="Marié(e)">Marié(e)</option>
                     <option value="Célibataire">Célibataire</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label for="cn" class="form-label">Nombre d'enfants</label>
                  <input type="number" name="cn" id="cn" class="form-control" required>
               </div>

               <div class="mb-3">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" name="adresse" id="adresse" class="form-control" required>
               </div>

               <div class="mb-3">
                  <label for="prof" class="form-label">Profession</label>
                  <input type="text" name="prof" id="prof" class="form-control" required>
               </div>

               <div class="mb-3">
                  <label for="photo" class="form-label">Photo de profil</label>
                  <input type="file" name="profile" id="photo" class="form-control" accept="image/*" required>
               </div>

               <div class="text-end">
                  <button type="submit" name="set" class="btn btn-primary">Enregistrer</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- PHP Traitement -->
   <?php
   if (isset($_POST["set"])) {
      $civ = $_POST['civ'];
      $nom = $_POST['name'];
      $dob = $_POST['dob'];
      $sit = $_POST['sit'];
      $cn = $_POST['cn'];
      $adresse = $_POST['adresse'];
      $prof = $_POST['prof'];

      if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
         $tmp = $_FILES['profile']['tmp_name'];
         $profile = uniqid() . '.' . pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
         move_uploaded_file($tmp, 'photo/' . $profile);
      } else {
         $profile = null;
      }

      $stmt = $conn->prepare('UPDATE all_users SET civ = ?, name = ?, dob = ?, sit = ?, cn = ?, adresse = ?, prof = ?, profile = ? WHERE id = ?');
      $stmt->bind_param('ssssssssi', $civ, $nom, $dob, $sit, $cn, $adresse, $prof, $profile, $_SESSION['user_id']);
      if ($stmt->execute()) {
         header('Location: ../index.php');
         exit();
      } else {
         echo "<div class='alert alert-danger'>Erreur : " . $stmt->error . "</div>";
      }
   }
   ?>

   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Notyf JS -->
   <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>
