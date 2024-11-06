<?php
include_once("header.php");
?>
<div class="container mt-5">

  <form action="../scripts/new_post_script.php" method="POST" novalidate enctype="multipart/form-data">
  <div class="row mb-3">
    <div class="col-md-9">
    <h1 class="mb-4">Publish a New Post</h1>
    </div>
  

    <div class="col-md-1">
      <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
      <label for="is_active" class="form-check-label">Active</label>
    </div>

    <!-- Draft -->
    <div class="col-md-1">
      <input type="checkbox" class="form-check-input" id="is_draft" name="is_draft" value="1">
      <label for="is_draft" class="form-check-label">save as Draft</label>
    </div>

    <div class="col-md-1">
    <label for="language_code" class="form-label">Language:</label>
    <select class="form-select" id="language_code" name="language_code" onchange="toggleEditorDirection()">
        <option value="en" selected>English</option>
        <option value="fr">French</option>
        <option value="ar">Arabic</option>
        <!-- Add more languages as needed -->
    </select>
</div>

  </div>

    <!-- Title -->
    <div class="form-group mb-3">
      <label for="title" class="form-label">Post Title:</label>
      <input type="text" class="form-control" placeholder="Post Title" id="title" name="title" required>
    </div>



    <!-- Content -->
    <div class="form-group mb-3">
      <label for="content" class="form-label">Content:</label>
      <textarea class="form-control" id="content" name="content" required></textarea>
    </div>

<!-- Button to toggle the Slug field -->
<button type="button" class="btn btn-info mb-3" onclick="toggleSlug()">Add Slug</button>

<!-- Slug -->
<div class="form-group mb-3" id="slugGroup" style="display: none;">
    <label for="slug" class="form-label">Slug:</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter a user-friendly URL slug" required>
</div>

<!-- Button to toggle the Excerpt field -->
<button type="button" class="btn btn-info mb-3" onclick="toggleExcerpt()">Add Excerpt</button>

<!-- Excerpt -->
<div class="form-group mb-3" id="excerptGroup" style="display: none;">
    <label for="excerpt" class="form-label">Excerpt:</label>
    <textarea class="form-control" id="excerpt" name="excerpt" placeholder="Write a summary for your post for better search optimization"></textarea>
</div>

<!-- JavaScript to toggle visibility for each field -->
<script>
    function toggleSlug() {
        var slugGroup = document.getElementById("slugGroup");

        // Toggle visibility of the Slug field
        if (slugGroup.style.display === "none") {
            slugGroup.style.display = "block";
        } else {
            slugGroup.style.display = "none";
        }
    }

    function toggleExcerpt() {
        var excerptGroup = document.getElementById("excerptGroup");

        // Toggle visibility of the Excerpt field
        if (excerptGroup.style.display === "none") {
            excerptGroup.style.display = "block";
        } else {
            excerptGroup.style.display = "none";
        }
    }
</script>



    <!-- Row with Language, Image Path, and Category -->
    <div class="row mb-3">
      <!-- Language Code -->
      <!-- Language Code Dropdown -->



      <!-- Image Path (File Input) -->
      <div class="col-md-4">
        <label for="image_path" class="form-label">Main Post Image Path:</label>
        <input type="file" class="form-control" id="image_path" name="image_path" accept="image/*">
      </div>

      

<!-- Category -->
<div class="col-md-4 mb-3">
    <label for="category_id" class="form-label">Category:</label>
    <select class="form-select" id="category_id" name="category_id">
        <option selected disabled>Choose category</option>
        <!-- Populate categories dynamically here -->
        <option value="1">Category 1</option>
        <option value="2">Category 2</option>
    </select>
    
    <!-- Option to add a new category -->
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" id="addCategoryCheck" onclick="toggleNewCategoryInput()">
        <label class="form-check-label" for="addCategoryCheck">
            Add new category
        </label>
    </div>

    <!-- Input for adding a new category -->
    <div id="newCategoryDiv" style="display: none;">
        <label for="new_category" class="form-label mt-2">New Category:</label>
        <input type="text" class="form-control" id="new_category" name="new_category" placeholder="Enter new category name">
    </div>
</div>

<!-- JavaScript to toggle the new category input -->
<script>
    function toggleNewCategoryInput() {
        var newCategoryDiv = document.getElementById("newCategoryDiv");
        var addCategoryCheck = document.getElementById("addCategoryCheck");

        if (addCategoryCheck.checked) {
            newCategoryDiv.style.display = "block";
        } else {
            newCategoryDiv.style.display = "none";
        }
    }
</script>


    </div>

    <!-- Active -->
    

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Publish</button>
    <br>
  </form>

  <br>
  <br>

  <!-- TinyMCE script -->
  <script src="https://cdn.tiny.cloud/1/xelv58g80wp56dya15ipkgmsi1wb6cd5ajfkd4a0uvytzjpc/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#content',
      plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste',
        'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect',
        'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
      exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
      exportword_converter_options: { 'document': { 'size': 'Letter' } },
      importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline', 'defaults': 'inline' } }
    });

    // Function to switch TinyMCE direction based on language selection
function toggleEditorDirection() {
    const languageSelect = document.getElementById('language_code');
    const selectedLanguage = languageSelect.value;

    if (selectedLanguage === 'ar') {
        // Set TinyMCE editor to RTL for Arabic
        tinymce.EditorManager.get('content').getBody().dir = 'rtl';
        tinymce.activeEditor.getBody().style.direction = 'rtl';
    } else {
        // Set TinyMCE editor to LTR for other languages
        tinymce.EditorManager.get('content').getBody().dir = 'ltr';
        tinymce.activeEditor.getBody().style.direction = 'ltr';
    }
}

  </script>
</div>
<?php
include_once("footer.php");
?>