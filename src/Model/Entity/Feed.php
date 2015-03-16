<?php
namespace FluxCtrl\Model\Entity;

use Cake\ORM\Entity;
use FluxCtrl\Model\Entity\Traits\RtlTrait;

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
