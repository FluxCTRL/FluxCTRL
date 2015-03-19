<?php
namespace FluxCtrl\Controller;

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
        $this->Crud->disable(['edit']);
    }

    public function index()
    {
        $this->Crud->on('beforePaginate', function (Event $event) {
            $event->subject()->object = $this->Items->find('unread')->contain('Feeds');
        });
        $this->Crud->execute();
    }
}
