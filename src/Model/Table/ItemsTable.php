<?php
namespace FluxCtrl\App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use \InvalidArgumentException;

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
     * Finds previous item.
     *
     * @param \Cake\ORM\Query $query Query.
     * @param array $options Options.
     * @return \Cake\ORM\Query Modified query.
     * @throws \InvalidArgumentException If no 'id' is passed in `$options`.
     */
    public function findPrevious(Query $query, array $options)
    {
        if (empty($options['id'])) {
            throw new InvalidArgumentException("Missing the current item's ID");
        }

        $column = $this->aliasField($this->primaryKey());

        $query->select([$column => "MAX($column)"])->where(["$column <" => $options['id']]);
        return $query;
    }

    /**
     * Finds next item.
     *
     * @param \Cake\ORM\Query $query Query.
     * @param array $options Options.
     * @return \Cake\ORM\Query Modified query.
     * @throws \InvalidArgumentException If no 'id' is passed in `$options`.
     */
    public function findNext(Query $query, array $options)
    {
        if (empty($options['id'])) {
            throw new InvalidArgumentException("Missing the current item's ID");
        }

        $column = $this->aliasField($this->primaryKey());

        $query->select([$column => "MIN($column)"])->where(["$column >" => $options['id']]);
        return $query;
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
                $this->aliasField('is_read') => false,
            ])
            ->order([
                $this->aliasField('published') => 'DESC',
            ]);
        return $query;
    }
}
