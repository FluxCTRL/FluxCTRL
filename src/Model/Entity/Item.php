<?php
namespace FluxCtrl\App\Model\Entity;

use Cake\ORM\Entity;
use FluxCtrl\App\Model\Entity\Traits\RtlTrait;

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
