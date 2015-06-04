<?php
namespace FluxCtrl\App\Controller;

use Cake\Controller\Controller;
use FluxCtrl\App\Core\Flux;

class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
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
