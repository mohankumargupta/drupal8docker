<?php

/**
 * @file
 * Contains Drupal\mohan\MohanService.
 */

namespace Drupal\mohan;

use Drupal\Core\State\State;

class MohanService
{

  /**
   * Drupal\Core\State\State definition.
   *
   * @var Drupal\Core\State\State
   */
  protected $state;

  public function __construct(State $state)
  {
    $this->state = $state;
  }
}
