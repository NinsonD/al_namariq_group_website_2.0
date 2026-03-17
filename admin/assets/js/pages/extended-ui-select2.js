(function($) {
    'use strict';
    
    $(function() {

      const select2 = $('.select2')
      const select2Icons = $('.select2-icons')

      if (select2.length) {
        select2.each(function () {
          var $this = $(this);
          $this.wrap('<div class="position-relative"></div>').select2({
            placeholder: 'Select value',
            dropdownParent: $this.parent()
          });
        });
      }

    if (select2Icons.length) {
      
      function renderIcons(option) {
        if (!option.id) {
          return option.text;
        }
        var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" + option.text;

        return $icon;
      }
      select2Icons.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: select2Icons.parent(),
        templateResult: renderIcons,
        templateSelection: renderIcons,
        escapeMarkup: function (es) {
          return es;
        }
      });
    }
    })
    
}(jQuery) )