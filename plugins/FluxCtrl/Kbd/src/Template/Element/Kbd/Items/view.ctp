<?php

$shortcuts = [
    [
        'key' => 'j',
        'url' => $links['previous'],
        'desc' => __d('flux_ctrl', "Previous item")
    ],
    [
        'key' => 'l',
        'url' => $links['next'],
        'desc' => __d('flux_ctrl', "Next item"),
    ],
];

$echo = function ($shortcut) {
    echo fcKbdGoto($shortcut['key'], $shortcut['url']);
};

array_walk($shortcuts, $echo);
unset($shortcuts, $echo);
