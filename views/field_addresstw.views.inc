<?php

/**
 * @file
 * Contains Views functionality.
 */

/**
 * Implements hook_field_views_data().
 */
function field_addresstw_field_views_data($field) {
  $data = field_views_field_default_views_data($field);
  foreach ($data as $table => $info) {
    $data[$table][$field['field_name'] . '_county']['filter'] = array(
      'handler' => 'views_handler_filter_field_addresstw',
    );
  }

  return $data;
}
