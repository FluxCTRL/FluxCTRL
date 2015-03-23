<?php
namespace FluxCtrl\App\Model\Entity;

use Cake\ORM\Entity;
use FluxCtrl\App\Model\Entity\Traits\RtlTrait;

/**
 * Feed Entity.
 */
class Feed extends Entity
{

    use RtlTrait;

    /**
     * {@inheritdoc}
     */
    protected $_accessible = [
        'url' => true,
        'is_active' => true,
        'type' => true,
        'items' => true,
    ];

    /**
     * Gets the right feed source by type.
     *
     * @return \FluxCtrl\Datasource\HoseInterface Feed hose object.
     */
    protected function _getHose()
    {
        $hose = '\FluxCtrl\App\Model\Hose\\' . $this->type . 'Hose';
        return new $hose($this);
    }

    /**
     * Tells the type of feed.
     *
     * For now, and until the other feed hoses are implemented,
     * it only returns 'Pico'.
     *
     * @return string The feed's type.
     */
    protected function _getType()
    {
        return 'Pico';
    }
}
