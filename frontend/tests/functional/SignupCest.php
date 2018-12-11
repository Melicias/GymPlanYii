<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }


    public function signupWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignupForm[user]'  => 'tester',
            'SignupForm[email]'     => 'ttttt',
            'SignupForm[password]'  => 'tester_password',
        ]
        );
        $I->dontSee('User cannot be blank.', '.help-block');
        $I->dontSee('Password cannot be blank.', '.help-block');
        $I->see('Email is not a valid email address.', '.help-block');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SignupForm[primeiroNome]' => 'Goncalo',
            'SignupForm[ultimoNome]' => 'Amaro',
            'SignupForm[email]' => 'goncalo.amaro@example.com',
            'SignupForm[password]' => 'test_password',
        ]);

        $I->seeRecord('common\models\User', [
            'primeiroNome' => 'Goncalo',
            'ultimoNome' => 'Amaro',
            'sexo' => '1',
            'dataNascimento' => '15-07-1999',
            'altura' => '1.50',
            'peso' => '65',
            'email' => 'goncalo.amaro@example.com',
        ]);

        $I->see('Logout (tester)', 'form button[type=submit]');
    }
}
