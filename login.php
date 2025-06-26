<!DOCTYPE html>
<html lang="fr">

<?php include('head.php'); ?>

<body>
    <!-- Spinner -->
    <?php include('spinner.php'); ?>

    <!-- Topbar -->
    <?php include('topbar.php'); ?>

    <!-- Notifications dynamiques -->
    <?php
    $statusMessage = [
        'success' => 'Connexion réussie.',
        'created' => 'Compte utilisateur créé avec succès.'
    ];
    if (isset($_GET['status']) && isset($statusMessage[$_GET['status']])) {
        echo '<script src="https://cdn.jsdelivr.net/npm/notyf@3.10.0/notyf.min.js"></script>';
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                new Notyf().success("' . $statusMessage[$_GET['status']] . '");
            });
        </script>';
    }
    ?>

    <!-- Navbar -->
    <div class="container-fluid position-relative p-0">
        <?php include('navbar.php'); ?>
    </div>

    <!-- Formulaire de Connexion stylisé -->
    <section class="login container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3">Se connecter</h1>
                </div>
                <div class="card p-4 shadow-sm">
                    <form action="login.php" method="POST" class="login__form" id="loginForm">
                        <div class="mb-4 position-relative">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" required placeholder=" " class="form-control login__input py-3 pe-5">
                            <i class="ri-mail-fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary"></i>
                        </div>

                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" required placeholder=" " class="form-control login__input py-3 pe-5">
                            <i class="ri-eye-off-fill position-absolute end-0 top-50 translate-middle-y pe-3 fs-5 text-secondary login__password" id="togglePassword"></i>
                        </div>

                        <div class="text-end mb-3">
                            <a href="reset_password.php" class="link-secondary">Mot de passe oublié?</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary py-3">Login</button>
                        </div>

                        
                        <div class="mt-4 text-center">
                            <small>Pas de compte? <a href="register.php">S'enregister</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts personnalisés -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.getElementById("togglePassword");
            const passwordField = document.getElementById("password");

            togglePassword.addEventListener("click", function () {
                const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                passwordField.setAttribute("type", type);
                this.classList.toggle("ri-eye-fill");
                this.classList.toggle("ri-eye-off-fill");
            });

            const loginForm = document.getElementById("loginForm");
            loginForm.addEventListener("submit", function (e) {
                const email = document.getElementById("email").value.trim();
                const password = document.getElementById("password").value.trim();
                if (!email || !password) {
                    e.preventDefault();
                    const notyf = new Notyf();
                    notyf.error("Veuillez remplir tous les champs obligatoires.");
                }
            });
        });
    </script>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <?php include('script.php'); ?>
</body>

</html>
