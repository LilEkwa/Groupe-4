<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "mysql.hostinger.com";
$username = "u332279927_aecgs";
$password = "Yoyo2024!";
$dbname = "u332279927_aecgs";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/styles.css">
   <!-- Notyf CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


   <title>AECGS</title>
</head>

<body>
   <!--=============== LOGIN IMAGE ===============-->
   <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
      <mask id="mask0" mask-type="alpha">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z" />
      </mask>

      <g mask="url(#mask0)">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z" />

         <!-- Insert your image (recommended size: 1000 x 1200) -->
         <image class="login__img" href="assets/img/bg-img.jpg" />
      </g>
   </svg>

   <?php if (isset($_GET['status']) && $_GET['status'] === 'error') : ?>
      <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            var notyf = new Notyf();
            notyf.error('Veuillez verifier vos informations.');
         });
      </script>
   <?php endif; ?>

   <?php if (isset($_GET['status']) && $_GET['status'] === 'cverify') : ?>
      <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            var notyf = new Notyf();
            notyf.error('Vous devez confirmer votre adresse email.');
         });
      </script>
   <?php endif; ?>

   <!--=============== LOGIN ===============-->
   <div class="login container grid" id="loginAccessRegister">
      <div class="login__access">
         <h1 class="login__title">Reset Password</h1>

         <div class="login__area">
            <?php
            if (isset($_POST["send"])) {
                $email = $_POST["email"];
                $req = $conn->prepare('SELECT id, name, password, acctype, authentified FROM all_users WHERE email = ?');
                $req->bind_param('s', $email);
                $req->execute();
                $req->store_result();
                $req->bind_result($id, $name, $hashedPassword, $acctype, $authentified);

                if ($req->num_rows > 0) {
                    $reset_code = rand(1000, 9999);
                    include "../send_reset.php";
                    $code_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                    $query = $conn->prepare("UPDATE all_users SET reset_code = ?, code_expiry = ? WHERE email = ?");
                    $query->bind_param('iss', $reset_code, $code_expiry, $email);
                    $query->execute();

                    $_SESSION["email"] = $email;
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var notyf = new Notyf();
                            notyf.success('Un email vous a été envoyé avec un code saisissez le et modifier le mot de passe.');
                        });
                    </script>
                    <?php
                } else {
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var notyf = new Notyf();
                            notyf.error('Email non enregistré.');
                        });
                    </script>
                    <?php
                }
            }

            if (!isset($_SESSION['email']) && !isset($_SESSION['reset_code'])) {
                ?>
                <form method="POST" class="login__form register__form">
                    <div class="login__content grid">
                        <div class="login__group grid">
                            <!-- Autres champs de formulaire si nécessaires -->
                        </div>
                        <div class="login__box">
                            <input type="email" name="email" id="emailCreate" required placeholder=" " class="login__input">
                            <label for="emailCreate" class="login__label">Email</label>
                            <i class="ri-mail-fill login__icon"></i>
                        </div>
                    </div>
                    <button type="submit" name="send" class="login__button">Send</button>
                </form>
                <?php
            }

            if (isset($_SESSION["email"])) {
                ?>
                <form action="" method="post">
                    <div class="login__box">
                        <input type="text" name="reset_code" id="passwordReset" required placeholder=" " class="login__input">
                        <label for="passwordReset" class="login__label">Reset Code</label>
                        <i class="login__password" id="loginPasswordCreate"></i>
                        <script>
                            document.getElementById('passwordReset').addEventListener('change', function () {
                                document.getElementById('sendemail').click();
                            });
                        </script>
                    </div>
                    <input type="text" value="<?php echo $_SESSION['email'] ?>" name="email" hidden>
                    <input type="submit" value="Send" class="login__button" id="sendemail" name="sendemail">
                </form>
                <?php
                if (isset($_POST['sendemail'])) {
                    $reset_code = $_POST['reset_code'];

                    $query = $conn->prepare("SELECT * FROM all_users WHERE reset_code = ? ");
                    $query->bind_param('i', $reset_code);
                    $query->execute();
                    $result = $query->get_result();

                    if ($result->num_rows > 0) {
                        $conn->query("UPDATE all_users SET reset_code = '0' WHERE reset_code = '$reset_code'");
                        $_SESSION["reset_code"] = $reset_code;
                        unset($_SESSION["email"]);
                        header("Location reset_password.php");
                    } else {
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var notyf = new Notyf();
                                notyf.error('Code Incorrect ou a expiré.');
                            });
                        </script>
                        <?php
                    }
                }
            }

            if (isset($_SESSION['reset_code'])) {
                ?>
                                <form action="" method="post">
                    <div class="login__box">
                        <label for="password" class="login__label">New Password</label>
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                        <input type="password" name="npassword" id="passwordResetvalue" required placeholder=" " class="login__input">
                        <i class="login__password" id="loginPasswordCreate"></i>
                        <script>
                            document.getElementById('passwordResetvalue').addEventListener('change', function () {
                                document.getElementById('sendpass').click();
                            });
                        </script>
                    </div>
                    <input type="submit" value="Send" class="login__button" id="sendpass" name="sendpass">
                </form>
                <?php
                if (isset($_POST['sendpass'])) {
                    $reset_code = $_SESSION['reset_code'];
                    $password= $_POST["npassword"]; 

                    $stmt = $conn->prepare("UPDATE all_users SET password = '$password'  WHERE reset_code = ''$reset_code ");
                    if ($stmt->execute()) {
                        // Supprimer le code de réinitialisation après la mise à jour du mot de passe
                        $stmt = $conn->prepare("UPDATE all_users SET reset_code = NULL, code_expiry = NULL WHERE reset_code = ?");
                        $stmt->bind_param('i', $reset_code);
                        $stmt->execute();

                        // Rediriger vers la page de connexion
                        header("Location: auth.php");
                        exit();
                    } else {
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var notyf = new Notyf();
                                notyf.error('Une erreur est survenue lors de la mise à jour du mot de passe.');
                            });
                        </script>
                        <?php
                    }
                }
            }
            ?>
         </div>
      </div>
   </div>

   <!--=============== MAIN JS ===============-->
   <script src="assets/js/main.js"></script>

   <!-- Notyf JS -->
   <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>
</html>

