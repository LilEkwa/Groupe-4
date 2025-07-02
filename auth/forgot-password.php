<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié - AECGS</title>
    
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
        
        .forgot-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .forgot-header {
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
        
        .info-box {
            background: rgba(102, 126, 234, 0.1);
            border-left: 4px solid #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="forgot-card">
                    <div class="forgot-header text-center py-4">
                        <h3 class="mb-0">
                            <i class="ri-lock-unlock-line me-2"></i>
                            Mot de passe oublié
                        </h3>
                        <p class="mb-0 mt-2">Réinitialisez votre mot de passe</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <div class="info-box p-3 rounded mb-4">
                            <small class="text-muted">
                                <i class="ri-information-line me-1"></i>
                                Entrez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
                            </small>
                        </div>
                        
                        <form id="forgotForm" method="POST">
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
                            
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary py-3 fw-semibold">
                                    <i class="ri-mail-send-line me-2"></i>Envoyer le lien de réinitialisation
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
        document.getElementById('forgotForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Désactiver le bouton et afficher un loader
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="ri-loader-4-line me-2"></i>Envoi en cours...';
            
            fetch('forgot-password-process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const notyf = new Notyf();
                
                if (data.success) {
                    notyf.success(data.message);
                    document.getElementById('forgotForm').reset();
                } else {
                    notyf.error(data.message);
                }
                
                // Réactiver le bouton
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            })
            .catch(error => {
                console.error('Error:', error);
                const notyf = new Notyf();
                notyf.error('Une erreur est survenue. Veuillez réessayer.');
                
                // Réactiver le bouton
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    </script>
</body>
</html>
