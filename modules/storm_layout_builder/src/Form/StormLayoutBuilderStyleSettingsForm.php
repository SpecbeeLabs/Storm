<?php

namespace Drupal\storm_layout_builder\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Storm layout builder settings for this site.
 */
class StormLayoutBuilderStyleSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'storm_layout_builder_storm_layout_builder_style_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['storm_layout_builder.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['background'] = [
      '#type' => 'details',
      '#title' => $this->t('Background'),
      '#open' => TRUE,
    ];

    $form['background']['background_colors'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Color palette'),
      '#description' => $this->t('<p>Enter one value per line, in the format <b>key|label</b> where <em>key</em> is the CSS class name (without the .), and <em>label</em> is the human readable name of the background.</p>'),
      '#default_value' => $this->config('storm_layout_builder.settings')->get('background_colors'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('storm_layout_builder.settings')
      ->set('background_colors', $form_state->getValue('background_colors'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
