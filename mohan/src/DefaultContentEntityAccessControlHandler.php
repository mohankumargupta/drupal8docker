<?php

/**
 * @file
 * Contains Drupal\account\DefaultContentEntityAccessController.
 */

namespace Drupal\mohan;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the DefaultContentEntity entity.
 *
 * @see \Drupal\mohan\Entity\DefaultContentEntity.
 */
class DefaultContentEntityAccessControlHandler extends EntityAccessControlHandler
{

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view DefaultContentEntity entity');
        break;

      case 'edit':
        return AccessResult::allowedIfHasPermission($account, 'edit DefaultContentEntity entity');
        break;

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete DefaultContentEntity entity');
        break;

    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add Bar entity');
  }
}
