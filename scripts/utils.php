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

function FormatDate($date) {
    $dateTime = new DateTime($date);
    $now = new DateTime();
    $diff = $now->diff($dateTime);

    // If the difference is more than a week, return in "12 January 2019" format
    if ($diff->days > 7) {
        return $dateTime->format("j F Y");
    }

    // If the date is within the past week
    if ($diff->days > 0) {
        return $diff->days . " day" . ($diff->days > 1 ? "s" : "") . " ago";
    } elseif ($diff->h > 0) {
        return $diff->h . " hour" . ($diff->h > 1 ? "s" : "") . " ago";
    } elseif ($diff->i > 0) {
        return $diff->i . " minute" . ($diff->i > 1 ? "s" : "") . " ago";
    } else {
        return "just now";
    }
}

function trimHtmlParagraph($html, $maxLength = 100) {
    $printedLength = 0;
    $position = 0;
    $tags = [];
    $result = '';

    // Loop through the HTML and extract tags and text
    while ($printedLength < $maxLength && preg_match('/<\/?([a-z]+)([^>]*)>|([^<]+)/i', $html, $match, PREG_OFFSET_CAPTURE, $position)) {
        // Set the position to the end of the current match
        list($tag, $tagPosition) = $match[0];
        $position = $tagPosition + strlen($tag);

        // If it's a tag
        if (!empty($match[1][0])) {
            // Opening tag
            if ($tag[1] !== '/') {
                array_push($tags, $match[1][0]);
                $result .= $tag;
            } else { // Closing tag
                array_pop($tags);
                $result .= $tag;
            }
        } else { // If it's plain text
            $text = $match[0][0];
            $remaining = $maxLength - $printedLength;

            // Check if the remaining text exceeds the limit
            if (strlen($text) > $remaining) {
                $result .= substr($text, 0, $remaining) . '...';
                break;
            }

            // Otherwise, append the whole text portion
            $result .= $text;
            $printedLength += strlen($text);
        }
    }

    // Close any open tags
    while (!empty($tags)) {
        $result .= '</' . array_pop($tags) . '>';
    }

    return $result;
}

function saveImage($image) {
    // Check if $image is an array, which it should be from $_FILES
    if (!isset($image['name']) || !isset($image['tmp_name'])) {
        // Handle the error if the file is not properly uploaded
        return false;
    }

    // Directory for uploads
    $uploadDir = 'uploads/';
    
    // Get the current time and date for the image file name
    $currentTime = date('H_i_s');  // Use underscores instead of colons
    $currentDate = date('Y_m_d');
    
    // Create the folder path with the date format if it doesn't exist
    $targetDir = $uploadDir ."posts/";
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);  // Create the directory if it doesn't exist
    }

    // Build the image file name
    $imageName = $currentTime . 'image' . $currentDate . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    $targetFile = $targetDir . $imageName;

    // Move the uploaded file
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        logToConsole("created image for a post under name : ".$targetFile);
        return $targetFile; // Return the image path for database storage
    }
    logToConsole("error while uploading image ...");
    return false; // If the image wasn't uploaded successfully
}











