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
            'SignupForm[dataNascimento]' => '15-07-1999',
            'SignupForm[email]' => 'goncalo.amaro@example.com',
            'SignupForm[altura]' => '1.50',
            'SignupForm[peso]' => '65',
            'SignupForm[sexo]' => '1',
            'SignupForm[password]' => 'test_password',
        ]);

        $I->seeRecord('common\models\User', [
            'primeiroNome' => 'Goncalo',
            'ultimoNome' => 'Amaro',
            'dataNascimento' => '15-07-1999',
            'email' => 'goncalo.amaro@example.com',
            'altura' => '1.50',
            'peso' => '65',
            'sexo' => '1',

        ]);

        $I->see('Logout (tester)', 'form button[type=submit]');
    }
}
