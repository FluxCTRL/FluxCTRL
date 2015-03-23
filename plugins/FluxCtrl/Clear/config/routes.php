<?php
use Cake\Routing\Router;
use FluxCtrl\App\Core\Flux;

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Items'], ['_name' => 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * RESTful (wannabe) web.
     */
    $routes->connect(
        '/feeds',
        ['controller' => 'Feeds', 'action' => 'index'],
        ['_name' => 'subscriptions']
    );
    $routes->connect(
        '/feeds/add',
        ['controller' => 'Feeds', 'action' => 'add'],
        ['_name' => 'subscribe']
    );
    $routes->connect(
        '/feeds/:id/edit',
        ['controller' => 'Feeds', 'action' => 'edit'],
        ['id' => Flux::ID, 'pass' => ['id'], '_name' => 'edit']
    );
    $routes->connect(
        '/feeds/:id',
        ['controller' => 'Feeds', 'action' => 'delete'],
        ['id' => Flux::ID, 'pass' => ['id'], '_name' => 'unsubscribe']
    );
    $routes->connect(
        '/:id/items',
        ['prefix' => 'feed', 'controller' => 'Items', 'action' => 'index'],
        ['id' => Flux::ID, 'pass' => ['id'], '_name' => 'feed']
    );
    $routes->connect(
        '/items/:id',
        ['controller' => 'Items', 'action' => 'view'],
        ['id' => Flux::ID, 'pass' => ['id'], '_name' => 'read']
    );
    $routes->connect(
        '/items/:id',
        ['controller' => 'Items', 'action' => 'delete'],
        ['id' => Flux::ID, 'pass' => ['id'], '_name' => 'trash']
    );
});
