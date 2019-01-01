<?php

/**
 * @file
 * Contains views_handler_filter_field_addresstw.
 */

/**
 * Filter by zipcode field.
 *
 * @ingroup views_filter_handlers
 */
class views_handler_filter_field_addresstw extends views_handler_filter_in_operator {
  function get_value_options() {
    if (!isset($this->value_options)) {
      $this->value_options = addresstw_get_county();
    }
  }
}
