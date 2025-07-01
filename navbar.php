<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0" style="width: 100%;">
        <img src="img/logo.jpg" alt="Logo">
    </a>

    <!-- Gestion de la connexion -->
    <div class="col-lg-4 text-center text-lg-end d-lg-none ms-3">
        <?php if (isset($_SESSION['username'])): ?>
            <!-- Bouton logout affiché uniquement sur mobile -->
            <a href="login/logout.php" class="me-3 text-dark d-lg-none">
                <i class="fa fa-sign-out-alt text-primary me-2"></i>Logout
            </a>
            <div class="dropdown d-inline">
                <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                    <small><?php
                            echo $_SESSION['username']
                            ?></small>
                </a>
                <div class="dropdown-menu rounded">
                    <a href="../aecgs/login/profile.php" class="dropdown-item">
                        <i class="fas fa-user-alt me-2"></i> Mon Profil
                    </a>
                    <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Paramètres</a>
                    <!-- Bouton logout affiché uniquement sur desktop -->
                    <a href="login/logout.php" class="dropdown-item d-none d-lg-block">
                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </div>

        <?php else: ?>
            <div class="dropdown d-inline">
                <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                    <small><?= htmlspecialchars($_SESSION['username']); ?></small>
                </a>
                <div class="dropdown-menu rounded">
                    <a href="login/profile.php" class="dropdown-item">
                        <i class="fas fa-user-alt me-2"></i> Mon Profil
                    </a>
                    <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Paramètres</a>
                    <!-- Bouton logout affiché uniquement sur desktop -->
                    <a href="login/logout.php" class="dropdown-item d-none d-lg-block">
                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </div>
            <a href="../aecgs/login/auth.php" class="me-3 text-dark">
                <i class="fa fa-sign-in-alt text-primary me-2"></i>Login
            </a>
        <?php endif; ?>
    </div>

    <!-- Bouton pour mobile uniquement -->
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Accueil</a>
            <a href="about.php" style="white-space:nowrap;" class="nav-item nav-link">À propos</a>
            <a href="event.php" class="nav-item nav-link">Événements</a>
            <a href="blog2.php" class="nav-item nav-link">Blog</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <a href="login.php" class="nav-item nav-link">Login</a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                <a href="admin_dashboard.php" class="nav-item nav-link text-danger">Admin</a>
            <?php endif; ?>
        </div>


    </div>
</nav>