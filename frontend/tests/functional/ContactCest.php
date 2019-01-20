<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

/* @var $scenario \Codeception\Scenario */

class ContactCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['site/contact']);
    }

    public function seeAllAdmins(FunctionalTester $I)
    {
        $I->see('Treinadores');
    }

}
