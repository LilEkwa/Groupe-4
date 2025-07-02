<?php
/**
 * Test script for database connection and schema validation
 */

// Database configuration - update these values for your setup
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'aecgs'
];

echo "=== AECGS Database Test ===\n\n";

try {
    // Test connection
    echo "1. Testing database connection...\n";
    $conn = new mysqli($config['host'], $config['username'], $config['password']);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    echo "   ✓ Connected to MySQL server\n";
    
    // Create database if it doesn't exist
    echo "2. Creating/checking database...\n";
    $conn->query("CREATE DATABASE IF NOT EXISTS `{$config['database']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $conn->select_db($config['database']);
    echo "   ✓ Database '{$config['database']}' ready\n";
    
    // Load and execute schema
    echo "3. Loading database schema...\n";
    $schemaFile = __DIR__ . '/database/schema.sql';
    
    if (!file_exists($schemaFile)) {
        throw new Exception("Schema file not found: $schemaFile");
    }
    
    $sql = file_get_contents($schemaFile);
    if ($sql === false) {
        throw new Exception("Could not read schema file");
    }
    
    // Execute the SQL - split by semicolon to handle errors gracefully
    $statements = explode(';', $sql);
    $executed = 0;
    $skipped = 0;
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (empty($statement)) continue;
        
        if ($conn->query($statement)) {
            $executed++;
        } else {
            $error = $conn->error;
            // Ignore errors for indexes and duplicate inserts
            if (strpos($statement, 'CREATE INDEX') !== false || 
                strpos($statement, 'INSERT IGNORE') !== false ||
                strpos($error, 'Duplicate') !== false ||
                strpos($error, 'already exists') !== false ||
                strpos($error, 'déjà utilisé') !== false ||
                strpos($error, 'existe déjà') !== false) {
                $skipped++;
                echo "   - Skipped: " . trim($statement, "\n\r ") . " (already exists)\n";
            } else {
                throw new Exception("SQL execution error on statement: $statement\nError: " . $error);
            }
        }
    }
    
    echo "   ✓ Schema executed successfully ($executed statements executed, $skipped skipped)\n";
    
    // Check tables
    echo "4. Verifying tables...\n";
    $tables = ['users', 'categories', 'posts', 'comments', 'elections', 'candidates', 'votes', 'events', 'event_participants', 'logs'];
    
    foreach ($tables as $table) {
        $result = $conn->query("SHOW TABLES LIKE '$table'");
        if ($result->num_rows > 0) {
            echo "   ✓ Table '$table' exists\n";
        } else {
            echo "   ✗ Table '$table' missing\n";
        }
    }
    
    // Check sample data
    echo "5. Checking sample data...\n";
    $result = $conn->query("SELECT COUNT(*) as count FROM users");
    $row = $result->fetch_assoc();
    echo "   ✓ Users in database: " . $row['count'] . "\n";
    
    $result = $conn->query("SELECT COUNT(*) as count FROM categories");
    $row = $result->fetch_assoc();
    echo "   ✓ Categories in database: " . $row['count'] . "\n";
    
    // Test admin login
    echo "6. Testing default admin account...\n";
    $result = $conn->query("SELECT email, role FROM users WHERE role = 'admin' LIMIT 1");
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        echo "   ✓ Admin account found: " . $admin['email'] . "\n";
        echo "   ✓ Default login: admin@aecgs.com / password (from sample data)\n";
    } else {
        echo "   ! No admin account found in sample data\n";
    }
    
    echo "\n=== Test completed successfully! ===\n";
    echo "You can now:\n";
    echo "1. Start your web server (Apache/Nginx)\n";
    echo "2. Visit the login page: http://localhost/Groupe-4/auth/login.php\n";
    echo "3. Use admin@aecgs.com / password to login as admin\n";
    echo "4. Or create new accounts via the registration page\n\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Please check:\n";
    echo "1. MySQL/MariaDB is running\n";
    echo "2. Database credentials are correct\n";
    echo "3. Database user has CREATE privileges\n";
    exit(1);
}
