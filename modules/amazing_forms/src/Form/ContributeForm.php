<?php
/**
 * Created by PhpStorm.
 * User: Keven
 * Date: 8/1/15
 * Time: 09:20
 */

namespace Drupal\amazing_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

class ContributeForm extends FormBase {

    private $arrCity = array(
        0 => 'Hà Nội',
        1 => 'Đà Nẵng',
        2 => 'Hồ Chí Minh',
    );

    private $arrDistrict = array(
        0 => array(
            0 => 'Hoàn Kiếm',
            1 => 'Đống Đa',
            2 => 'Ba Đình',
        ),
        1 => array(
            0 => 'Hải Châu',
            2 => 'Sơn Trà',
            3 => 'Thanh Khê'
        ),
        2 => array(
            0 => 'Quận 1',
            2 => 'Quận 2',
            3 => 'Quận 3',
        ),
    );

    private $defaultCity = 2;   // Ho Chi Minh

    public function getFormId(){
        return 'amazing_forms_contribute_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state){

        $form['title'] = array(
            '#type' => 'textfield',
            '#title' => t('Title'),
            '#required' => TRUE,
            '#attributes' => array(
                'class' => array(
                    'this-is-my-class',
                ),
                'data-field' => array(
                    'this is my custom data'
                ),
            ),
        );
        $form['video'] = array(
            '#type' => 'textfield',
            '#title' => t('Youtube video'),
        );
        $form['salary'] = array(
            '#type' => 'textfield',
            '#title' => t('Salary'),
            '#value' => '$2000',
            '#disabled' => true,
        );
        $form['city'] = array(
            '#type' => 'select',
            '#title' => t('City'),
            '#options' => $this->arrCity,
            '#default_value' => $this->defaultCity,
            '#ajax' => array(
                'callback' => array($this, 'changeDistrictAjax'),
                'wrapper' => 'districtSelectbox',
                'effect' => 'fade',
            ),
        );
        $form['district'] = array(
            '#type' => 'select',
            '#title' => t('District'),
            '#options' => $this->arrDistrict[$this->defaultCity],
            '#prefix' => '<div id="districtSelectbox">',
            '#suffix' => '</div>',
        );
        $form['develop'] = array(
            '#type' => 'checkbox',
            '#title' => t('I would like to be involved in developing this material'),
        );
        $form['reload'] = array(
            '#type' => 'checkbox',
            '#title'=> t('Type some description then click me to reload caption without lost data'),
            '#ajax' => array(
                'callback' => array($this, 'reloadDescription'),
                'wrapper' => 'description',
                'effect' => 'fade',
            ),
        );
        $form['description'] = array(
            '#type' => 'textarea',
            '#title' => t('Description: '),
            '#prefix' => '<div id="description">',
            '#suffix' => '</div>',
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('AJAX Submit'),
            '#ajax' => array(
                'wrapper' => 'myAmazingForm',
                'effect' => 'fade',
            ),
        );
        $form['normal_submit'] = array(
            '#type' => 'submit',
            '#value' => t('Normal Submit'),
        );

        $form['#prefix'] = '<div id="myAmazingForm">';
        $form['#suffix'] = '</div>';

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('title')) < 3) {
            $form_state->setErrorByName('title', $this->t('Your name is too short.'));
        }
        if (!UrlHelper::isValid($form_state->getValue('video'), TRUE)) {
            $form_state->setErrorByName('video', $this->t("The video url '%url' is invalid.", array('%url' => $form_state->getValue('video'))));
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }

    public function changeDistrictAjax(array &$form, FormStateInterface $form_state) {
        $selectedCity = $form_state->getValue('city');

        $district = $this->arrDistrict[$selectedCity];

        $form['district']['#options'] = $district;

        $result = array(
            $form['district']
        );

        return $result;
    }

    public function reloadDescription(array &$form, FormStateInterface $form_state){
        $selectedCity = $form_state->getValue('city');
        $selectedCityName = $this->arrCity[$selectedCity];

        $form['description']['#title'] = t("Description about your $selectedCityName:");

        $result = array(
            $form['description']
        );
        return $result;
    }

}