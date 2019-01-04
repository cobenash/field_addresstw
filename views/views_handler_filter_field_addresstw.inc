<?php

/**
 * @file
 * Contains field_addresstw_filter_hanlders.
 */

/**
 * Filter by zipcode field.
 *
 * @ingroup views_filter_handlers
 */
class field_addresstw_filter_hanlders extends views_handler_filter_in_operator {
  function get_value_options() {
    if (!isset($this->value_options)) {
      $this->value_options = addresstw_get_county();
    }
  }
}
