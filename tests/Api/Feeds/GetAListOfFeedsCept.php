<?php
$I = new ApiTester($scenario);
$I->wantTo('get a list of feeds');

$I->loadFixtures('app.feeds', 'app.items');

$I->sendGET('/api/feeds.json');
$I->seeResponseCodeIs(200);

