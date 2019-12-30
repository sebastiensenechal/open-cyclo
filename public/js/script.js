// TinyMCE
tinymce.init({
    // mode : "textareas",
    selector: 'textarea#content',
    menubar: true,
    plugins: [
      "lists link image",
      "visualblocks code",
      "paste imagetools wordcount"
    ],
    toolbar: "styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code",
    // content_css : "public/js/tinymce/skins/content/default/content.min.css", //public/node_modules/tinymce/themes
    theme_advanced_text_colors : "#444, #EEA852",
    theme_advanced_blockformats : "h3,h4,h5,h6",
    mobile: {
      theme: 'mobile',
      plugins: [ 'lists', 'link', 'paste' ]
    },

    // // OTHER SETTINGS
    // images_upload_url: 'postAcceptor.php',
    // // images_upload_base_path: '/some/basepath',
    // images_upload_credentials: true,
    // paste_data_images: true
});

// tinymce.activeEditor.uploadImages(function(success) {
//    document.forms[0].submit();
// });