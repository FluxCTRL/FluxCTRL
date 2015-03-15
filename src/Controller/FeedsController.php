<?php
namespace FluxCtrl\Controller;

class FeedsController extends CrudController
{

    /**
     * {@inheritdoc}
     */
    protected function _setupCrud()
    {
        parent::_setupCrud();
        $this->Crud->action('add')->config('saveOptions', [
            'associated' => [
                'Items' => [
                    'accessibleFields' => ['*', true],
                    'fieldList' => ['title', 'author', 'url', 'content'],
                ],
            ],
        ]);
        $this->Crud->action('edit')->config('saveOptions', [
            'fieldList' => [
                'title',
                'website'
            ],
            'accessibleFields' => [
                'title' => true,
                'website' => true
            ],
        ]);
        $this->Crud->disable('view');
        $this->Crud->mapAction('lookup', 'Crud.Lookup');
    }
}
