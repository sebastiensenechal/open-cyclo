// TinyMCE
tinymce.init({
    // mode : "textareas",
    selector: 'textarea#content, #content textarea',
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
});
