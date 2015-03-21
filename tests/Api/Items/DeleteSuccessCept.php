<?php
$I = new ApiTester($scenario);
$I->wantTo('delete an item');

call_user_func(new \FluxCtrl\Test\Factory\FeedFactory(), 1);
$item = call_user_func(new \FluxCtrl\Test\Factory\ItemFactory(), 1);

$I->sendDELETE('/api/items/' . $item->id . '.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true, 'data' => []]);
$I->dontSeeRecord('Items', ['id' => $item->id]);

