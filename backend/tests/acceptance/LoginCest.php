<?php
namespace backend\tests\acceptance;

use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="AdminLoginForm[email]"]', 'melicias1999@gmail.com');
        $I->fillField('input[name="AdminLoginForm[password]"]', 'jayson');
        $I->click('login-button');
        //$I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');
    }

    public function ensureThatLoginFails(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login');

        $I->amGoingTo('try to login with wrong credentials');
        $I->fillField('input[name="AdminLoginForm[email]"]', 'melicias1999@gmail.com');
        $I->fillField('input[name="AdminLoginForm[password]"]', 'jaysonn');
        $I->click('login-button');
        //$I->wait(2); // wait for button to be clicked

        $I->expectTo('given error, admin credencias are wrong');
        $I->see('Login');

        $I->amGoingTo('try to login with blocked admin credentials');
        $I->fillField('input[name="AdminLoginForm[email]"]', 'adminBlock@gmail.com');
        $I->fillField('input[name="AdminLoginForm[password]"]', 'jayson');
        $I->click('login-button');
        //$I->wait(2); // wait for button to be clicked

        $I->expectTo('given error');
        $I->see('O seu email foi bloqueado');
    }
}
