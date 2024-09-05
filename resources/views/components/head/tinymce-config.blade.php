<script src="https://cdn.tiny.cloud/1/pr6jsr90lqd4v61icwkfjzfe3d99cehcss16fqyg79azsqwc/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#message', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
tinycomments_mode: 'embedded',
tinycomments_author: 'Author name',
mergetags_list: [
  { value: 'First.Name', title: 'First Name' },
  { value: 'Email', title: 'Email' },
],
ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),  });
</script>

<script>
  tinymce.init({
    selector: 'textarea#sms-message', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
tinycomments_mode: 'embedded',
tinycomments_author: 'Author name',
mergetags_list: [
  { value: 'First.Name', title: 'First Name' },
  { value: 'Email', title: 'Email' },
],
ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),  });
</script>