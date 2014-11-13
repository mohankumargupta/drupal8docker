<?php

/**
 * @file
 * Contains default_content_entity.page.inc
 * DefaultContentEntity page callback file for the default_content_entity entity.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for default_content_entity templates.
 *
 * Default template: default_content_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */

function template_preprocess_default_content_entity(&$variables) {
  // Fetch DefaultContentEntity Entity Object
  $default_content_entity = $variables['elements']['#default_content_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
