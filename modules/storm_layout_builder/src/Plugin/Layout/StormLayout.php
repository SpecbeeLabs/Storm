<?php

namespace Drupal\storm_layout_builder\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;

/**
 * Class to provides extra configurations for layouts.
 */
class StormLayout extends LayoutDefault {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form['section_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Section title'),
      '#description' => $this->t('Provide an optional title to the layout section'),
      '#default_value' => $this->configuration['section_title'],
    ];

    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);
    $this->configuration['section_title'] = $form_state->getValue('section_title');
  }

}
