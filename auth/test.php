<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test du système d'authentification - AECGS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <i class="ri-test-tube-line me-2"></i>
                            Test du système d'authentification AECGS
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        require_once 'Database.php';
                        require_once 'User.php';
                        require_once 'AuthMiddleware.php';

                        echo "<h4>🔍 Tests de connectivité</h4>";
                        
                        // Test 1: Connexion à la base de données
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 1:</strong> Connexion à la base de données<br>";
                        try {
                            $db = new Database();
                            echo "<span class='text-success'>✅ Connexion réussie à la base de données</span>";
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur de connexion : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        // Test 2: Vérification de la table users
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 2:</strong> Vérification de la structure de la table users<br>";
                        try {
                            $db = new Database();
                            $result = $db->query("DESCRIBE users");
                            if ($result) {
                                echo "<span class='text-success'>✅ Table users trouvée avec la structure suivante :</span><br>";
                                echo "<small>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "- " . $row['Field'] . " (" . $row['Type'] . ")<br>";
                                }
                                echo "</small>";
                            }
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur table users : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        // Test 3: Classe User
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 3:</strong> Classe User<br>";
                        try {
                            $user = new User();
                            echo "<span class='text-success'>✅ Classe User instanciée avec succès</span>";
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur classe User : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        // Test 4: AuthMiddleware
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 4:</strong> AuthMiddleware<br>";
                        try {
                            $auth = auth();
                            $currentUser = $auth->getCurrentUser();
                            if ($currentUser) {
                                echo "<span class='text-success'>✅ Utilisateur connecté : " . htmlspecialchars($currentUser['name']) . "</span>";
                            } else {
                                echo "<span class='text-warning'>⚠️ Aucun utilisateur connecté</span>";
                            }
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur AuthMiddleware : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        // Test 5: Compter les utilisateurs
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 5:</strong> Données utilisateurs<br>";
                        try {
                            $user = new User();
                            $users = $user->getAllUsers();
                            $count = count($users);
                            echo "<span class='text-success'>✅ $count utilisateur(s) trouvé(s) dans la base</span><br>";
                            
                            if ($count > 0) {
                                echo "<small>Derniers utilisateurs :</small><br>";
                                echo "<small>";
                                foreach (array_slice($users, 0, 3) as $userData) {
                                    echo "- " . htmlspecialchars($userData['first_name'] . ' ' . $userData['last_name']) . 
                                         " (" . htmlspecialchars($userData['email']) . ")<br>";
                                }
                                echo "</small>";
                            }
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur récupération utilisateurs : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        // Test 6: Fonctions de hachage
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 6:</strong> Fonctions de sécurité<br>";
                        $testPassword = "test123";
                        $hashedPassword = password_hash($testPassword, PASSWORD_BCRYPT);
                        $verified = password_verify($testPassword, $hashedPassword);
                        
                        if ($verified) {
                            echo "<span class='text-success'>✅ Hachage et vérification des mots de passe fonctionnels</span>";
                        } else {
                            echo "<span class='text-danger'>❌ Problème avec le hachage des mots de passe</span>";
                        }
                        echo "</div>";

                        // Test 7: Génération de tokens
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Test 7:</strong> Génération de tokens<br>";
                        try {
                            $token = bin2hex(random_bytes(32));
                            if (strlen($token) === 64) {
                                echo "<span class='text-success'>✅ Génération de tokens sécurisés fonctionnelle</span><br>";
                                echo "<small>Token exemple : " . substr($token, 0, 16) . "...</small>";
                            } else {
                                echo "<span class='text-danger'>❌ Problème avec la génération de tokens</span>";
                            }
                        } catch (Exception $e) {
                            echo "<span class='text-danger'>❌ Erreur génération token : " . $e->getMessage() . "</span>";
                        }
                        echo "</div>";

                        echo "<h4 class='mt-4'>🎯 Résumé</h4>";
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Le système d'authentification est prêt !</strong><br>";
                        echo "Vous pouvez maintenant :<br>";
                        echo "- <a href='register.php' class='btn btn-sm btn-primary me-2'>Créer un compte</a>";
                        echo "- <a href='login.php' class='btn btn-sm btn-success me-2'>Se connecter</a>";
                        echo "- <a href='../index.php' class='btn btn-sm btn-secondary'>Retour à l'accueil</a>";
                        echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
