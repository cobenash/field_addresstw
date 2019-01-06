/**
 * @file
 * Javascript for Field Example.
 */

/**
 * Provides a farbtastic colorpicker for the fancier widget.
 */
(function ($) {
    Drupal.behaviors.field_addresstw_zipcodetw = {
      attach:  function (context, settings) {
        
        var $context = $(context);

        $context.find('.addresstw_selection_wrapper').each(function (index, element) {
          var $element = $(element);
          var $addressTwZipCode = $element.find('.address_twzipcode');
          
          $addressTwZipCode.twzipcode({
            'css': ['form-select twcounty', 'form-select twdistrict', 'form-text twzipcode'],
            'readonly': true,
          });
        });
      }
    }

  })(jQuery);
