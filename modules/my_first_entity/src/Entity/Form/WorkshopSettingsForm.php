<?php

/**
 * @file
 * Contains Drupal\my_first_entity\Entity\Form\WorkshopSettingsForm.
 */

namespace Drupal\my_first_entity\Entity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WorkshopSettingsForm.
 *
 * @package Drupal\my_first_entity\Form
 *
 * @ingroup my_first_entity
 */
class WorkshopSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'Workshop_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Define the form used for Workshop  settings.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   Form definition array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['Workshop_settings']['#markup'] = 'Settings form for Workshop. Manage field settings here.';
    return $form;
  }

}
