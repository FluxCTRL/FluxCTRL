<?php
namespace FluxCtrl\Clear\View\Cell;

use Cake\View\Cell;

class FluxCell extends Cell
{
    public $plugin = 'FluxCtrl/Clear';

    public function display($finder = 'unread')
    {
        $this->loadModel('Items');
        $items = $this->Items->find($finder)
            ->contain(['Feeds' => ['fields' => ['id', 'title']]]);

        if ($direction = $this->request->query('direction')) {
            $items->order([
                $this->Items->alias() . '.' . $this->request->query('sort') => strtoupper($direction)
            ]);
        }

        $this->set('items', $items->all());
    }

    public function unread()
    {
        $this->loadModel('Items');
        $unread = $this->Items->find('unread');
        $this->set('unread_count', $unread->cache('unread_count')->count());
    }
}
