<?php
namespace FluxCtrl\Test\Factory;

use Gourmet\Muffin\TestSuite\TestFactory;

class FeedFactory extends TestFactory
{
    public $title = 'title';
    public $description = 'text';
    public $url = 'url';
    public $website = 'url';
    public $etag = 'regexify|[a-zA-Z0-9]{16,}';
    public $checked = 'dateTimeBetween|-1 month';
    public function useCallbacks() { return false; }
}
