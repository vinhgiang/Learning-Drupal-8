<?php

/**
 * @file
 * Contains Drupal\my_first_entity\WorkshopAccessControlHandler.
 */

namespace Drupal\my_first_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Workshop entity.
 *
 * @see \Drupal\my_first_entity\Entity\Workshop.
 */
class WorkshopAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view Workshop entity');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit Workshop entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete Workshop entity');
    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add Workshop entity');
  }

}
