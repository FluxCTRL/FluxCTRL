<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('delete an item');

call_user_func(new \FluxCtrl\App\Test\Factory\FeedFactory(), 1);
$item = call_user_func(new \FluxCtrl\App\Test\Factory\ItemFactory(), 1);

$I->sendDELETE('/items/' . $item->id . '.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true, 'data' => []]);
$I->dontSeeRecord('Items', ['id' => $item->id]);

