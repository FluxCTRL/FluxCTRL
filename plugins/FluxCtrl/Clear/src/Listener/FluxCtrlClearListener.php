<?php
namespace FluxCtrl\Clear\Listener;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use FluxCtrl\Core\Flux;

class FluxCtrlClearListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Controller.initialize' => 'controllerInitialize',
            'Controller.beforeRender' => 'controllerBeforeRender',
            'View.beforeRender' => 'viewBeforeRender',
        ];
    }

    public function controllerInitialize(Event $event)
    {
        $controller = $event->subject();

        $controller->loadComponent('Flash');
        $controller->theme = Flux::read('theme');
    }

    public function controllerBeforeRender(Event $event)
    {
        $subtitles = [
            'Feeds' => [
                'add' => __d('flux_ctrl', "New subscription"),
                'index' => __d('flux_ctrl', "Subscriptions"),
            ],
            'Items' => [
                'index' => __d('flux_ctrl', "Unread"),
            ]
        ];

        $controller = $event->subject();
        $request = $controller->request;

        $controller->set('fc_subtitle', $subtitles[$request->param('controller')][$request->param('action')]);
    }

    public function viewBeforeRender(Event $event)
    {
        $view = $event->subject();

        $view->loadHelper('Gourmet/KnpMenu.Menu');
        $view->Blocks->set('title', Flux::read('title'));
    }
}
