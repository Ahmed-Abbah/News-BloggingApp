<?php
include_once("environnement.php");
include_once("utils.php");
include_once("db_connect.php");

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve values from the POST request
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $excerpt = $_POST['excerpt'];
    
    $image_path = saveImage($_FILES['image_path']);
    
    $language_code = $_POST['language_code'];
    $is_active = isset($_POST['is_active']) ? 1 : 0; // Default to 0 if not checked
    $is_draft = isset($_POST['is_draft']) ? 1 : 0; // Default to 0 if not checked
    $user_id = 1;
    if(isset($_POST['category_id'])){
        $category_id = $_POST['category_id']; // Existing category selection
    } // Set this to the ID of the logged-in user (for example)
    
    $new_category = isset($_POST['new_category']) ? $_POST['new_category'] : ''; // New category input (if provided)

    // Check if the user wants to add a new category
    if ($new_category) {
        // Insert the new category into the categories table
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:new_category)");
        $stmt->execute([':new_category' => $new_category]);

        // Get the ID of the newly added category
        $category_id = $pdo->lastInsertId();
    }

    // Prepare the SQL statement to insert the post
    $stmt = $pdo->prepare("INSERT INTO posts (title,slug,excerpt, content,image_path,language_code, is_active, is_draft, user_id, category_id) 
                           VALUES (:title,:slug,:excerpt, :content,:image_path,:language_code, :is_active, :is_draft, :user_id, :category_id)");

    // Execute the statement to insert the post
    $stmt->execute([
        ':title' => $title,
        ':content' => $content,
        ':slug' => $slug,
        ':excerpt' => $excerpt,
        ':image_path' => $image_path,
        ':language_code' => $language_code,
        ':is_active' => $is_active,
        ':is_draft' => $is_draft,
        ':user_id' => $user_id, // Replace with the actual user ID
        ':category_id' => $category_id // The ID of the category (either existing or newly added)
    ]);

    // Log success message
    logToConsole("New post created successfully!");

    // Redirect or show a success message
    header("Location: ../views/new_post_view.php"); // Redirect to a success page or back to the form
    exit;

} catch (PDOException $e) {
    logToConsole("Error: " . $e->getMessage());
    // Handle error (e.g., display an error message)
    echo "An error occurred while posting the news.";
}
?>
