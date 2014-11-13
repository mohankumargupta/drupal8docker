<?php

/**
 * @file
 * Contains Drupal\mohan\DefaultContentEntityInterface.
 */

namespace Drupal\mohan;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a DefaultContentEntity entity.
 * @ingroup account
 */
interface DefaultContentEntityInterface extends ContentEntityInterface, EntityOwnerInterface
{

  // Add get/set methods for your configuration properties here.
}
