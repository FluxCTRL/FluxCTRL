<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('delete existing feed');

$feed = call_user_func(new \FluxCtrl\App\Test\Factory\FeedFactory, 1);

$I->sendDELETE('/' . $feed->id . '.json');

$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true, 'data' => []]);
$I->dontSeeRecord('Feeds', ['id' => $feed->id]);
