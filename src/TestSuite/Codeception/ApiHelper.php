<?php
namespace FluxCtrl\App\TestSuite\Codeception;

use Codeception\Module;
use Codeception\TestCase as Test;

class ApiHelper extends Module
{

    public function _before(Test $test)
    {
        $this->getModule('Cake\Codeception\Helper')
            ->loadFixtures('app.feeds', 'app.items');
    }
}
