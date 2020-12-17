<?php

namespace Drupal\react_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

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
  public function build() {
    $build = [];

    $build[] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'root',
      ],
      '#attached' => [
        'library' => [
          empty($_ENV['PLATFORM_PROJECT'])
            ? 'react_example/react_example_dev'
            : 'react_example/react_example_prod',
        ],
      ],
    ];

    return $build;
  }

}
