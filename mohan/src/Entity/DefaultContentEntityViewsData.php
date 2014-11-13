<?php

/**
 * @file
 * Contains Drupal\mohan\Entity\DefaultContentEntity.
 */

namespace Drupal\mohan\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides the views data for the DefaultContentEntity entity type.
 */
class DefaultContentEntityViewsData extends EntityViewsData implements EntityViewsDataInterface
{

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['default_content_entity']['table']['base'] = array(
      'field' => 'id',
      'title' => t('DefaultContentEntity'),
      'help' => t('The default_content_entity entity ID.'),
    );

    return $data;
  }


}
