/**
 * @file
 * Javascript for Field Example.
 */

/**
 * Provides a farbtastic colorpicker for the fancier widget.
 */
(function ($) {
    Drupal.behaviors.field_addresstw_zipcodetw = {
      attach: function(context) {
        $('.address_twzipcode').twzipcode({
          'css': ['form-select twcounty', 'form-select twdistrict', 'form-text twzipcode'],
          'readonly': true,
        });
      }
    }

  })(jQuery);
