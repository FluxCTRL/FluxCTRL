<?php
namespace FluxCtrl\App\Test\TestCase;

use Cake\Routing\Router;
use Cake\TestSuite\TestCase;

class RouteTest extends TestCase
{
    public function testAppFeedsRoutes()
    {
        $id = 'A3eRt';
        $route = ['plugin' => null, 'controller' => 'Feeds'];

        $expected = $route + ['action' => 'index', '_method' => 'GET'];
        $this->assertRoute('GET', '/feeds', $expected);

        $expected = $route + ['action' => 'add', '_method' => ['GET', 'POST']];
        $url = '/feeds/add';
        $this->assertRoute('GET', $url, $expected);
        $this->assertRoute('POST', $url, $expected);

        $route = $route + compact('id');

        $expected = $route + ['action' => 'delete', '_method' => 'DELETE'];
        $this->assertRoute('DELETE', '/feeds/' . $id, $expected);

        $expected = $route + ['action' => 'edit', '_method' => ['GET', 'PUT']];
        $url = '/feeds/' . $id . '/edit';
        $this->assertRoute('GET', $url, $expected);
        $this->assertRoute('PUT', $url, $expected);
    }

    public function testAppItemsRoutes()
    {
        $id = '4A';
        $feed_id = 'A3et';
        $route = ['plugin' => null, 'controller' => 'Items'];

        $expected = $route + ['action' => 'index', '_method' => 'GET'];
        $this->assertRoute('GET', '/items', $expected);

        $expected = $expected + ['id' => $feed_id, 'prefix' => 'feed'];
        $url = '/' . $feed_id . '/items';
        $this->assertRoute('GET', $url, $expected);

        $expected = ['action' => 'add', '_method' => ['GET', 'POST']] + $expected;
        $url .= '/add';
        $this->assertRoute('GET', $url, $expected);
        $this->assertRoute('POST', $url, $expected);

        $route += compact('id');
        $url = '/items/' . $id;

        $expected = $route + ['action' => 'view', '_method' => 'GET'];
        $this->assertRoute('GET', $url, $expected);

        $expected = $route + ['action' => 'delete', '_method' => 'DELETE'];
        $this->assertRoute('DELETE', $url, $expected);

        $expected = $route + ['action' => 'edit', '_method' => ['GET', 'PUT']];
        $url .= '/edit';
        $this->assertRoute('GET', $url, $expected);
        $this->assertRoute('PUT', $url, $expected);
    }

    /**
     * @expectedException \Cake\Routing\Exception\MissingRouteException
     */
    public function testAppFeedsViewThrowsException()
    {
        Router::parse('/feeds/A3eRt');
    }

    /**
     * @expectedException \Cake\Routing\Exception\MissingRouteException
     */
    public function testAppItemsAddWithoutFeedIdThrowsException()
    {
        Router::parse('/items/add');
    }

    public function assertRoute($method, $url, array $asserts)
    {
        $this->setHttpMethod($method);
        $result = Router::parse($url);
        foreach ($asserts as $k => $expected) {
            $this->assertEquals($expected, $result[$k], "$method: $url");
        }
    }

    public function setHttpMethod($method)
    {
        $_ENV['REQUEST_METHOD'] = $method;
    }
}
