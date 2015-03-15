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
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'url' => true,
        'is_active' => true,
        'type' => true,
        'items' => true,
    ];

    protected function _getType()
    {
        return 'Feed';
    }
}
