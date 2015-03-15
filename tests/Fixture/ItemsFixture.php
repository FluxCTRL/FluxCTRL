<?php
namespace FluxCtrl\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 *
 */
class ItemsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'feed_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'author' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'content' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'enclosure_url' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'enclosure_type' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'lang' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'is_read' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => false, 'precision' => null, 'comment' => null],
        'published' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'aggregated' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'feed_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 2,
            'feed_id' => 2,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 3,
            'feed_id' => 3,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 4,
            'feed_id' => 4,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 5,
            'feed_id' => 5,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 6,
            'feed_id' => 6,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 7,
            'feed_id' => 7,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 8,
            'feed_id' => 8,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 9,
            'feed_id' => 9,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
        [
            'id' => 10,
            'feed_id' => 10,
            'title' => 'Lorem ipsum dolor sit amet',
            'author' => 'Lorem ipsum dolor sit amet',
            'url' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'enclosure_url' => 'Lorem ipsum dolor sit amet',
            'enclosure_type' => 'Lorem ipsum dolor sit amet',
            'lang' => 'Lorem ipsum dolor sit amet',
            'is_read' => 1,
            'published' => '2015-03-12 19:30:24',
            'aggregated' => '2015-03-12 19:30:24'
        ],
    ];
}
