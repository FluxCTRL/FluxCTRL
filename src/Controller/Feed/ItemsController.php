<?php
namespace FluxCtrl\App\Controller\Feed;

use Cake\Event\Event;
use FluxCtrl\App\Controller\CrudController;

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

    public function index()
    {
        $this->Crud->on('beforePaginate', function (Event $event) {
            $event->subject()->object = $this->Items->find('unread')
                ->contain('Feeds')
                ->where([$this->Items->alias() . '.feed_id' => $this->request->param('id')]);
        });
        $this->Crud->execute();
    }
}
