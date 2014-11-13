<?php

/**
 * @file
 * Contains Drupal\mohan\Plugin\ImageEffect\DefaultImageEffect.
 */

namespace Drupal\mohan\Plugin\ImageEffect;

use Drupal\Core\Image\ImageInterface;
use Drupal\image\ImageEffectBase;

/**
 * Provides a 'DefaultImageEffect' image effect.
 *
 * @ImageEffect(
 *  id = "default_image_effect",
 *  label = @Translation("default_image_effect"),
 *  description = @Translation("My Image Effect")
 * )
 */
class DefaultImageEffect extends ImageEffectBase
{

  /**
   * {@inheritdoc}
   */
  public function applyEffect(ImageInterface $image) {
    // Implement Image Effect
    return imagefilter($image->getToolkit()->getResource());
  }
}
