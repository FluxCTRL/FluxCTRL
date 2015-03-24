<?php

$shortcuts = [
    [
        'key' => 'a',
        'url' => ['_name' => 'subscriptions'],
        'desc' => __d('flux_ctrl', "List subscriptions")
    ],
    [
        'key' => 'h',
        'url' => ['_name' => 'home'],
        'desc' => __d('flux_ctrl', "Home"),
    ],
    [
        'key' => 's',
        'url' => ['_name' => 'subscribe'],
        'desc' => __d('flux_ctrl', "Subscribe to new feed")
    ],
    [
        'key' => 'u',
        'url' => ['controller' => 'Items', 'action' => 'index'],
        'desc' => __d('flux_ctrl', "Unread items"),
    ]
];

$echo = function ($shortcut) {
    echo fcKbdGoto($shortcut['key'], $shortcut['url']);
};

array_walk($shortcuts, $echo);
unset($shortcuts, $echo);
