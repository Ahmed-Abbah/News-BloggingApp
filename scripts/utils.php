<?php

$logFile = 'log.txt';
function logToConsole($message) {
    $logFile = 'log.txt';
    // Get the current date and time
    $dateTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

    // Prepend the date and time to the message
    $fullMessage = "[$dateTime] $message" . PHP_EOL; // Add newline at the end

    // Append the message to the log file
    file_put_contents($logFile, $fullMessage, FILE_APPEND | LOCK_EX);

    // Escape the message to prevent breaking JavaScript syntax
    $escapedMessage = addslashes($fullMessage);
    
    // Log the message to the console
    echo "<script>console.log('$escapedMessage');</script>";
}


