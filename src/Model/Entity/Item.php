<?php
namespace FluxCtrl\Model\Entity;

use Cake\ORM\Entity;
use FluxCtrl\Model\Entity\Traits\RtlTrait;

/**
 * Item Entity.
 */
class Item extends Entity
{

    use RtlTrait;

    /**
     * {@inheritdoc}
     */
    protected $_accessible = [
        '*' => false,
    ];

    /**
     * {@inheritdoc}
     */
    protected $_hidden = [
        'aggregated'
    ];
}
