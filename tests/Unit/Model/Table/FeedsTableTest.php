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
        $feeds = $this->getMockForModel('Feeds', ['getHose', 'save']);
        $hose = $this->getMock('FluxCtrl\Model\Hose\PicoHose', ['aggregate']);

        $feeds->expects($this->once())
            ->method('getHose')
            ->with('Pico')
            ->will($this->returnValue($hose));

        $feeds->expects($this->once())
            ->method('save')
            ->with($feed);

        $hose->expects($this->once())
            ->method('aggregate')
            ->with($feed)
            ->will($this->returnValue($feed));

        $feeds->aggregate($feed);
    }

    public function testGetHose()
    {
        $feeds = TableRegistry::get('Feeds');

        $result = $feeds->getHose('Pico');
        $this->assertInstanceOf('FluxCtrl\Model\Hose\PicoHose', $result);
    }
}
