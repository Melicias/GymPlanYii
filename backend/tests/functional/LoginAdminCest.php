<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class LoginAdminCest
{
    protected $formId = '#login-form';

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

    public function LoginCorrect(FunctionalTester $I)
    {
        $I->see('Login', 'form button[type=submit]');

        $I->submitForm($this->formId, [
            'login-form[email]' => 'melicias1999@gmail.com',
            'login-form[password]' => 'jayson',
        ]);

        $I->seeRecord('common\models\Admin', [
            'primeiroNome' => 'Francisco',
            'ultimoNome' => 'Melicias',
            'email' => 'melicias1999@gmail.com',
        ]);

        $I->fillField('#adminloginform-email', 'melicias1999@gmail.com');
        $I->fillField('#adminloginform-password', 'jayson');
        $I->click('Login');

    }

    public function WrongPassword(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'login-form[email]' => 'teste@teste.teste',
            'login-form[password]' => 'melicias',
        ]);

        $I->see('Login', 'form button[type=submit]');
    }

    public function WrongEmail(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'login-form[email]' => 'teste@teste.com',
            'login-form[password]' => 'melicias',
        ]);

        $I->see('Login', 'form button[type=submit]');
    }

    public function AdminBlocked(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'login-form[email]' => 'teste@teste.teste',
            'login-form[password]' => 'asdqwe123',
        ]);

        $I->see('Login', 'form button[type=submit]');
    }

}
