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
        $feed = $this->getMock('FluxCtrl\Model\Entity\Feed', ['_getHose']);
        $feeds = $this->getMockForModel('Feeds', ['getHose', 'save']);
        $hose = $this->getMock('FluxCtrl\Model\Hose\PicoHose', ['aggregate'], [$feed]);

        $feed->expects($this->once())
            ->method('_getHose')
            ->will($this->returnValue($hose));

        $feeds->expects($this->once())
            ->method('save')
            ->with($feed);

        $hose->expects($this->once())
            ->method('aggregate')
            ->with()
            ->will($this->returnValue($feed));

        $feeds->aggregate($feed);
    }
}
