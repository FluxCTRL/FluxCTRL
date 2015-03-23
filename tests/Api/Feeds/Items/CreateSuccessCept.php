<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('create an item for a specific feed');

$feed = call_user_func(new \FluxCtrl\App\Test\Factory\FeedFactory(), 1);

$I->sendPOST('/api/' . $feed->id . '.json', [
    'title' => 'Foo',
    'content' => 'Bar',
]);
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesJsonPath('$.data.id');

