// CSG Bootstrap Inputs
(function( $ ){

  "use strict";

  $.fn.bootstrapInputs = function() {
    
    return this.each(function(){
      
      var $field = $(this);
      
      var options = {};
      var $data = $field.data();
      
      for(var i in $data) {
        options[i] = $data[i];
      }
      
      if($field.hasClass('form-file-input')) {
                
        var btnLabel = (options.btnlabel) ? options.btnlabel : 'Choose File';
        var btnClass = (options.btnclass) ? options.btnclass : 'btn-default';
        var btnPosition = (options.btnposition) ? options.btnposition : 'right';
        var addFormControl = true;
        var fnClass = null;
        
        switch(btnPosition) {
          case ('left'):
            btnPosition = {'left':0};
            btnClass = btnClass + ' left';
            fnClass = 'right';
            break;
          case ('right'):
            btnPosition = {'right':0};
            btnClass = btnClass + ' right';
            fnClass = 'left';
            break;
          case ('center'):
            btnPosition = {'width': '100%'};
            addFormControl = false;
            fnClass = 'hidden';
            break;
        }
        
        // Remove any styling from the input
        $field.removeClass();
        
        // Wrap it up and put the base input class on it
        var $wrap = $('<div></div>');
        $field.wrap($wrap).parent('div').addClass('form-control-outer clearfix');
        if(addFormControl) {
          $field.parent('div').addClass('form-control');
        }
        $field.wrap($wrap).parent('div').addClass('form-control-inner');
        
        // Add a button
        var $button = $('<button></button>').addClass('btn btn-file-input');
        
        $button.addClass(btnClass).html(btnLabel);
        $field.after($button);
        
        var $liveButton = $field.next('.btn-file-input');
        
        // Add a span to display the file name
        var $filename = $('<span></span>').addClass('filename');
        
        $liveButton.after($filename)
        var $liveFilename = $liveButton.next('.filename');
        
        // Adjust the input
        $field.css({
          'height': $liveButton.outerHeight(),
          'width': '100%',
          'z-index':1,
          'opacity':0,
          'position':'absolute'
        });
        
        // Position the button
        $liveButton.css({'position':'absolute','z-index':0}).css(btnPosition);
        
        // Position the filename
        if(fnClass === 'right') {
          $liveFilename.css({left: $liveButton.outerWidth()});
        }
        $liveFilename.addClass(fnClass);
        
        // Handle the button click
        $liveButton.on('click', function() {
          $field.trigger('click');
        });
        
        // Handle file added
        $field.on('change', function () {
            var fileArray = $field.val().split('\\');
            if (fileArray) {
              var file = fileArray[fileArray.length-1];
              $liveFilename.html(file);
              console.log($liveFilename.html());
            }
        });
      }
      
    });
  }
  
})( jQuery );

$('.form-file-input').bootstrapInputs();