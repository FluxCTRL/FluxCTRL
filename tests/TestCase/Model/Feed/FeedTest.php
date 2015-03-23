<?php
namespace FluxCtrl\App\Test\TestCase\Model\Feed;

use Cake\TestSuite\TestCase;
use FluxCtrl\Model\Feed\Feed;

class FeedTest extends TestCase
{
    public function testAggregate()
    {
        $feed = new Feed('http://feeds.feedburner.com/oatmealfeed');
        var_dump($feed->aggregate());
    }
}
