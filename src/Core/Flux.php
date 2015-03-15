<?php
namespace FluxCtrl\Core;

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Event\EventManager;

class Flux
{
    const ID = '[a-zA-Z0-9]+';

    /**
     * Scans all plugins to attach the FluxCtrl plugins' available listeners.
     *
     * @param \Cake\Event\EventManager $eventManager Event manager on which to attach the listener(s).
     * @return void
     */
    public static function attachListeners(EventManager $eventManager)
    {
        foreach (Plugin::loaded() as $plugin) {
            $name = str_replace('/', '', $plugin);
            $listener = str_replace('/', '\\', $plugin) . '\\Listener\\' . $name . 'Listener';
            if (class_exists($listener)) {
                $eventManager->on(new $listener);
            }
        }
    }

    public static function read($key, $global = false)
    {
        if ($global === false) {
            $key = 'Flux.' . $key;
        }
        return Configure::read($key);
    }

    public static function write($key, $value, $global = false)
    {
        if ($global === false) {
            $key = 'Flux.' . $key;
        }
        return Configure::write($key, $value);
    }
}
