<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ExampleController.
 */

namespace Drupal\helloworld\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {

    /**
     * {@inheritdoc}
     */
    public function content($name) {

        $build = array(
            '#type' => 'markup',
            '#markup' => t('Hello '.$name.'!'),
            '#title' => "Hello $name"
        );
        return $build;
    }

    public function contentMorning() {
        $build = array(
            '#type' => 'markup',
            '#markup' => t('Good Morning ^^ !!!')
        );
        return $build;
    }

}