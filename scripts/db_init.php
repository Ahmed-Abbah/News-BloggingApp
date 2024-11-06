<?php

include_once("environnement.php");
include_once("utils.php");

try {
    // Connect to MySQL without selecting a database initially
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Drop the database if it exists, then recreate it 
    // SOS : This is for dev env purposes
    // $pdo->exec("DROP DATABASE IF EXISTS $dbname");

    // logToConsole("Database '$dbname' dropped successfully!<br>");

    
        $pdo->exec("CREATE DATABASE $dbname");
        logToConsole("Database created successfully!<br>");
    

    // Select the newly created database
    $pdo->exec("USE $dbname");

    // Create the Users Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) UNIQUE NOT NULL,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL -- Password should be stored as a hash
    )");
    logToConsole("Table 'users' created successfully!<br>");

     // Insert a root user
     $rootEmail = 'admin@admin.com'; // Change to the desired root user email
     $rootUsername = 'admin'; // Change to the desired root username
     $rootPassword = password_hash('admin', PASSWORD_DEFAULT); // Change to the desired root password
 
     $stmt = $pdo->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
     $stmt->execute([
         ':email' => $rootEmail,
         ':username' => $rootUsername,
         ':password' => $rootPassword
     ]);
     logToConsole("Root user created successfully!<br>");

     // Create the Categories Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
)
");
    logToConsole("Table 'Categories' created successfully!<br>");
 

    

    // Create the Posts Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) UNIQUE,
        excerpt TEXT,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        published_at TIMESTAMP NULL, 
        is_active BOOLEAN DEFAULT TRUE, 
        is_draft BOOLEAN DEFAULT FALSE, 
        view_count INT DEFAULT 0,
        image_path VARCHAR(255),
        language_code CHAR(2) DEFAULT 'en',
        category_id INT,
        user_id INT,
        modified_by INT,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
        FOREIGN KEY (modified_by) REFERENCES users(id) ON DELETE SET NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
    )");


    

    logToConsole("Table 'posts' created successfully!<br>");

} catch (PDOException $e) {
    logToConsole("Error: " . $e->getMessage());
}
