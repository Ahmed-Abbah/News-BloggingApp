<?php
include("db_connect.php");
// Check if post ID is set in the URL (e.g., get_post.php?id=1)
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $pdo->exec("USE $dbname");
    // Prepare SQL query to retrieve the specific post by ID
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $postId, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        logToConsole("Fetching ... Post with id : " . $_GET['id']);
    } else {
        logToConsole("Post with id : " . $_GET['id'] . " Not Found");
    }
} else {
    header("views/list_posts_view");
}
?>