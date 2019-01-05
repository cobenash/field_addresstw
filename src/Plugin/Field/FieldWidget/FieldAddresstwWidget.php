<?php

namespace Drupal\field_addresstw\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'FieldAddresstwWidget' widget.
 *
 * @FieldWidget(
 *   id = "FieldAddresstwWidget",
 *   module = "field_addresstw",
 *   label = @Translation("Address"),
 *   field_types = {
 *     "field_addresstw"
 *   }
 * )
 */
class FieldAddresstwWidget extends WidgetBase {

    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
      
      $field_id = str_replace("_", "-", $this->fieldDefinition->getName()) . '-' . $items->getLangcode() . '-' . $delta;
      $addresstw = isset($items[$delta]->addresstw) ? $items[$delta]->addresstw : '';
      $value=isset($items[$delta]->value) ? $items[$delta]->value: '';
      // isset($element['#field_parents']) ? $bundle_id = implode('-', $element['#field_parents']) : $bundle_id = '';
      $element += [
        '#type' => 'textfield',
        '#default_value' => $value,
        '#size' => 7,
        '#maxlength' => 7,
        '#element_validate' => [
          [$this, 'validate'],
        ],
      ];
      return ['value' => $element];
    }
  
    /**
     * Validate the color text field.
     */
    public function validate($element, FormStateInterface $form_state) {
      $value = $element['#value'];
      if (strlen($value) == 0) {
        $form_state->setValueForElement($element, '');
        return;
      }
      if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
        $form_state->setError($element, $this->t("Color must be a 6-digit hexadecimal value, suitable for CSS."));
      }
    }
  
  }