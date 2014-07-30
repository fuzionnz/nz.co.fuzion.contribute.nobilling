/**
 *
 */
(function($) {
  $('body').ready(function() {
    if (typeof $('#billingcheckbox').attr('checked') === 'undefined' ||
        !$('#billingcheckbox').attr('checked')) {
      setTimeout(function() {
        $('#billingcheckbox').click();
      }, 250);
    }
  });
})(jQuery);
