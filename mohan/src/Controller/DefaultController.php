<?php

/**
 * @file
 * Contains Drupal\mohan\Controller\DefaultController.
 */

namespace Drupal\mohan\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  /*
  public function hello($name) {
    //return "Hello " . $name . " !";
  }
  */
  public function hello() {
    return new RedirectResponse("/boo");
  }
}
