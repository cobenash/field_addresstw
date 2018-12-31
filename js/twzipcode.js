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
        $.each(Drupal.settings.field_addresstw, function (selector) {
          var id = selector.replace("#div","edit");
          console.log(id);
          console.log(Drupal.settings.field_addresstw[selector]);
          var currentData = Drupal.settings.field_addresstw[selector];

          $(selector + ' .address_twzipcode').twzipcode({
            'css':['form-select twcounty','form-select twdistrict','form-text twzipcode'],
            'readonly': true,
          });

          if(currentData !=null){
            $(selector + ' .address_twzipcode').twzipcode('set',{
              'county': currentData['county'],
              'district': currentData['district'],
              'zipcode': currentData['zipcode']
            });
          }

          $(selector).on('change',function(){
            var county =  $(this).find('.address_twzipcode').twzipcode('get', 'county');
            var district =  $(this).find('.address_twzipcode').twzipcode('get', 'district');
            var zipcode =  $(this).find('.address_twzipcode').twzipcode('get', 'zipcode');
            $(this).find('input.edit-county').val(county);
            $(this).find('input.edit-district').val(district);
            $(this).find('input.edit-zipcode').val(zipcode);
          })

        });
      }
    }
    
  })(jQuery);
  