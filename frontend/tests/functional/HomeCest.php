<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Sobre');
        $I->see('GymPlan');
        $I->seeLink('Sobre');
        $I->amOnPage('Sobre');
        $I->see('login');
    }
}