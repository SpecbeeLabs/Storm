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
      '#type' => 'details',
      '#title' => $this->t('Section title'),
      '#weight' => 1,
    ];

    $form['section_title']['markup'] = [
      '#type' => 'markup',
      '#markup' => '<p>' . $this->t('Provide an optional title to the layout section') . '</p>',
    ];

    $form['section_title']['heading_style'] = [
      '#type' => 'select',
      '#title' => $this->t('Style'),
      '#options' => [
        'h1' => $this->t('H1'),
        'h2' => $this->t('H2'),
        'h3' => $this->t('H3'),
        'h4' => $this->t('H4'),
        'h5' => $this->t('H5'),
        'h6' => $this->t('H6'),
      ],
      '#default_value' => $this->configuration['heading_style'] ?? 'h1',
    ];

    $form['section_title']['heading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $this->configuration['heading'],
    ];

    $form['section_title']['heading_alignment'] = [
      '#type' => 'select',
      '#title' => $this->t('Alignment'),
      '#options' => [
        'text-align-left' => $this->t('Left'),
        'text-align-right' => $this->t('Right'),
        'text-align-center' => $this->t('Center'),
      ],
      '#default_value' => $this->configuration['heading_alignment'] ?? 'text-align-left',
    ];

    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);
    $section_title = $form_state->getValue('section_title');
    $this->configuration['heading'] = $section_title['heading'];
    $this->configuration['heading_style'] = $section_title['heading_style'];
    $this->configuration['heading_alignment'] = $section_title['heading_alignment'];
  }

}
