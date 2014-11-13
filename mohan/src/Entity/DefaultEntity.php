<?php

/**
 * @file
 * Contains Drupal\mohan\Entity\DefaultEntity.
 */

namespace Drupal\mohan\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\mohan\DefaultEntityInterface;

/**
 * Defines the DefaultEntity entity.
 *
 * @ConfigEntityType(
 *   id = "default_entity",
 *   label = @Translation("DefaultEntity"),
 *   handlers = {
 *     "list_builder" = "Drupal\mohan\Controller\DefaultEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\mohan\Form\DefaultEntityForm",
 *       "edit" = "Drupal\mohan\Form\DefaultEntityForm",
 *       "delete" = "Drupal\mohan\Form\DefaultEntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "default_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "default_entity.edit",
 *     "delete-form" = "default_entity.delete"
 *   }
 * )
 */
class DefaultEntity extends ConfigEntityBase implements DefaultEntityInterface
{

  /**
   * The DefaultEntity ID.
   *
   * @var string
   */
  public $id;
  /**
   * The DefaultEntity UUID.
   *
   * @var string
   */
  public $uuid;
  /**
   * The DefaultEntity label.
   *
   * @var string
   */
  public $label;

}
