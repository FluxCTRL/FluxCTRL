<?php
namespace FluxCtrl\Core;

use Cake\Cache\Cache;
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
        $key = 'flux_listeners';

        $listeners = Cache::read($key, '_cake_core_');

        if ($listeners === false) {
            $listeners = [];
            foreach (Plugin::loaded() as $plugin) {
                $name = str_replace('/', '', $plugin);
                $listener = str_replace('/', '\\', $plugin) . '\\Listener\\' . $name . 'Listener';
                if (class_exists($listener)) {
                    $listeners[] = $listener;
                }
            }
            Cache::write($key, $listeners, '_cake_core_');
        }

        $listeners = array_map(function($item) { return new $item;  }, $listeners);
        array_walk($listeners, [$eventManager, 'on']);
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
