<?php

/**
 * @file
 * Contains Drupal\my_first_entity\WorkshopInterface.
 */

namespace Drupal\my_first_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a Workshop entity.
 *
 * @ingroup my_first_entity
 */
interface WorkshopInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
