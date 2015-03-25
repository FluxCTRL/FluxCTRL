<?php
namespace FluxCtrl\App\Controller;

use Cake\Event\Event;
use Cake\Routing\Router;

class ItemsController extends CrudController
{
    public $paginate = [
        'sortWhitelist' => ['is_read', 'published']
    ];

    /**
     * {@inheritdoc}
     */
    protected function _setupCrud()
    {
        parent::_setupCrud();
        $this->Crud->action('edit')->config('saveOptions', [
            'fieldList' => [
                'is_read',
            ],
            'accessibleFields' => [
                'is_read' => true
            ]
        ]);
    }

    public function index()
    {
        $this->Crud->on('beforePaginate', function (Event $event) {
            $event->subject()->object = $this->Items->find('unread')->contain('Feeds');
        });
        $this->Crud->execute();
    }

    public function view()
    {
        $this->Crud->action()->config('serialize', ['success', 'data', 'links']);
        $this->Crud->on('beforeFind', function (Event $event) {
            $event->subject()->query->contain('Feeds');
        });
        $this->Crud->on('afterFind', function (Event $event) {
            $id = $this->request->param('id');
            $entity = $event->subject()->entity;
            $links = [];

            foreach (['previous', 'next'] as $type) {
                $query = $this->Items->find($type, compact('id'));
                if (!$entity->is_read) {
                    $query->find('unread');
                }
                if (!$query->count()) {
                    continue;
                }
                $links[$type] = Router::url(['id' => $query->first()->id], ['full' => true]);
            }

            $this->set(compact('links'));
            $entity->markAsRead();
        });
        $this->Crud->execute();
    }
}
