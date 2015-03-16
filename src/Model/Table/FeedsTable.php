<?php
namespace FluxCtrl\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use FluxCtrl\Model\Entity\Feed;

/**
 * Feeds Model
 */
class FeedsTable extends Table
{

    /**
     * {@inheritdoc}
     */
    public function initialize(array $config)
    {
        $this->table('feeds');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Items', [
            'foreignKey' => 'feed_id'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        if ($entity->isNew()) {
            $entity = $this->aggregate($entity, false);
        }
    }

    /**
     * Aggregates feed.
     *
     * @param \FluxCtrl\Model\Entity\Feed $feed Feed.
     * @param bool $autoSave True to save before returning results.
     * @return \FluxCtrl\Model\Entity\Feed Dirty feed entity with aggregated content.
     */
    public function aggregate(Feed $feed, $autoSave = true)
    {
        $feed = $feed->hose->aggregate();

        if ($autoSave) {
            $this->save($feed);
        }

        return $feed;
    }
}
