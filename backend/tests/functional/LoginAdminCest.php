<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use yii\helpers\Url;

class LoginAdminCest
{
    public function TryLogin(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

    }
}
