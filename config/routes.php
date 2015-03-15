<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;
use FluxCtrl\Core\Flux;

Router::defaultRouteClass('InflectedRoute');

Router::scope('/api', function ($routes) {
    $feedItems = ['controller' => 'Items', 'prefix' => 'feed'];
    $options = ['id' => Flux::ID, 'pass' => ['id']];

    $routes->extensions('json');

    $routes->resources('Feeds', ['id' => Flux::ID, 'only' => ['index', 'add', 'edit', 'delete']]);
    $routes->resources('Items', ['id' => Flux::ID, 'only' => ['index', 'delete', 'view']]);

    $routes->connect('/:id/items', $feedItems + ['action' => 'index', '_method' => 'GET'], $options);
    $routes->connect('/:id/items', $feedItems + ['action' => 'add', '_method' => 'POST'], $options);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

