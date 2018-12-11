<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use yii\helpers\Url;

class LoginCest
{
    public function TryLogin(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

    }
}
