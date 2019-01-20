<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class LoginAdminCest
{

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

    public function LoginCorrect(FunctionalTester $I)
    {
       $I->see('Login', 'form button[type=submit]');

        $I->submitForm('#login-form', [
            'AdminLoginForm[email]' => 'melicias1999@gmail.com',
            'AdminLoginForm[password]' => 'jayson',
        ]);

        $I->see('Logout');

    }

    public function WrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'AdminLoginForm[email]' => 'teste@teste.teste',
            'AdminLoginForm[password]' => 'meliciasdjfhgdkjfdk',
        ]);

        $I->see('Incorrect email or password.');
    }

    public function WrongEmail(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'AdminLoginForm[email]' => 'teste@teste.com',
            'AdminLoginForm[password]' => 'melicias',
        ]);

        $I->see('Incorrect email or password.');
    }

    public function AdminBlocked(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'AdminLoginForm[email]' => 'adminBlock@gmail.com',
            'AdminLoginForm[password]' => 'jayson',
        ]);

        $I->see('O seu email foi bloqueado');
    }

}
