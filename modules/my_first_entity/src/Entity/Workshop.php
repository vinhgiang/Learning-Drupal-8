<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Workshop.
 */

namespace Drupal\my_first_entity\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\my_first_entity\WorkshopInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Workshop entity.
 *
 * @ingroup my_first_entity
 *
 * @ContentEntityType(
 *   id = "workshop",
 *   label = @Translation("Workshop entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\my_first_entity\Entity\Controller\WorkshopListController",
 *     "views_data" = "Drupal\my_first_entity\Entity\WorkshopViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\my_first_entity\Entity\Form\WorkshopForm",
 *       "add" = "Drupal\my_first_entity\Entity\Form\WorkshopForm",
 *       "edit" = "Drupal\my_first_entity\Entity\Form\WorkshopForm",
 *       "delete" = "Drupal\my_first_entity\Entity\Form\WorkshopDeleteForm",
 *     },
 *     "access" = "Drupal\my_first_entity\WorkshopAccessControlHandler",
 *   },
 *   base_table = "workshop",
 *   admin_permission = "administer Workshop entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/workshop/{workshop}",
 *     "edit-form" = "/admin/workshop/{workshop}/edit",
 *     "delete-form" = "/admin/workshop/{workshop}/delete"
 *   },
 *   field_ui_base_route = "workshop.settings"
 * )
 */
class Workshop extends ContentEntityBase implements WorkshopInterface {
  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getChangedTime() {
    return $this->get('changed')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Workshop entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Workshop entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Workshop entity.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['min_score'] = BaseFieldDefinition::create('float')
      ->setLabel(t('Min Score'))
      ->setDescription(t('The min score to pass the Workshop.'))
      ->setDefaultValue('5')
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);

    $fields['location'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Location'))
      ->setDescription(t('The location of the Workshop.'))
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of Workshop entity.'));

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
