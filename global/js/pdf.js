(function ($) {
  "use strict";

  // Print button click event
  $(".print-btn").on("click", function (e) {
    e.preventDefault();
    window.print();
  });

})(jQuery);
