<?php
$menu = $this->Menu->get('navigation');
$menu->addChild($this->cell('FluxCtrl/Clear.Flux::unread'), [
    'uri' => ['_name' => 'home'],
]);
$menu->addChild(__d('flux_ctrl', "Subscriptions"), [
    'uri' => ['_name' => 'subscriptions'],
]);

echo $this->Menu->render('navigation');
unset($menu);

