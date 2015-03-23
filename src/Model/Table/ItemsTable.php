<?php
namespace FluxCtrl\App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

/**
 * Items Model
 */
class ItemsTable extends Table
{

    /**
     * {@inheritdoc}
     */
    public function initialize(array $config)
    {
        $this->table('items');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'aggregated' => 'new',
                ]
            ]
        ]);
        $this->belongsTo('Feeds', [
            'foreignKey' => 'feed_id'
        ]);
    }

    /**
     * Finds unread items.
     *
     * @param \Cake\ORM\Query $query Query.
     * @param array $options Options.
     * @return \Cake\ORM\Query Modified query.
     */
    public function findUnread(Query $query, array $options)
    {
        $query->where([
                $this->alias() . '.is_read' => false,
            ])
            ->order([
                $this->alias() . '.published' => 'DESC',
            ]);
        return $query;
    }
}
