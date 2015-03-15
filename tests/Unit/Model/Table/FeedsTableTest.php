<?php
namespace Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use FluxCtrl\Model\Entity\Feed;

class FeedsTableTest extends TestCase
{
    public $fixtures = ['app.feeds', 'app.items'];

    public function tearDown()
    {
        parent::tearDown();
        TableRegistry::clear();
    }

    public function testBeforeSave()
    {
        $event = new Event('Model.beforeSave');
        $entity = new Feed();
        $feeds = $this->getMockForModel('Feeds', ['aggregate']);

        $feeds->expects($this->once())
            ->method('aggregate')
            ->with($entity);

        $feeds->beforeSave($event, $entity, new ArrayObject());
        $feeds->beforeSave($event, new Feed([], ['markNew' => false]), new ArrayObject());
    }

    public function testAggregate()
    {
        $feed = new Feed();
        $feeds = $this->getMockForModel('Feeds', ['getFeeder', 'save']);
        $feeder = $this->getMock('FluxCtrl\Model\Feed\Feeder', ['aggregate']);

        $feeds->expects($this->once())
            ->method('getFeeder')
            ->with('Feed')
            ->will($this->returnValue($feeder));

        $feeds->expects($this->once())
            ->method('save')
            ->with($feed);

        $feeder->expects($this->once())
            ->method('aggregate')
            ->with($feed)
            ->will($this->returnValue($feed));

        $feeds->aggregate($feed);
    }

    public function testGetFeeder()
    {
        $feeds = TableRegistry::get('Feeds');

        $result = $feeds->getFeeder('Feed');
        $this->assertInstanceOf('FluxCtrl\Model\Feed\Feed', $result);
    }
}
