<?php
namespace FluxCtrl\App\Controller\Feed;

use Cake\Event\Event;

class ItemsController extends \FluxCtrl\App\Controller\ItemsController
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
        return $this->Crud->execute();
    }
}
