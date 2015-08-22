<?php

/**
 * @file
 * Contains Drupal\my_first_entity\CourseInterface.
 */

namespace Drupal\my_first_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a Course entity.
 *
 * @ingroup my_first_entity
 */
interface CourseInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
