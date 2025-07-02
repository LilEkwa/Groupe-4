<!DOCTYPE html>
<html lang="fr">

<?php include('head.php'); ?>
<?php
session_start();

if (isset($_SESSION['form_errors'])) {
    echo '<div class="alert alert-danger">';
    foreach ($_SESSION['form_errors'] as $error) {
        echo "<p>$error</p>";
    }
    echo '</div>';
    unset($_SESSION['form_errors']);
}
?>

<body>
    <section class="login container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3">S'inscrire</h1>
                </div>
                <div class="card p-4 shadow-sm">
                    <form action="login/register.php" method="POST" class="login__form" id="loginForm">
                         <div class="mb-4 position-relative">
                            <label for="text" class="form-label">Username</label>
                            <input type="text" name="username" id="username" required placeholder="entrez votre nom" class="form-control login__input py-3 pe-5">
                            <i class="ri--fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary"></i>
                        </div>
                         <div class="mb-4 position-relative">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" required placeholder="entrez votre email " class="form-control login__input py-3 pe-5">
                            <i class="ri-mail-fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary"></i>
                        </div>
                        <div class="mb-4 position-relative">
                            <label for="text" class="form-label">Surname</label>
                            <input type="text" name="surname" id="surname" required placeholder="entrez un surnom" class="form-control login__input py-3 pe-5">
                            <i class="ri-mail-fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary"></i>
                        </div>

                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" required placeholder=" " class="form-control login__input py-3 pe-5">
                            <i class="ri-eye-off-fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary login__password" id="togglePassword"></i>
                        </div>

                        <div class="text-end mb-3">
                            <a href="reset_password.php" class="link-secondary">Déja enregistré ?</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary py-3">S'inscrire</button>
                        </div>

                        
                        <div class="mt-4 text-center">
                            <small>Compte déjà crée? <a href="login.php"> Se connecter </a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <?php include('script.php'); ?>
</body>

</html>