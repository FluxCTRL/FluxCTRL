<?php
$I = new ApiTester($scenario);
$I->wantTo('view an item');

call_user_func(new \FluxCtrl\Test\Factory\FeedFactory(), 1);
$item = call_user_func(new \FluxCtrl\Test\Factory\ItemFactory(), 1);

$I->sendGET('/api/items/' . $item->id . '.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesXpath('//data//title');
