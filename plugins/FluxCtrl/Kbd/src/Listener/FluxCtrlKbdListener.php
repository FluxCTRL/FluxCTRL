<?php
namespace FluxCtrl\Kbd\Listener;

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;

class FluxCtrlKbdListener implements EventListenerInterface
{
    public $plugin = 'FluxCtrl/Kbd';

    public function implementedEvents()
    {
        return [
            'View.beforeLayout' => 'viewBeforeLayout'
        ];
    }

    public function viewBeforeLayout(Event $event)
    {
        $min = '';
        $path = $this->plugin . '.kbd';
        if (!Configure::read('debug')) {
            $min = '.min';
        }

        require Plugin::path($this->plugin) . 'config' . DS . 'functions.php';
        $view = $event->subject();
        $request = $view->request;
        $options = ['block' => true];
        $extraPath = $this->plugin . '.Kbd' . DS . $request->param('controller') . DS . $request->param('action');
        $view->Html->script($path . $min, $options);
        $view->Html->scriptBlock($view->element($path), $options);
        $view->Html->scriptBlock($view->element($extraPath, [], ['ignoreMissing' => true]), $options);
    }
}
