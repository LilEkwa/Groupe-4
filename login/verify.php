<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aecgs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ( ( isset( $_GET[ 'email' ] ) ) && ( !empty( $_GET[ 'email' ] ) ) && ( isset( $_GET[ 'code' ] ) ) && !empty( $_GET[ 'code' ] ) ) {
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
                notyf.error('Veillez verifier vos informations.');
            });
        </script>

    <?php endif; ?>

   <!--=============== LOGIN ===============-->
   <div class="login container grid" id="loginAccessRegister">
      <!--===== LOGIN ACCESS =====-->
      <div class="login__access">
         <h1 class="login__title">Verify your Email.</h1>

         <div class="login__area">
            <form  method="POST" action="verify_password.php" class="login__form">
               <div class="login__content grid">
                  <div class="login__box">
                     <input type="password" name="password" id="password" required placeholder=" " class="login__input">
                     <label for="password" class="login__label">Default Password</label>

                     <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                  </div>
                  <div class="login__box">
                     <input type="password" name="cpassword" id="password" required placeholder=" " class="login__input">
                     <label for="password" class="login__label">New Password</label>

                     <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                  </div>
                  <div class="login__box">
                     <input type="password" name="cpassword" id="password" required placeholder=" " class="login__input">
                     <label for="password" class="login__label">Confirm Password</label>

                     <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                  </div>
                  <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? '', ENT_QUOTES); ?>">
                  <input type="hidden" name="code" value="<?php echo htmlspecialchars($_GET['code'] ?? '', ENT_QUOTES); ?>">
               </div>
               <button type="submit"name="verify" class="login__button">Verify</button>
            </form>
         </div>
      </div>
   </div>

   <!--=============== MAIN JS ===============-->
   <script src="assets/js/main.js"></script>

   <!-- Notyf JS -->
   <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>

</html>
    <?php
}
?>
