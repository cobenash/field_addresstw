<?php

/**
 * Provides a field type of baz.
 * 
 * @FieldType(
 *   id = "baz",
 *   label = @Translation("Baz field"),
 *   default_formatter = "baz_formatter",
 *   default_widget = "baz_widget",
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
}