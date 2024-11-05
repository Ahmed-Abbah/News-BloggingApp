<?php
include_once("environnement.php");
include_once("utils.php");
include_once("db_init.php");

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO posts (title, content, is_active, is_draft, user_id) VALUES (:title, :content, :is_active, :is_draft, :user_id)");

    // Retrieve values from the POST request
    $title = $_POST['title'];
    $content = $_POST['content'];
    $is_active = isset($_POST['is_active']) ? 1 : 0; // Default to 0 if not checked
    $is_draft = isset($_POST['is_draft']) ? 1 : 0; // Default to 0 if not checked
    $user_id = 1; // Set this to the ID of the logged-in user (for example)

    // Execute the statement
    $stmt->execute([
        ':title' => $title,
        ':content' => $content,
        ':is_active' => $is_active,
        ':is_draft' => $is_draft,
        ':user_id' => $user_id // Change this to the actual user ID
    ]);

    // Log success message
    logToConsole("News post created successfully!");

    // Redirect or show a success message
    header("../views/new_post_view.php"); // Redirect to a success page or back to the form
    exit;

} catch (PDOException $e) {
    logToConsole("Error: " . $e->getMessage());
    // Handle error (e.g., display an error message)
    echo "An error occurred while posting the news.";
}
?>
