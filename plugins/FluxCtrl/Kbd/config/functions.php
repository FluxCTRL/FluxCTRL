<?php

use Cake\Routing\Router;

if (!function_exists('fcKbdGoto')) {
    function fcKbdGoTo($key, $url) {
        return 'Mousetrap.bind("' . $key . '", function() { window.location = "' . Router::url($url) . '"; });';
    }
}
