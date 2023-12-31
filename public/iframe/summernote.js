$(document).ready(function(){

  // Define function to open filemanager window
  var lfm = function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
  };

  // Define LFM summernote button
  var LFMButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
      contents: '<i class="note-icon-picture"></i> ',
      tooltip: 'Insert image with filemanager',
      click: function() {

        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
          lfmItems.forEach(function (lfmItem) {
            context.invoke('insertImage', lfmItem.url);
          });
        });

      }
    });
    return button.render();
  };

  // Initialize summernote with LFM button in the popover button group
  // Please note that you can add this button to any other button group you'd like
  $('.my-editor').summernote({
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['popovers', ['lfm']],
      ['fontfamily']
    ],
    buttons: {
      lfm: LFMButton
    }
  })
});