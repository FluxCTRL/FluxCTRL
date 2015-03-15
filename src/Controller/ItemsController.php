<?php
namespace FluxCtrl\Controller;

class ItemsController extends CrudController
{
    protected function _setupCrud()
    {
        parent::_setupCrud();
        $this->Crud->disable(['edit']);
    }
}
