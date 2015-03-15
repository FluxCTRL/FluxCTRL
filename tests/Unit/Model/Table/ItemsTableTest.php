<?php
namespace Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class ItemsTableTest extends TestCase
{
    public $fixtures = ['app.feeds', 'app.items'];

    public function tearDown()
    {
        parent::tearDown();
        TableRegistry::clear();
    }

    public function testFindUnread()
    {
        $connection = ConnectionManager::get('test');
        $table = $this->getMockForModel('Items', ['query']);
        $query = $this->getMock('Cake\ORM\Query', ['order', 'where'], [$connection, $table]);

        $table->expects($this->once())
            ->method('query')
            ->will($this->returnValue($query));

        $query->expects($this->once())
            ->method('where')
            ->with(['Items.is_read' => false])
            ->will($this->returnValue($query));

        $query->expects($this->once())
            ->method('order')
            ->with(['Items.published' => 'DESC'])
            ->will($this->returnValue($query));

        $result = $table->find('unread');

        $this->assertInstanceOf('\Cake\ORM\Query', $result);
    }
}
