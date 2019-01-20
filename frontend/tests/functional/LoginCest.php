<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use yii\helpers\Url;

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

    }

    public function LoginCorrect(FunctionalTester $I)
    {
        $I->see('Login', 'form button[type=submit]');

        $I->submitForm('#login-form', [
            'LoginForm[email]' => 'melicias1999@gmail.com',
            'LoginForm[password]' => 'melicias',
        ]);

        $I->see('Logout');
    }

    public function WrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[email]' => 'melicias1999@gmail.com',
            'LoginForm[password]' => 'meliciasASD',
        ]);

        $I->see('Incorrect email or password.');
    }

    public function WrongEmail(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[email]' => 'amaro@gmail.comm',
            'LoginForm[password]' => 'melicias',
        ]);

        $I->see('Incorrect email or password.');
    }

    public function UserBlocked(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[email]' => 'amaro@gmail.com',
            'LoginForm[password]' => 'melicias',
        ]);

        $I->see('O seu email foi bloqueado');
    }
}
