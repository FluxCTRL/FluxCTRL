<?php
$I = new ApiTester($scenario);
$I->wantTo('update existing feed');

$feed = call_user_func(new \FluxCtrl\Test\Factory\FeedFactory, 1);

$I->sendPUT('/api/' . $feed->id . '.json', ['title' => 'Foo']);

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true, 'data' => []]);
$I->seeRecord('Feeds', ['title' => 'Foo']);

