<?php
namespace backend\tests\acceptance;

use backend\tests\AcceptanceTester;
use Codeception\Step\Argument\PasswordArgument;
use yii\helpers\Url;

class BlockUsersCest
{
    public function ensureThatLoginAndCanGoToBlockUsers(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="AdminLoginForm[email]"]', 'melicias1999@gmail.com');
        $I->fillField('input[name="AdminLoginForm[password]"]', 'jayson');
        $I->click('login-button');
        //$I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->dontSee('Login');
        $I->see('Logout');

        $I->click('Bloquear Utilizadores');
        $I->see('Users');
        $I->see('melicias1999@gmail.com');


        $I->click('Inicio');
        $I->see('Visualizar');
    }

    public function ensureThatRoutesCantBeAccess(AcceptanceTester $I)
    {
        $I->amGoingTo('try to go to user without login');
        $I->amOnPage(Url::toRoute('/user'));
        $I->see('Login');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="AdminLoginForm[email]"]', 'melicias1999@gmail.com');
        $I->fillField('input[name="AdminLoginForm[password]"]', new PasswordArgument('jayson'));
        $I->click('login-button');

        $I->amGoingTo('try to go to user with login');
        $I->click('Bloquear Utilizadores');
        $I->see('Users');
    }
}
