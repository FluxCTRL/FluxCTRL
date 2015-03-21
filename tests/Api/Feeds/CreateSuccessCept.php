<?php
$I = new ApiTester($scenario);
$I->wantTo('Subscribe to a new feed');

$I->sendPOST('/api/feeds.json', [
    'url' => 'http://feeds.feedburner.com/oatmealfeed',
]);

$I->seeResponseCodeIs(201);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['success' => true]);
$I->seeResponseJsonMatchesXpath('//data/id');
