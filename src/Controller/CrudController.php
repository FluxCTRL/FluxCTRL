<?php
namespace FluxCtrl\App\Controller;

use Crud\Controller\ControllerTrait;
use FluxCtrl\App\Core\Flux;

class CrudController extends AppController
{
    use ControllerTrait;

    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        parent::initialize();
        $this->_setupCrud();
    }

    /**
     * Sets up the CrudComponent.
     *
     * @return void
     */
    protected function _setupCrud()
    {
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'add' => 'Crud.Add',
                'delete' => 'Crud.Delete',
                'edit' => 'Crud.Edit',
                'index' => 'Crud.Index',
                'view' => 'Crud.View',
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.RelatedModels',
            ],
            'messages' => [
                'domain' => 'fluxctrl',
            ],
            'eventLogging' => Flux::read('debug', true),
        ]);
    }
}
