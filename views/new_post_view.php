


<?php
include_once("header.php");
?>
    <div class="container">
    <h1>Post News</h1>
    <form action="../scripts/new_post_script.php" method="POST" novalidate>
        <label for="title">News Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Content:</label>
        <textarea style="position:absolute;left:-9999px;" id="content" name="content" required></textarea><br><br>

        <label for="is_active">Active:</label>
        <input type="checkbox" id="is_active" name="is_active" value="1" checked><br><br>

        <label for="is_draft">Draft:</label>
        <input type="checkbox" id="is_draft" name="is_draft" value="1"><br><br>

        <input type="submit" value="Submit News">
    </form>

      <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/xelv58g80wp56dya15ipkgmsi1wb6cd5ajfkd4a0uvytzjpc/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: '#content',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Nov 19, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    // setup: function(editor) {
    //   editor.on('change', function() {
    //     editor.save(); // This saves the editor content to the textarea
    //   });
    // }
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
    </div>

    <?php
include_once("footer.php");
?>