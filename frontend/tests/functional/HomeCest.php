<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage('frontend/web/index');
        $I->see('Gym Plan');
        $I->seeLink('About');
        $I->click('About');
        $I->see('This is the About page.');
    }
}