<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Workshop.
 */

namespace Drupal\my_first_entity\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides the views data for the Workshop entity type.
 */
class WorkshopViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['workshop']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Workshop'),
      'help' => $this->t('The workshop entity ID.'),
    );

    return $data;
  }

}
