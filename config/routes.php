<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('InflectedRoute');

Router::scope('/', function ($routes) {
    $feedItems = ['controller' => 'Items', 'prefix' => 'feed'];
    $options = ['id' => Router::ID, 'pass' => ['id']];

    $routes->extensions('json');

    $routes->resources('Feeds', ['only' => ['index', 'create']]);
    $routes->resources('Items', ['only' => ['index', 'update', 'delete', 'view']]);

    $routes->connect('/:id', ['controller' => 'Feeds', 'action' => 'edit', '_method' => 'PUT'], $options);
    $routes->connect('/:id', ['controller' => 'Feeds', 'action' => 'delete', '_method' => 'DELETE'], $options);
    $routes->connect('/:id', $feedItems + ['action' => 'index', '_method' => 'GET'], $options);
    $routes->connect('/:id', $feedItems + ['action' => 'add', '_method' => 'POST'], $options);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

