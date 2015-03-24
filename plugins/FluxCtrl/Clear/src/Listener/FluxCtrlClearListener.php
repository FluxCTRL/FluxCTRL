<?php
namespace FluxCtrl\Clear\Listener;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use FluxCtrl\App\Core\Flux;

class FluxCtrlClearListener implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Controller.initialize' => 'controllerInitialize',
            'View.beforeRender' => 'viewBeforeRender',
        ];
    }

    public function controllerInitialize(Event $event)
    {
        $controller = $event->subject();

        $controller->loadComponent('Flash');
        $controller->theme = Flux::read('theme');
    }

    public function viewBeforeRender(Event $event)
    {
        $view = $event->subject();

        $view->loadHelper('Gourmet/KnpMenu.Menu');
        $view->Blocks->set('title', Flux::read('title'));
    }
}
