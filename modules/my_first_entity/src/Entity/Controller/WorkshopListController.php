<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Controller\WorkshopListController.
 */

namespace Drupal\my_first_entity\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for Workshop entity.
 *
 * @ingroup my_first_entity
 */
class WorkshopListController extends EntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('WorkshopID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\my_first_entity\Entity\Workshop */
    $row['id'] = $entity->id();
    $row['name'] = \Drupal::l(
      $this->getLabel($entity),
      new Url(
        'entity.workshop.edit_form', array(
          'workshop' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
