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

    public function aggregate(Feed $feed, $autoSave = true)
    {
        $feedClass = '\FluxCtrl\Model\Feed\\' . $feed->type;
        $feed = (new $feedClass)->aggregate($feed);

        if ($autoSave) {
            $this->save($feed);
        }

        return $feed;
    }

    public function collect(Query $query)
    {
        $items = [];
        foreach ($query as $feed) {
            $items[$feed->id] = $this->aggregate($feed)->items;
        }
        return $items;
    }
}
