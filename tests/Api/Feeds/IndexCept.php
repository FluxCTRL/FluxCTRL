<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('get a list of feeds');

call_user_func(new FluxCtrl\App\Test\Factory\FeedFactory(), 5);

$I->sendGET('/feeds.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesXpath('//data//id');
