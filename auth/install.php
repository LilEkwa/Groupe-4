<?php
/**
 * Script d'installation du système d'authentification AECGS
 * Ce script vérifie et configure automatiquement le système
 */

session_start();

// Configuration
$config = [
    'db_host' => 'localhost',
    'db_username' => 'root',
    'db_password' => '',
    'db_name' => 'aecgs'
];

$errors = [];
$success = [];

function checkDatabaseConnection($config) {
    try {
        $conn = new mysqli($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']);
        if ($conn->connect_error) {
            throw new Exception($conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        return false;
    }
}

function createTablesIfNotExist($conn) {
    $sql = file_get_contents('../database/schema.sql');
    if ($sql === false) {
        throw new Exception("Impossible de lire le fichier schema.sql");
    }
    
    // Exécuter le script SQL
    if ($conn->multi_query($sql)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
        return true;
    }
    return false;
}

function createAdminUser($conn) {
    // Vérifier si un admin existe déjà
    $stmt = $conn->prepare("SELECT id FROM users WHERE role = 'admin' LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return "Un utilisateur admin existe déjà";
    }
    
    // Créer l'admin par défaut
    $email = 'admin@aecgs.com';
    $password = password_hash('admin123', PASSWORD_BCRYPT);
    $firstName = 'Admin';
    $lastName = 'AECGS';
    
    $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, role, email_verified) VALUES (?, ?, ?, ?, 'admin', TRUE)");
    $stmt->bind_param("ssss", $email, $password, $firstName, $lastName);
    
    if ($stmt->execute()) {
        return "Compte admin créé : admin@aecgs.com / admin123";
    }
    
    throw new Exception("Erreur création admin");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config['db_host'] = $_POST['db_host'] ?? 'localhost';
    $config['db_username'] = $_POST['db_username'] ?? 'root';
    $config['db_password'] = $_POST['db_password'] ?? '';
    $config['db_name'] = $_POST['db_name'] ?? 'aecgs';
    
    // Étape 1: Test de connexion
    $conn = checkDatabaseConnection($config);
    if (!$conn) {
        $errors[] = "Impossible de se connecter à la base de données";
    } else {
        $success[] = "Connexion à la base de données réussie";
        
        // Étape 2: Création des tables
        try {
            if (createTablesIfNotExist($conn)) {
                $success[] = "Tables créées ou vérifiées avec succès";
            } else {
                $errors[] = "Erreur lors de la création des tables";
            }
        } catch (Exception $e) {
            $errors[] = "Erreur tables: " . $e->getMessage();
        }
        
        // Étape 3: Création de l'admin
        if (empty($errors)) {
            try {
                $adminResult = createAdminUser($conn);
                $success[] = $adminResult;
            } catch (Exception $e) {
                $errors[] = "Erreur admin: " . $e->getMessage();
            }
        }
        
        // Étape 4: Mise à jour du fichier de configuration
        if (empty($errors)) {
            $configContent = "<?php

class Database {
    private \$host = '{$config['db_host']}';
    private \$username = '{$config['db_username']}';
    private \$password = '{$config['db_password']}';
    private \$database = '{$config['db_name']}';
    private \$connection;

    public function __construct() {
        \$this->connect();
    }

    private function connect() {
        try {
            \$this->connection = new mysqli(\$this->host, \$this->username, \$this->password, \$this->database);
            \$this->connection->set_charset(\"utf8mb4\");
            
            if (\$this->connection->connect_error) {
                throw new Exception(\"Erreur de connexion à la base de données: \" . \$this->connection->connect_error);
            }
        } catch (Exception \$e) {
            die(\"Erreur de connexion: \" . \$e->getMessage());
        }
    }

    public function getConnection() {
        return \$this->connection;
    }

    public function prepare(\$query) {
        return \$this->connection->prepare(\$query);
    }

    public function query(\$query) {
        return \$this->connection->query(\$query);
    }

    public function escape(\$string) {
        return \$this->connection->real_escape_string(\$string);
    }

    public function lastInsertId() {
        return \$this->connection->insert_id;
    }

    public function close() {
        if (\$this->connection) {
            \$this->connection->close();
        }
    }
}";
            
            if (file_put_contents('Database.php', $configContent)) {
                $success[] = "Fichier de configuration mis à jour";
            } else {
                $errors[] = "Impossible de mettre à jour le fichier de configuration";
            }
        }
        
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation AECGS - Système d'authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .install-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-radius: 20px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1); }
        .install-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px 20px 0 0; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="install-card">
                    <div class="install-header text-center py-4">
                        <h2 class="mb-0">
                            <i class="ri-settings-3-line me-2"></i>
                            Installation AECGS
                        </h2>
                        <p class="mb-0 mt-2">Configuration du système d'authentification</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <?php if (!empty($success) && empty($errors)): ?>
                            <div class="alert alert-success">
                                <h5><i class="ri-check-circle-line me-2"></i>Installation réussie !</h5>
                                <?php foreach ($success as $msg): ?>
                                    <p class="mb-1">✅ <?= htmlspecialchars($msg) ?></p>
                                <?php endforeach; ?>
                                
                                <hr>
                                <div class="mt-3">
                                    <a href="test.php" class="btn btn-primary me-2">
                                        <i class="ri-test-tube-line me-1"></i>Tester le système
                                    </a>
                                    <a href="login.php" class="btn btn-success me-2">
                                        <i class="ri-login-circle-line me-1"></i>Se connecter
                                    </a>
                                    <a href="../index.php" class="btn btn-secondary">
                                        <i class="ri-home-line me-1"></i>Accueil
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <h6><i class="ri-error-warning-line me-2"></i>Erreurs détectées :</h6>
                                    <?php foreach ($errors as $error): ?>
                                        <p class="mb-1">❌ <?= htmlspecialchars($error) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($success)): ?>
                                <div class="alert alert-info">
                                    <h6><i class="ri-information-line me-2"></i>Étapes réussies :</h6>
                                    <?php foreach ($success as $msg): ?>
                                        <p class="mb-1">✅ <?= htmlspecialchars($msg) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <form method="POST">
                                <h5 class="mb-3">Configuration de la base de données</h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="db_host" class="form-label">Hôte de la base de données</label>
                                        <input type="text" class="form-control" id="db_host" name="db_host" 
                                               value="<?= htmlspecialchars($config['db_host']) ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="db_name" class="form-label">Nom de la base de données</label>
                                        <input type="text" class="form-control" id="db_name" name="db_name" 
                                               value="<?= htmlspecialchars($config['db_name']) ?>" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="db_username" class="form-label">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" id="db_username" name="db_username" 
                                               value="<?= htmlspecialchars($config['db_username']) ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="db_password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="db_password" name="db_password" 
                                               value="<?= htmlspecialchars($config['db_password']) ?>">
                                    </div>
                                </div>
                                
                                <div class="alert alert-info">
                                    <h6><i class="ri-information-line me-2"></i>Ce script va :</h6>
                                    <ul class="mb-0">
                                        <li>Vérifier la connexion à la base de données</li>
                                        <li>Créer les tables nécessaires</li>
                                        <li>Créer un compte administrateur par défaut</li>
                                        <li>Configurer les fichiers de connexion</li>
                                    </ul>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="ri-rocket-line me-2"></i>Installer le système
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
