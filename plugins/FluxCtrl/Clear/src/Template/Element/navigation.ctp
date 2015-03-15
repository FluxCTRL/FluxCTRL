<?php
$this->Menu->get('navigation')
    ->addChild($this->cell('FluxCtrl/Clear.Flux::unread'), [
        'uri' => ['_name' => 'home'],
    ])
    ->addChild(__d('flux_ctrl', "Subscriptions"), [
        'uri' => ['_name' => 'subscriptions'],
    ])
;

echo $this->Menu->render('navigation');
