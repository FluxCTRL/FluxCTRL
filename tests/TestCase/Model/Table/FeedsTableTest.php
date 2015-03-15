<?php
namespace FluxCtrl\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FluxCtrl\Model\Entity\Feed;
use FluxCtrl\Model\Entity\Item;
use FluxCtrl\Model\Table\FeedsTable;
use PicoFeed\Parser\Item as PicoFeedItem;

/**
 * FluxCtrl\Model\Table\FeedsTable Test Case
 */
class FeedsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Feeds' => 'app.feeds',
        'Items' => 'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $className = 'FluxCtrl\Model\Table\FeedsTable';
        $config = TableRegistry::exists('Feeds') ? [] : compact('className');
        $this->Feeds = TableRegistry::get('Feeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->Feeds);
        TableRegistry::clear();
    }

    public function testGetFeedParser()
    {
        $result = $this->Feeds->getFeedParser(new Feed([
            'url' => 'http://wordpress.org/news/feed',
            'etag' => null,
            'checked' => null
        ]));
        $this->assertInstanceOf('PicoFeed\Parser\Parser', $result);
    }

    public function testAggregate()
    {
        $data = [
            'title' => 'Awesome',
            'author' => 'Jad Bitar',
            'url' => 'http://feed.com',
            'date' => '',
            'content' => '',
            'language' => '',
            'enclosure_url' => '',
            'enclosure_type' => '',
        ];

        $items = [
            $this->getPicoFeedItem($data),
        ];

        $parser = $this->getMock(
            'PicoFeed\Parser\Rss20',
            ['execute', 'getItems'],
            ['Foo bar']
        );

        $parser->expects($this->once())
            ->method('execute')
            ->will($this->returnValue($parser));
        $parser->expects($this->once())
            ->method('getItems')
            ->will($this->returnValue($items));

        $feeds = $this->getMockForModel(
            'Feeds',
            ['getFeedParser', 'toFluxCtrlItem']
        );

        $feeds->expects($this->once())
            ->method('getFeedParser')
            ->will($this->returnValue($parser));
        $feeds->expects($this->once())
            ->method('toFluxCtrlItem')
            ->will($this->returnValue(new Item()));

        $result = $feeds->aggregate(new Feed(['id' => 1], ['markNew' => false, 'markClean' => true]));
        $expected = [
            new Item(
                [
                    'id' => '11',
                    'feed_id' => 1
                ],
                [
                    'markClean' => true,
                    'markNew' => false,
                    'source' => 'Items'
                ]
            )
        ];
        $this->assertEquals($expected[0]->toArray(), $result->items[0]->toArray());
    }

    public function testToFluxCtrlItem()
    {
        $item = $this->getPicoFeedItem([
            'title' => 'Awesome',
            'author' => 'Jad Bitar',
            'url' => 'http://feed.com',
            'date' => date('Y-m-d'),
            'content' => '',
            'language' => '',
            'enclosure_url' => '',
            'enclosure_type' => '',
        ]);

        $result = $this->Feeds->toFluxCtrlItem($item);
        $expected = new Item([
            'title' => $item->title,
            'author' => $item->author,
            'url' => $item->url,
            'published' => $item->date,
            'content' => '',
            'lang' => '',
            'enclosure_url' => '',
            'enclosure_type' => '',
            ], [
            'source' => 'Items'
            ]);
        $this->assertEquals($expected, $result);
    }

    public function getPicoFeedItem(array $data = [])
    {
        $item = new PicoFeedItem();
        $keys = [
            'title',
            'author',
            'url',
            'date',
            'language',
            'content',
            'enclosure_url',
            'enclosure_type',
        ];

        foreach ($keys as $key) {
            if (!empty($data[$key])) {
                $item->$key = $data[$key];
            }
        }

        return $item;
    }
}
