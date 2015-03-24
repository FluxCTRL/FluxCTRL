<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('viewing an unread item gets it marked as read');

call_user_func(new \FluxCtrl\App\Test\Factory\FeedFactory(), 1);
$item = call_user_func(new \FluxCtrl\App\Test\Factory\ItemFactory(), function ($entity) { $entity->is_read = false; }, 1);

$I->sendGET('/api/items/' . $item->id . '.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesXpath('//data//title');
$I->seeRecord('Items', ['id' => $item->id, 'is_read' => true]);
