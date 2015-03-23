<?php
namespace FluxCtrl\App\Test\Factory;

use Gourmet\Muffin\TestSuite\TestFactory;

class ItemFactory extends TestFactory
{
    public $feed_id = 'factory|FluxCtrl\App\Model\Entity\Feed';
    public $title = 'sentence|5';
    public $content = 'text';
    public $url = 'url';
    public $enclosure_url = 'url';
    public $enclosure_type = '';
    public $lang = '';
    public $is_read = 'boolean';
    public $published = 'dateTimeBetween|-1 month';
    public $aggregated = 'dateTimeBetween|-1 day';
    public function useCallbacks() { return false; }
}
