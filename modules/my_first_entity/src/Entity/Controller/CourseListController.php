<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Controller\CourseListController.
 */

namespace Drupal\my_first_entity\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for Course entity.
 *
 * @ingroup my_first_entity
 */
class CourseListController extends EntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('CourseID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\my_first_entity\Entity\Course */
    $row['id'] = $entity->id();
    $row['name'] = \Drupal::l(
      $this->getLabel($entity),
      new Url(
        'entity.course.edit_form', array(
          'course' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
