<?php
include_once("environnement.php");
include_once("utils.php");

$NumberOfTry = 0;
$connected = false; // Variable to track if connected

while ($NumberOfTry < 4 && !$connected) { // Continue while not connected
    try {
        // Create a new PDO instance with the specified port
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        
        // Set error mode to exception for better error handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        logToConsole("Connected successfully!");
        $connected = true; // Set to true if connected successfully
    } catch (PDOException $e) {
        logToConsole("Connection failed: " . $e->getMessage());
        // Handle connection error
        
        logToConsole("Trying to reconnect after initialization... Attempt: " . ($NumberOfTry + 1));
        include("db_init.php"); // Reinitialize the database (ensure this works as expected)
    }
    
    $NumberOfTry++; // Increment after each attempt
}

if (!$connected) {
    logToConsole("Failed to connect to the database after 4 attempts.");
}

