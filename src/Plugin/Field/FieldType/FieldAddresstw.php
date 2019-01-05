<?php

namespace Drupal\field_addresstw\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_addresstw' field type.
 *
 * @FieldType(
 *   id = "field_addresstw",
 *   label = @Translation("Taiwan Address Field"),
 *   module = "field_addresstw",
 *   description = @Translation("Create an address field for taiwan and can choose the county, district, zipcode."),
 *   default_widget = "field_addresstw_selection",
 *   default_formatter = "field_addresstw_full_text"
 * )
 */
class FieldAddresstw extends FieldItemBase implements FieldItemInterface {
   
    /**
     * {@inheritdoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition) {
        return array(
            // columns contains the values that the field will store
            'columns' => array(
                'county' => array('type' => 'varchar', 'length' => 6, 'not null' => FALSE), //縣市
                'district' => array('type' => 'varchar', 'length' => 6, 'not null' => FALSE), //區域
                'zipcode' => array('type' => 'varchar', 'length' => 6, 'not null' => FALSE), //郵遞區號
                'addresstw' => array('type' => 'varchar', 'length' => 30, 'not null' => FALSE), //地址
            ),
            'index' = array(
                'addresstw' => array('addresstw'),
            ),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty() {
        // return empty($item['addresstw']) && empty($item['zipcode']) && empty($item['district']) && empty($item['county']);
    }
}