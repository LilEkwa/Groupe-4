<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - AECGS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    
    <style>
        body {
            /* background: linear-gradient(135deg, #00d084 0%, #00a86b 100%); */
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .login-header {
            background: linear-gradient(135deg, #00d084 0%, #00a86b 100%);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        
        .form-control:focus {
            border-color: #00d084;
            box-shadow: 0 0 0 0.2rem rgba(0, 208, 132, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #00d084 0%, #00a86b 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #00bf7a 0%, #009960 100%);
            transform: translateY(-2px);
        }
        
        .password-toggle {
            cursor: pointer;
            color: #6c757d;
        }
        
        .password-toggle:hover {
            color: #00d084;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="login-card">
                    <div class="login-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="ri-graduation-cap-line me-2"></i>
                            AECGS
                        </h3>
                        <p class="mb-0 mt-2">Connectez-vous à votre compte</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <form id="loginForm" method="POST">
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
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                <a href="forgot-password.php" class="text-decoration-none">
                                    Mot de passe oublié?
                                </a>
                            </div>
                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary py-3 fw-semibold">
                                    <i class="ri-login-circle-line me-2"></i>Se connecter
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0">
                                    Pas encore de compte? 
                                    <a href="register.php" class="text-decoration-none fw-semibold">
                                        S'inscrire
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="../index.php" class="text-white text-decoration-none">
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

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('login-process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const notyf = new Notyf();
                
                if (data.success) {
                    notyf.success(data.message);
                    setTimeout(() => {
                        window.location.href = '../index.php';
                    }, 1500);
                } else {
                    notyf.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const notyf = new Notyf();
                notyf.error('Une erreur est survenue. Veuillez réessayer.');
            });
        });

        // Show notifications from URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const message = urlParams.get('message');
        const type = urlParams.get('type');
        
        if (message && type) {
            const notyf = new Notyf();
            if (type === 'success') {
                notyf.success(decodeURIComponent(message));
            } else if (type === 'error') {
                notyf.error(decodeURIComponent(message));
            }
            
            // Clean URL
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>
