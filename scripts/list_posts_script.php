<?php

include_once("environnement.php");
include_once("utils.php");
include_once("db_connect.php");

function fetchPosts($pdo) {
    try {
        // Fetch the posts
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE is_active = 1 ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        logToConsole("Error: " . $e->getMessage());
        return [];
    }
}

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch posts
    $posts = fetchPosts($pdo);
    logToConsole("Fetched " . count($posts) . " posts successfully!");

} catch (PDOException $e) {
    logToConsole("Error: " . $e->getMessage());
    $posts = [];
}
