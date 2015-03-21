<?php
$I = new ApiTester($scenario);
$I->wantTo('get a list of feeds');

call_user_func(new FluxCtrl\Test\Factory\FeedFactory(), 5);

$I->sendGET('/api/feeds.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesXpath('//data//id');
