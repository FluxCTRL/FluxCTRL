<?php
namespace FluxCtrl\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

/**
 * Items Model
 */
class ItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
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
