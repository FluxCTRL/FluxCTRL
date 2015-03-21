<?php
$I = new ApiTester($scenario);
$I->wantTo('create an item for a specific feed');

$feed = call_user_func(new \FluxCtrl\Test\Factory\FeedFactory(), 1);

$I->sendPOST('/api/' . $feed->id . '.json', [
    'title' => 'Foo',
    'content' => 'Bar',
]);
$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesJsonPath('$.data.id');

