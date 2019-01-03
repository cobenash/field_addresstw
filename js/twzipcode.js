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
          var currentData = Drupal.settings.field_addresstw[selector];
          var county = $('#' + id + '-county').val();
          var district = $('#' + id + '-district').val();
          var zipcode = $('#' + id + '-zipcode').val();

          $(selector + ' .address_twzipcode').twzipcode({
            'css': ['form-select twcounty','form-select twdistrict','form-text twzipcode'],
            'readonly': true,
          });
          if(currentData != ""){
            $(selector + ' .address_twzipcode').twzipcode('set',{
              'county': currentData['county'],
              'district': currentData['district'],
              'zipcode': currentData['zipcode']
            });
          }
          else if(county != "" && district != "" && zipcode != ""){
            $(selector + ' .address_twzipcode').twzipcode('set', {
              'county': county,
              'district': district,
              'zipcode': zipcode
            });

          }

          $(selector).on('change',function(){
            var county =  $(this).find('.address_twzipcode').twzipcode('get', 'county');
            var district =  $(this).find('.address_twzipcode').twzipcode('get', 'district');
            var zipcode =  $(this).find('.address_twzipcode').twzipcode('get', 'zipcode');
            $('#' + id + '-county').val(county);
            $('#' + id + '-district').val(district);
            $('#' + id + '-zipcode').val(zipcode);
            
          })

        });
      }
    }
    
  })(jQuery);
  