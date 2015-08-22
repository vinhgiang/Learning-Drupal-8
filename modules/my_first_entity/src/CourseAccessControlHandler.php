<?php

/**
 * @file
 * Contains Drupal\my_first_entity\CourseAccessControlHandler.
 */

namespace Drupal\my_first_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Course entity.
 *
 * @see \Drupal\my_first_entity\Entity\Course.
 */
class CourseAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view Course entity');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit Course entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete Course entity');
    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add Course entity');
  }

}
