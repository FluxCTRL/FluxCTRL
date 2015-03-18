<?php
$menu = $this->Menu->get('subnavigation');

switch($this->request->param('controller')) {

    case 'Feeds':
        $menu->addChild(__d('flux_ctrl', "Add"), ['uri' => ['action' => 'add']]);
        $menu->addChild(__d('flux_ctrl', "Feeds"), ['uri' => ['action' => 'index']]);
        break;

    case 'Items':
        if ($this->request->param('action') === 'index') {
            $direction = $this->request->query('direction');
            $menu->addChild(__d('flux_ctrl', "Sort by date"), [
                'uri' => [
                    'sort' => 'published',
                    'direction' => (!$direction || $direction === 'desc') ? 'asc' : 'desc',
                    'order' => null,
                ]
            ]);
        }
        break;
    default:
}

echo $this->Menu->render('subnavigation');
unset($menu);

