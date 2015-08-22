<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Course.
 */

namespace Drupal\my_first_entity\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides the views data for the Course entity type.
 */
class CourseViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['course']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Course'),
      'help' => $this->t('The course entity ID.'),
    );

    return $data;
  }

}
