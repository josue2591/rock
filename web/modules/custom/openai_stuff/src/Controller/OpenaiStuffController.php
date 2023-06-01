<?php

namespace Drupal\openai_stuff\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for openai stuff routes.
 */
class OpenaiStuffController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
