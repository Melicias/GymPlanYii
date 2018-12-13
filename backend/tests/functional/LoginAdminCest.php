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
        $I->submitForm($this->formId, [
            'login-form[email]' => 'melicias1999@gmail.com',
            'login-form[password]' => 'jayson',
        ]);

        $I->seeRecord('common\models\Admin', [
            'primeiroNome' => 'Francisco',
            'ultimoNome' => 'Melicias',
            'email' => 'melicias1999@gmail.com',
        ]);

        $I->see('Login', 'form button[type=submit]');
    }
    public function WrongEmailOrPassword(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'login-form[email]' => 'teste@teste.com',
            'login-form[password]' => 'teste',
        ]);

        $I->seeRecord('common\models\Admin', [
            'primeiroNome' => 'asd',
            'ultimoNome' => 'asd',
            'email' => 'teste@teste.com',

        ]);

        $I->see('Login', 'form button[type=submit]');
    }

}
