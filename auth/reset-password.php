<?php
require_once 'User.php';

// Vérifier si un token est fourni
$token = $_GET['token'] ?? '';

if (empty($token)) {
    header('Location: forgot-password.php?message=' . urlencode('Token manquant.') . '&type=error');
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if (empty($new_password) || empty($confirm_password)) {
        $error = 'Tous les champs sont requis.';
    } elseif ($new_password !== $confirm_password) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        $user = new User();
        $result = $user->resetPassword($token, $new_password);
        
        if ($result['success']) {
            header('Location: login.php?message=' . urlencode($result['message']) . '&type=success');
            exit();
        } else {
            $error = $result['message'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - AECGS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .reset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
        }
        
        .password-toggle {
            cursor: pointer;
            color: #6c757d;
        }
        
        .password-toggle:hover {
            color: #667eea;
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
            <div class="col-lg-5 col-md-7">
                <div class="reset-card">
                    <div class="reset-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="ri-lock-line me-2"></i>
                            Nouveau mot de passe
                        </h3>
                        <p class="mb-0 mt-2">Choisissez un mot de passe sécurisé</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <i class="ri-error-warning-line me-2"></i><?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" id="resetForm">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            
                            <div class="mb-4">
                                <label for="new_password" class="form-label">
                                    <i class="ri-lock-line me-1"></i>Nouveau mot de passe
                                </label>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control py-3 pe-5" 
                                           id="new_password" 
                                           name="new_password" 
                                           placeholder="Votre nouveau mot de passe"
                                           required>
                                    <i class="ri-eye-off-line position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle" 
                                       id="toggleNewPassword"></i>
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
                                           placeholder="Confirmez votre nouveau mot de passe"
                                           required>
                                    <i class="ri-eye-off-line position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle" 
                                       id="toggleConfirmPassword"></i>
                                </div>
                                <div id="passwordMatch" class="mt-2"></div>
                            </div>
                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary py-3 fw-semibold">
                                    <i class="ri-check-line me-2"></i>Réinitialiser le mot de passe
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0">
                                    <a href="login.php" class="text-decoration-none">
                                        <i class="ri-arrow-left-line me-1"></i>Retour à la connexion
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="../index.php" class="text-white text-decoration-none">
                        <i class="ri-home-line me-1"></i>Retour à l'accueil
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
        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            const password = document.getElementById('new_password');
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
        document.getElementById('new_password').addEventListener('input', function() {
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

        // Password match indicator
        function checkPasswordMatch() {
            const password = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const matchDiv = document.getElementById('passwordMatch');
            
            if (confirmPassword.length === 0) {
                matchDiv.innerHTML = '';
                return;
            }
            
            if (password === confirmPassword) {
                matchDiv.innerHTML = '<small class="text-success"><i class="ri-check-line me-1"></i>Les mots de passe correspondent</small>';
            } else {
                matchDiv.innerHTML = '<small class="text-danger"><i class="ri-close-line me-1"></i>Les mots de passe ne correspondent pas</small>';
            }
        }

        document.getElementById('new_password').addEventListener('input', checkPasswordMatch);
        document.getElementById('confirm_password').addEventListener('input', checkPasswordMatch);

        // Form validation
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const password = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                const notyf = new Notyf();
                notyf.error('Les mots de passe ne correspondent pas.');
                return;
            }
            
            if (password.length < 6) {
                e.preventDefault();
                const notyf = new Notyf();
                notyf.error('Le mot de passe doit contenir au moins 6 caractères.');
                return;
            }
        });
    </script>
</body>
</html>
