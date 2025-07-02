<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - AECGS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.08);
        }
        .register-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
        }
        .btn-primary {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #218838 0%, #138d75 100%);
            transform: translateY(-2px);
        }
        .password-toggle {
            cursor: pointer;
            color: #20c997;
        }
        .password-toggle:hover {
            color: #28a745;
        }
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 5px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="register-card">
                    <div class="register-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="ri-graduation-cap-line me-2"></i>
                            AECGS
                        </h3>
                        <p class="mb-0 mt-2">Créez votre compte</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <form id="registerForm" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="first_name" class="form-label">
                                        <i class="ri-user-line me-1"></i>Prénom
                                    </label>
                                    <input type="text" 
                                           class="form-control py-3" 
                                           id="first_name" 
                                           name="first_name" 
                                           placeholder="Votre prénom"
                                           required>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="last_name" class="form-label">
                                        <i class="ri-user-line me-1"></i>Nom
                                    </label>
                                    <input type="text" 
                                           class="form-control py-3" 
                                           id="last_name" 
                                           name="last_name" 
                                           placeholder="Votre nom"
                                           required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="ri-mail-line me-1"></i>Email
                                </label>
                                <input type="email" 
                                       class="form-control py-3" 
                                       id="email" 
                                       name="email" 
                                       placeholder="votre.email@exemple.com"
                                       required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <i class="ri-lock-line me-1"></i>Mot de passe
                                </label>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control py-3 pe-5" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Votre mot de passe"
                                           required>
                                    <i class="ri-eye-off-line position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle" 
                                       id="togglePassword"></i>
                                </div>
                                <div class="password-strength bg-secondary" id="passwordStrength"></div>
                                <small class="text-muted">
                                    Au moins 6 caractères (lettres, chiffres et symboles recommandés)
                                </small>
                            </div>
                            
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">
                                    <i class="ri-lock-line me-1"></i>Confirmer le mot de passe
                                </label>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control py-3 pe-5" 
                                           id="confirm_password" 
                                           name="confirm_password" 
                                           placeholder="Confirmez votre mot de passe"
                                           required>
                                    <i class="ri-eye-off-line position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle" 
                                       id="toggleConfirmPassword"></i>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        J'accepte les 
                                        <a href="#" class="text-decoration-none">conditions d'utilisation</a>
                                        et la 
                                        <a href="#" class="text-decoration-none">politique de confidentialité</a>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary py-3 fw-semibold">
                                    <i class="ri-user-add-line me-2"></i>Créer mon compte
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0">
                                    Déjà un compte? 
                                    <a href="login.php" class="text-decoration-none fw-semibold">
                                        Se connecter
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="../index.php" class="text-success text-decoration-none fw-bold">
                        <i class="ri-arrow-left-line me-1"></i>Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            this.classList.toggle('ri-eye-line');
            this.classList.toggle('ri-eye-off-line');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const password = document.getElementById('confirm_password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            this.classList.toggle('ri-eye-line');
            this.classList.toggle('ri-eye-off-line');
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            
            let strength = 0;
            if (password.length >= 6) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[^a-zA-Z0-9]+/)) strength++;
            
            const colors = ['bg-danger', 'bg-warning', 'bg-info', 'bg-success', 'bg-success'];
            const widths = ['20%', '40%', '60%', '80%', '100%'];
            
            strengthBar.className = `password-strength ${colors[strength - 1] || 'bg-secondary'}`;
            strengthBar.style.width = widths[strength - 1] || '0%';
        });

        // Form validation and submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const notyf = new Notyf();
            
            // Validation côté client
            if (password !== confirmPassword) {
                notyf.error('Les mots de passe ne correspondent pas.');
                return;
            }
            
            if (password.length < 6) {
                notyf.error('Le mot de passe doit contenir au moins 6 caractères.');
                return;
            }
            
            const formData = new FormData(this);
            
            fetch('register-process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.href = 'login.php?message=' + encodeURIComponent(data.message) + '&type=success';
                    }, 2000);
                } else {
                    notyf.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                notyf.error('Une erreur est survenue. Veuillez réessayer.');
            });
        });
    </script>
</body>
</html>
