<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post News or Blog</title>
    <script src="assets/ckeditor/ckeditor.js"></script> <!-- Include CKEditor script -->
</head>
<body>
    <h1>New Post</h1>
    <form action="save_post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="language">Language:</label>
        <select name="language" id="language">
            <option value="en">English</option>
            <option value="es">Spanish</option>
            <!-- Add more languages as needed -->
        </select>

        <label for="content">Content:</label>
        <!-- This is where CKEditor will be used -->
        <textarea name="content" id="content" rows="10" cols="80" required></textarea>
        <script>
            CKEDITOR.replace('content'); // Initialize CKEditor on this textarea
        </script>

        <button type="submit">Save Post</button>
    </form>
</body>
</html>
