<?php

/**
 * @file
 * Contains Drupal\mohan\Controller\DefaultController.
 */

namespace Drupal\mohan\Controller;

use Drupal\Core\Controller\ControllerBase;

class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return "Hello " . $name . " !";
  }
}
