<?php
namespace FluxCtrl\Controller\Feed;

use Cake\Event\Event;
use FluxCtrl\Controller\CrudController;

class ItemsController extends CrudController
{
    /**
     * Use the same views as `FluxCtrl\Controller\ItemsController`.
     *
     * @var string
     */
    public $viewPath = 'Items';

    /**
     * {@inheritdoc}
     */
    public function beforeFilter(Event $event)
    {
        if ($this->request->data) {
            $this->request->data['feed_id'] = $this->request->param('id');
        }
    }
}
