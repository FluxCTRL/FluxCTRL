<?php
$I = new FluxCtrl\App\Test\Api\ApiTester($scenario);
$I->wantTo('list items for specific feed');

$feed = call_user_func(new \FluxCtrl\App\Test\Factory\FeedFactory, 1);
call_user_func_array(new \FluxCtrl\App\Test\Factory\ItemFactory(), [function ($entity) use ($feed) { return $entity->feed_id = $feed->id;  }, 20]);

$I->sendGET('/' . $feed->id . '.json');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesJsonPath('$.data[0].title');
