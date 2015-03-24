<?php
namespace FluxCtrl\App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
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

    /**
     * Mark item as read.
     *
     * @return mixed
     */
    public function markAsRead()
    {
        if ($this->is_read || $this->dirty('is_read')) {
            return;
        }

        $this->set('is_read', true);
        return TableRegistry::get($this->source())->save($this);
    }
}
