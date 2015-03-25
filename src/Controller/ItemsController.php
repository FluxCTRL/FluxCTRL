<?php
namespace FluxCtrl\App\Controller;

use Cake\Event\Event;

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
        $this->Crud->on('beforeFind', function (Event $event) {
            $event->subject()->query->contain('Feeds');
        });
        $this->Crud->on('afterFind', function (Event $event) {
            $event->subject()->entity->markAsRead();
        });
        $this->Crud->execute();
    }
}
