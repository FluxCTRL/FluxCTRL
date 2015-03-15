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
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => false,
    ];

    protected $_hidden = [
        'aggregated'
    ];

    protected function _getIsRtl()
    {
        return Parser::isLanguageRTL($this->lang);
    }
}
