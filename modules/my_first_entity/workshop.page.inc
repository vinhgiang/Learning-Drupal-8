<?php

/**
 * @file
 * Contains workshop.page.inc.
 *
 * Workshop page callback file for the workshop entity.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for workshop templates.
 *
 * Default template: workshop.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_workshop(array &$variables) {
  // Fetch Workshop Entity Object.
  $workshop = $variables['elements']['#workshop'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
