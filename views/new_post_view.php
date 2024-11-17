<?php
include_once("header.php");
?>
<div class="container mt-5">

  <form action="../scripts/new_post_script.php" method="POST" novalidate enctype="multipart/form-data">
    <div class="row mb-3">
      <div class="col-md-7">
        <h1 class="mb-4">Publish a New Post</h1>
      </div>
      <div class="col-md-1">
        <!-- Button to toggle the Slug field -->
    <button type="button" class="btn btn-info mb-3" onclick="toggleSlug()">Add Slug</button>
    
      </div>
      <div class="col-md-1">
        
    <!-- Button to toggle the Excerpt field -->
    <button type="button" class="btn btn-info mb-3" onclick="toggleExcerpt()">Add Excerpt</button>
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
        <select class="form-select" id="language_code" name="language_code" (click)="toggleEditorDirection()">
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
    

    <!-- Title -->
    <div class="form-group mb-3">
      <textarea type="text" class="form-control" placeholder="postContent" id="content" name="content" required>
        </textarea>
    </div>

    
    
    


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
          <input class="form-check-input" type="checkbox" id="addCategoryCheck" (click)="toggleNewCategoryInput()">
          <label class="form-check-label" for="addCategoryCheck">
            Add new category
          </label>
        </div>

        <!-- Input for adding a new category -->
        <div  id="newCategoryDiv">
          <label for="new_category" class="form-label mt-2">New Category:</label>
          <input type="text" class="form-control" id="new_category" name="new_category"
            placeholder="Enter new category name">
        </div>
      </div>


    </div>

    <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/6aelg498mkdgnkjt5holm4e2oa1ale8phup70zczxn0tuv9g/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Nov 21, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
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
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline',	'defaults': 'inline', } },
  });
</script>



    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Publish</button>
    <br>
  </form>
</div>