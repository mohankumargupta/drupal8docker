<?php

/**
 * @file
 * Contains Drupal\mohan\Entity\Controller\DefaultContentEntityListController.
 */

namespace Drupal\mohan\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for DefaultContentEntity entity.
 *
 * @ingroup mohan
 */
class DefaultContentEntityListController extends EntityListBuilder
{

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = t('DefaultContentEntityID');
    $header['name'] = t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\mohan\Entity\DefaultContentEntity */
    $row['id'] = $entity->id();
    $row['name'] = \Drupal::l(
        $this->getLabel($entity),
        new Url(
          'default_content_entity.edit', array(
            'default_content_entity' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }
}
