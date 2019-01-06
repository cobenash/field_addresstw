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
      $element['zipcode'] = $element + [
        '#prefix' => '<div class="addresstw_selection_wrapper"><div class="address_twzipcode"></div>',
        '#type' => 'textfield',
        '#attributes' => ['class' => ['edit-zipcode visually-hidden']],
        '#title_display' => 'invisible',
        '#weight' => 0,
        '#attached' => [
          'library' => [
            'field_addresstw/zipcodetw',
            'field_addresstw/widgetjs'
          ],
        ],
      ];
      $element['county'] = [
        '#type' => 'textfield',
        '#title_display' => 'invisible',
        '#weight' => 1,
        '#attributes' => ['class' => ['edit-county visually-hidden']],
      ];
      $element['district'] = [
        '#type' => 'textfield',
        '#title_display' => 'invisible',
        '#weight' => 2,
        '#attributes' => ['class' => ['edit-district visually-hidden']],
      ];
      $element['addresstw'] = [
        '#type' => 'textfield',
        '#title_display' => 'invisible',
        '#suffix' => '</div>',
        '#default_value' => $addresstw,
        '#weight' => 100,
        '#attributes' => [
          'class' => ['twzipcode-address'],
          'placeholder'=>t('Your Address')
        ],
        '#size' => 30,
        '#maxlength' => 30,
      ];

      return $element;
    }

    /**
     * Validate the color text field.
     */
    public function validate($element, FormStateInterface $form_state) {
      // $value = $element['#value'];
      // if (strlen($value) == 0) {
      //   $form_state->setValueForElement($element, '');
      //   return;
      // }
      // if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
      //   $form_state->setError($element, $this->t("Color must be a 6-digit hexadecimal value, suitable for CSS."));
      // }
    }

  }