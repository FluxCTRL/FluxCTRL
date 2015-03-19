<?php
namespace FluxCtrl\Controller;

use Cake\Controller\Controller;
use FluxCtrl\Core\Flux;

class AppController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        $this->_setupListeners();
        $this->_setupPaginator();
        $this->_setupRequestHandler();
    }

    /**
     * Sets up custom plugin listeners.
     *
     * A plugin listener lives in `src/Listener/PluginNameListener.php`.
     *
     * @return void
     */
    protected function _setupListeners()
    {
        Flux::attachListeners($this->eventManager());
    }

    /**
     * Sets up the PaginatorComponent.
     *
     * @return void
     */
    protected function _setupPaginator()
    {
        $this->loadComponent('Paginator', [
            'limit' => 10,
            'maxLimit' => 100,
        ]);
    }

    /**
     * Sets up the RequestHandlerComponent.
     *
     * @return void
     */
    protected function _setupRequestHandler()
    {
        $this->loadComponent('RequestHandler');
    }
}
