<?php
/**
 * @file
 * Contains \Drupal\example\Routing\ExampleRoutes.
 */

namespace Drupal\helloworld\Routing;
use Symfony\Component\Routing\Route;
/**
 * Defines dynamic routes.
 */
class ExampleRoutes {

    /**
     * {@inheritdoc}
     */
    public function routes() {
        $routes = array();
        // Declares a single route under the name 'example.content'.
        // Returns an array of Route objects.
        $routes['example.content'] = new Route(
        // Path to attach this route to:
            '/example',
            // Route defaults:
            array(
                '_controller' => '\Drupal\helloworld\Controller\HelloController::content',
                '_title' => 'Hello'
            ),
            // Route requirements:
            array(
                '_permission'  => 'access content',
            )
        );
        return $routes;
    }

}