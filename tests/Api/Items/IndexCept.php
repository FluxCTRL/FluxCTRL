<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('List all items');

$I->sendGET('/api/items.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);

