<?php

include_once("environnement.php");
include_once("utils.php");

try {
    // Connect to MySQL without selecting a database initially
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Drop the database if it exists, then recreate it
    //$pdo->exec("DROP DATABASE IF EXISTS $dbname");

    //logToConsole("Database '$dbname' dropped successfully!<br>");

    try{
        $pdo->exec("CREATE DATABASE $dbname");
        logToConsole("Database created successfully!<br>");
    }catch(PDOException $e){
        
    }

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

    // Create the Posts Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        is_active BOOLEAN DEFAULT TRUE, -- Indicates if post is active
        is_draft BOOLEAN DEFAULT FALSE, -- Indicates if post is a draft
        user_id INT, -- User who uploaded the post
        modified_by INT, -- User who last modified the post, nullable for original posts
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
        FOREIGN KEY (modified_by) REFERENCES users(id) ON DELETE SET NULL
    )");

    logToConsole("Table 'posts' created successfully!<br>");

} catch (PDOException $e) {
    logToConsole("Error: " . $e->getMessage());
}
