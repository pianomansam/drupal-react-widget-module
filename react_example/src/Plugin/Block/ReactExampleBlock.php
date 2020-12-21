<?php

namespace Drupal\react_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'ReactExampleBlock' block.
 *
 * @Block(
 *  id = "react_example_block",
 *  admin_label = @Translation("React Example Block"),
 * )
 */
class ReactExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $form['message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Message'),
      '#default_value' => $this->configuration['message'] ?? '',
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['message'] = $form_state->getValue('message');
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'message' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $container = [
      '#type' => 'container',
      '#attributes' => [
        'class' => 'react-example',
        'data-drupal' => json_encode([
          'time' => time(),
        ]),
      ],
      '#attached' => [
        'library' => [
          empty($_ENV['PLATFORM_PROJECT'])
            ? 'react_example/react_example_dev'
            : 'react_example/react_example_prod',
        ],
        'drupalSettings' => [
          'react_example' => [
            'time' => time(),
          ],
        ],
      ],
    ];

    $build[] = $container;

    return $build;
  }

}
